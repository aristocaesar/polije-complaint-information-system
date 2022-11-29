<?php

require_once("app/models/dashboard_model.php");

class Pengaduan_Model
{
    private $db;
    private $dashboard;
    private $table = "pengaduan";

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

    public function getByStatus($status = "")
    {
        switch ($status) {
            case 'belum_ditanggapi':
                $this->db->query("SELECT * FROM " . $this->table . " WHERE status=:status ORDER BY bobot DESC");
                $this->db->bind("status", "belum_ditanggapi");
                break;
            case 'proses':
                $this->db->query("SELECT * FROM " . $this->table . " WHERE status=:status ORDER BY bobot DESC");
                $this->db->bind("status", "proses");
                break;
            case 'selesai':
                $this->db->query("SELECT * FROM " . $this->table . " WHERE status=:status OR status=:status_dua ORDER BY created_at DESC");
                $this->db->bind("status", "ditangguhkan");
                $this->db->bind("status_dua", "selesai");
                break;
            default:
                throw new Exception("Error Processing Request Get Pengaduan By Status");
                break;
        }

        return $this->db->resultSet();
    }

    public function getByPengguna($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE pengirim=:pengirim ORDER BY created_at DESC");
        $this->db->bind("pengirim", $id);
        return $this->db->resultSet();
    }

    public function getPengaduan($id = "")
    {
        if (!empty($id)) {
            $data = null;
            $type = preg_replace("/[0-9]/", "", $id);
            if ($type == "ADU") {
                $data = $this->get($id);
            } else if ($type == "USR") {
                $data = $this->getByPengguna($id);
            } else {
                throw new Exception("Error Processing Pengaduan Request");
            }
            return $data;
        } else {
            throw new Exception("Error Processing Pengaduan Request");
        }
    }

    public function tangguhkan($data = [])
    {
        if (!empty($data)) {
            $this->db->query("UPDATE " . $this->table . " SET status=:status, tanggapan=:tanggapan, updated_at=:updated_at WHERE id=:id");
            $this->db->bind("status", "ditangguhkan");
            $this->db->bind("tanggapan", $data["alasan-ditangguhkan"]);
            $this->db->bind("updated_at", date("Y-m-d H:i:s"));
            $this->db->bind("id", $data["id"]);
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
                UploadFile($file, "L-ADU-" . $data["id"], 2097152, ["application/pdf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "image/jpeg", "image/jpg", "image/png"], "document/pengaduan");
                $this->db->bind("lampiran", "L-ADU-" . $data["id"] . "." . $extension);
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

    public function generateBobot(String $judul, String $deskripsi, int $lampiran): int
    {
        $bobot = 0;

        // cek bobot for judul
        $lenJudul = strlen($judul);
        if ($lenJudul > 40) {
            $bobot += 25;
        } elseif ($lenJudul > 20) {
            $bobot += 15;
        } elseif ($lenJudul > 10) {
            $bobot += 8;
        } else {
            $bobot += 3;
        }

        // cek bobot for deskripsi
        $lenDeskripsi = strlen($deskripsi);
        if ($lenDeskripsi > 180) {
            $bobot += 50;
        } elseif ($lenDeskripsi > 128) {
            $bobot += 25;
        } elseif ($lenDeskripsi > 64) {
            $bobot += 15;
        } else {
            $bobot += 5;
        }

        // cek lampiran
        if ($lampiran == 0) {
            $bobot += 25;
        }

        return $bobot;
    }

    public function generateID()
    {
        return "ADU" . time();
    }

    public function sendPengaduan()
    {
        if (isset($_POST)) {
            $foto = isset($_FILES["foto"]["error"]) ? $_FILES["foto"]["error"] : 4;
            $bobot = $this->generateBobot($_POST["judul"], $_POST["deskripsi"], $foto);

            $id = $this->generateID();
            $date = date("Y-m-d H:i:s");
            $this->db->query("INSERT INTO " . $this->table . " (id, judul, deskripsi, kategori, pengirim, lokasi, status, divisi, bobot, lampiran_pengirim, user_agent, created_at, updated_at) VALUES (:id, :judul, :deskripsi, :kategori, :pengirim, :lokasi, :status, :divisi, :bobot, :lampiran_pengirim, :user_agent, :created_at, :updated_at)");
            $this->db->bind("id", $id);

            $this->db->bind("judul", $_POST["judul"]);
            $this->db->bind("deskripsi", $_POST["deskripsi"]);
            $this->db->bind("kategori", $_POST["kategori"]);
            if (isset($_POST["pelapor"])) {
                $this->db->bind("pengirim", null);
                // set sessionn for generate pdf document
                $_SESSION["p_rahasia"] = [
                    "id" => $id,
                    "date" => $date
                ];
            } else {
                if (!isset($_POST["id_user_mobile"])) {
                    $this->db->bind("pengirim", $_SESSION["user"]["id"]);
                } else {
                    $this->db->bind("pengirim", $_POST["id_user_mobile"]);
                }
            }
            if ($_POST["lokasi"] == "Akses tidak diberikan") {
                $this->db->bind("lokasi", "Akses tidak diberikan");
            } else {
                $this->db->bind("lokasi", $_POST["lokasi"]);
            }
            $this->db->bind("status", "belum_ditanggapi");
            $this->db->bind("divisi", $_POST["divisi"]);
            $this->db->bind("bobot", $bobot);
            if ($_FILES["foto"]["error"] != 4) {
                $file = explode(".", $_FILES["foto"]["name"]);
                $extension = end($file);
                // Upload File ( 2MB 2097152 )
                UploadFile($_FILES, "L-USER-" . $id, 2097152, ["image/jpeg", "image/jpg", "image/png"], "document/pengaduan");
                $this->db->bind("lampiran_pengirim", "L-USER-" . $id . "." . $extension);
            } else {
                $this->db->bind("lampiran_pengirim", null);
            }
            $this->db->bind("user_agent", $_SERVER["HTTP_USER_AGENT"]);
            $this->db->bind("created_at", $date);
            $this->db->bind("updated_at", $date);
            $this->db->execute();
            // add count pengaduan
            $this->dashboard->addPengaduan();
            return $_POST;
        } else {
            header("Location: " . BaseURL());
        }
    }
}
