<?php
require_once("app/models/dashboard_model.php");

class Informasi_Model
{
    private $db;
    private $dashboard;
    private $table = "informasi";

    public function __construct()
    {
        $this->db = new Database;
        $this->dashboard = new Dashboard_Model;
    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function get($id)
    {
        $nama = str_replace("-", " ", $id);
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
        $this->db->bind("id", $id);
        $result = $this->db->single();
        if (!$result) {
            return [];
        }
        return $result;
    }

    public function getByPengguna($id)
    {
        $nama = str_replace("-", " ", $id);
        $this->db->query("SELECT * FROM " . $this->table . " WHERE pengirim=:pengirim ORDER BY created_at DESC");
        $this->db->bind("pengirim", $id);
        return $this->db->resultSet();
    }

    public function getByStatus($status = "")
    {
        switch ($status) {
            case 'belum_ditanggapi':
                $this->db->query("SELECT * FROM " . $this->table . " WHERE status=:status ORDER BY created_at ASC");
                $this->db->bind("status", "belum_ditanggapi");
                break;
            case 'proses':
                $this->db->query("SELECT * FROM " . $this->table . " WHERE status=:status ORDER BY created_at ASC");
                $this->db->bind("status", "proses");
                break;
            case 'selesai':
                $this->db->query("SELECT * FROM " . $this->table . " WHERE status=:status OR status=:status_dua ORDER BY created_at DESC");
                $this->db->bind("status", "ditangguhkan");
                $this->db->bind("status_dua", "selesai");
                break;
            default:
                throw new Exception("Error Processing Request Get Informasi By Status");
                break;
        }

        return $this->db->resultSet();
    }

    public function tangguhkan($alasan = "", $id = "")
    {
        if (!empty($id)) {
            $this->db->query("UPDATE " . $this->table . " SET status=:status, tanggapan=:tanggapan, updated_at=:updated_at WHERE id=:id");
            $this->db->bind("status", "ditangguhkan");
            $this->db->bind("tanggapan", $alasan);
            $this->db->bind("updated_at", date("Y-m-d H:i:s"));
            $this->db->bind("id", $id);
            $this->db->execute();
            return true;
        } else {
            throw new Exception("Error Processing Request");
        }
    }

    public function changeToProces($id = "")
    {
        if ($id != "") {
            $this->db->query("UPDATE " . $this->table . " SET status=:status, updated_at=:updated_at WHERE id=:id");
            $this->db->bind("status", "proses");
            $this->db->bind("updated_at", date("Y-m-d H:i:s"));
            $this->db->bind("id", $id);
            $this->db->execute();
            return true;
        } else {
            throw new Exception("Error Processing Request Change To Proces");
        }
    }

    public function changeToComplate($data, $file)
    {
        if (!empty($data)) {
            // Update status to selesai
            $this->db->query("UPDATE " . $this->table . " SET status=:status, tanggapan=:tanggapan, lampiran=:lampiran, updated_at=:updated_at WHERE id=:id");
            $this->db->bind("status", "selesai");
            $this->db->bind("tanggapan", $data["tanggapan"]);
            // upload lampiran
            if ($file["foto"]["error"] != 4) {
                $f = explode(".", $file["foto"]["name"]);
                $extension = end($f);
                UploadFile($file, "L-INFO-" . $data["id"], 2097152, ["application/pdf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "image/jpeg", "image/jpg", "image/png"], "document/informasi");
                $this->db->bind("lampiran", "L-INFO-" . $data["id"] . "." . $extension);
            } else {
                $this->db->bind("lampiran", null);
            }
            $this->db->bind("updated_at", date("Y-m-d H:i:s"));
            $this->db->bind("id", $data["id"]);
            $this->db->execute();
            return true;
        } else {
            throw new Exception("Error Processing Request Change To Complate");
        }
    }

    public function generateID()
    {
        return "INFO" . time();
    }

    public function sendInformasi()
    {
        if (isset($_POST)) {
            // cek data yang dikirimkan
            if (
                !isset($_POST["kategori"])
                || !isset($_POST["divisi"])
                || !isset($_POST["deskripsi"])
                || !isset($_POST["lokasi"])
            ) {
                throw new Exception("Harap melengkapi data yang tersedia");
            }
            // cek deskripsi tidak boleh kosong
            if (empty($_POST["deskripsi"])) {
                throw new Exception("Harap melengkapi data yang tersedia");
            }
            // cek panjang deskripsi
            $lenDeskripsi = strlen($_POST["deskripsi"]);
            if ($lenDeskripsi > 1024) {
                throw new Exception("Deskripsi informasi terlalu panjang");
            } else if ($lenDeskripsi < 8) {
                throw new Exception("Harap masukkan deskripsi yang lebih lengkap");
            }

            // init ID aspirasi
            $id = $this->generateID();
            // init tanggal sekarang
            $date = date("Y-m-d H:i:s");

            // query insert ke database pengaduan
            $this->db->query("INSERT INTO " . $this->table . " (id, deskripsi, kategori, pengirim, lokasi, status, divisi, lampiran_pengirim, user_agent, created_at, updated_at) VALUES (:id, :deskripsi, :kategori, :pengirim, :lokasi, :status, :divisi, :lampiran_pengirim, :user_agent, :created_at, :updated_at)");

            // masukkan data ID
            $this->db->bind("id", $id);
            // masukkan deskripsi
            $this->db->bind("deskripsi", htmlspecialchars(trim($_POST["deskripsi"])));
            // masukkan kategori
            $this->db->bind("kategori", trim($_POST["kategori"]));
            // masukkan divisi
            $this->db->bind("divisi", trim($_POST["divisi"]));
            // masukkan pelapor
            // jika pelapor ada dan login diwebsite
            if (!isset($_POST["id_user_mobile"])) {
                $this->db->bind("pengirim", $_SESSION["user"]["id"]);
            } else {
                // jika pelapot ada dan login dimobile
                $this->db->bind("pengirim", $_POST["id_user_mobile"]);
            }
            // masukkan lokasi
            if ($_POST["lokasi"] == "Akses tidak diberikan") {
                $this->db->bind("lokasi", "Akses tidak diberikan");
            } else {
                $this->db->bind("lokasi", htmlspecialchars(trim($_POST["lokasi"])));
            }
            // masukkan status
            $this->db->bind("status", "belum_ditanggapi");
            // masukkan lampiran
            if (isset($_FILES["foto"])) {
                if ($_FILES["foto"]["error"] != 4) {
                    $file = explode(".", $_FILES["foto"]["name"]);
                    $extension = end($file);
                    // Upload File ( 10MB )
                    UploadFile($_FILES, "L-USER-" . $id, 10485760, [], "document/informasi");
                    $this->db->bind("lampiran_pengirim", "L-USER-" . $id . "." . $extension);
                }
            } else {
                $this->db->bind("lampiran_pengirim", null);
            }
            // masukkan user agent
            $this->db->bind("user_agent", $_SERVER["HTTP_USER_AGENT"]);
            // masukkan tgl sekarang
            $this->db->bind("created_at", $date);
            $this->db->bind("updated_at", $date);
            // jalankan query
            $this->db->execute();
            // add count pengaduan
            $this->dashboard->addAspirasi();
            // kembalikan hasil
            return $_POST;
        } else {
            throw new Exception("Informasi pengiriman informasi tidak valid");
        }
    }
}
