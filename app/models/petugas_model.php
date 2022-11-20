<?php

require_once("app/models/dashboard_model.php");

class Petugas_Model
{
    private $db;
    private $dashboard;
    private $table = "petugas";

    public function __construct()
    {
        $this->db = new Database;
        $this->dashboard = new Dashboard_Model;
    }

    private function generateID(string $set)
    {
        $numbs = explode("-", $set);
        return "PGS" . join("", $numbs) . date("s");
    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getByEmail($email)
    {
        $this->db->query('SELECT * FROM ' . $this->table . " WHERE email=:email");
        $this->db->bind("email", $email);
        return $this->db->single();
    }

    public function checkUniqEmail($email = "")
    {
        if (!empty($email)) {
            $this->db->query("SELECT * FROM pengguna WHERE email=:email");
            $this->db->bind("email", $email);
            $result = $this->db->single();
            if ($result) {
                throw new Exception("Email ini sudah digunakan!");
            }
            return true;
        } else {
            throw new Exception("Error Processing Request Check Email");
        }
    }

    public function get($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
        $this->db->bind("id", $id);
        $result = $this->db->single();
        if (!$result) {
            return [];
        }
        return $result;
    }

    public function save($data = [], $files = null)
    {
        // check uniq email
        $this->checkUniqEmail($data["email"]);
        // id
        $idPetugas = $this->generateID($data["tgl_lahir"]);
        // Current Time Stamp
        $date = date("Y-m-d H:i:s");
        // Save Data
        $this->db->query('INSERT INTO ' . $this->table . ' (id, nama, email, password, tgl_lahir, jenis_kelamin, alamat, kontak, status, akses, foto, verifikasi_email, created_at, updated_at) VALUES (:id, :nama, :email, :password, :tgl_lahir, :jenis_kelamin, :alamat, :kontak, :status, :akses, :foto, :verifikasi_email, :created_at, :updated_at)');
        // binding data
        $this->db->bind("id", $idPetugas);
        $this->db->bind("nama", ucwords($data["nama"]));
        $this->db->bind("email", $data["email"]);
        // check same character
        if ($data["password"] != $data["password2"]) {
            throw new Exception("Password tidak sama!");
        }
        // hash password
        $password = password_hash($data["password"], PASSWORD_DEFAULT);
        $this->db->bind("password", $password);
        $this->db->bind("tgl_lahir", $data["tgl_lahir"]);
        $this->db->bind("jenis_kelamin", $data["jenis_kelamin"]);
        $this->db->bind("alamat", $data["alamat"]);
        $this->db->bind("kontak", $data["kontak"]);
        $this->db->bind("status", $data["status"]);
        $this->db->bind("akses", $data["akses"]);

        // check image exist
        if ($files["foto"]["name"] == "") {
            $this->db->bind("foto", "USER-default.png");
        } else {
            $file = explode(".", $files["foto"]["name"]);
            $extension = end($file);
            // Upload File ( 2MB 2097152 )
            UploadFile($files, $idPetugas, 2097152, ["image/jpeg", "image/jpg", "image/png"], "images");
            $this->db->bind("foto", $idPetugas . "." . $extension);
        }
        $this->db->bind("verifikasi_email", "belum_terverifikasi");
        $this->db->bind("created_at", $date);
        $this->db->bind("updated_at", $date);
        $this->db->execute();
        if ($this->db->rowCount() == 0) {
            throw new Exception("Gagal menambahkan pengguna");
        }
        // set idverifikasi
        $idVerifikasi = $this->generateVerifikasi($data["email"]);
        // Send Mail
        if (!PHPmail($data["email"], "E-LAPOR | VERIFIKASI EMAIL", PHPmailVerifikasi($data["nama"], BaseURL() . "/admin/verifikasi/" . $idVerifikasi))) {
            throw new Exception("Gagal melakukan pengiriman tautan verifikasi!");
        }
        $this->dashboard->actionPengguna("add");
        return $data;
    }

    public function update($data, $files, $id)
    {
        // Current Time Stamp
        $date = date("Y-m-d H:i:s");
        // Save Data
        $this->db->query('UPDATE ' . $this->table . ' SET nama=:nama, email=:email, password=:password, tgl_lahir=:tgl_lahir, jenis_kelamin=:jenis_kelamin, alamat=:alamat, kontak=:kontak, status=:status, akses=:akses, foto=:foto, updated_at=:updated_at WHERE id=:id_pointer');
        // binding data
        $this->db->bind("nama", ucwords($data["nama"]));
        $this->db->bind("email", $data["email"]);
        // check same character
        if ($data["password"] != $data["password2"]) {
            throw new Exception("Password tidak sama!");
        }
        // hash password
        $password = password_hash($data["password"], PASSWORD_DEFAULT);
        $this->db->bind("password", $password);
        $this->db->bind("tgl_lahir", $data["tgl_lahir"]);
        $this->db->bind("jenis_kelamin", $data["jenis_kelamin"]);
        $this->db->bind("alamat", $data["alamat"]);
        $this->db->bind("kontak", $data["kontak"]);
        $this->db->bind("status", $data["status"]);
        $this->db->bind("akses", $data["akses"]);

        // check image exist
        if ($files["foto"]["error"] == 4) {
            $this->db->bind("foto", $data["foto-lama"]);
        } else {
            $file = explode(".", $files["foto"]["name"]);
            $extension = end($file);
            // Upload File ( 2MB 2097152 )
            UploadFile($files, $id, 2097152, ["image/jpeg", "image/jpg", "image/png"], "images");
            // hapus foto lama
            RemoveFileUpload("/images/" . $data["foto-lama"]);
            $this->db->bind("foto", $id . "." . $extension);
        }

        $this->db->bind("updated_at", $date);
        $this->db->bind("id_pointer", $id);
        $this->db->execute();
        if ($this->db->rowCount() == 0) {
            throw new Exception("Gagal memperbarui pengguna");
        }
        return $data;
    }

    public function delete($id, $foto)
    {
        if (empty($id)) {
            throw new Exception("Gagal menghapus pengguna.");
        }
        // hapus foto
        RemoveFileUpload("/images/" . $foto);
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind("id", $id);
        $this->db->execute();
        $this->dashboard->actionPengguna("less");
        return [];
    }

    public function generateVerifikasi($email = "", $time = 5, $action = "create")
    {
        if (!empty($email)) {
            $date = date("Y-m-d H:i:s");
            $idVerifikasi = substr(md5(openssl_random_pseudo_bytes(20)), -32);
            $times = 60 * $time;
            $limit = time() + $times;
            if ($action == "create") {
                $this->db->query("INSERT INTO users_verifikasi (email, verifikasi, time_limit, created_at, updated_at) VALUES (:email, :verifikasi, :time_limit, :created_at, :updated_at)");
                $this->db->bind("email", $email);
                $this->db->bind("verifikasi", $idVerifikasi);
                $this->db->bind("time_limit", $limit);
                $this->db->bind("created_at", $date);
                $this->db->bind("updated_at", $date);
                $this->db->execute();
            } else if ($action == "update") {
                $this->db->query("UPDATE users_verifikasi SET verifikasi=:verifikasi, time_limit=:time_limit, updated_at=:updated_at WHERE email=:email");
                $this->db->bind("verifikasi", $idVerifikasi);
                $this->db->bind("time_limit", $limit);
                $this->db->bind("updated_at", $date);
                $this->db->bind("email", $email);
                $this->db->execute();
            }
            return $idVerifikasi;
        } else {
            throw new Exception("Gagal melakukan pengiriman tautan verifikasi!");
        }
    }

    public function acceptVerifikasi($id)
    {
        $this->db->query('SELECT * FROM users_verifikasi WHERE verifikasi=:id');
        $this->db->bind("id", $id);
        $verifikasi = $this->db->single();
        if ($verifikasi["time_limit"] >= time()) {
            // update users
            $this->updateToVerified($verifikasi["email"]);
            // // hapus data verifikasi
            $this->removeDataVerifikasi($verifikasi["email"]);
            return true;
        } else {
            throw new Exception("Tautan sudah kadaluarsa!");
        }
    }

    public function updateToVerified($email)
    {
        if (!empty($email)) {
            $this->db->query("UPDATE petugas SET verifikasi_email=:verifikasi, updated_at=:updated_at WHERE email=:email");
            $this->db->bind("verifikasi", "terverifikasi");
            $this->db->bind("updated_at", date("Y-m-d H:i:s"));
            $this->db->bind("email", $email);
            $this->db->execute();
        }
    }

    public function removeDataVerifikasi($email)
    {
        $this->db->query("DELETE FROM users_verifikasi WHERE email=:email");
        $this->db->bind("email", $email);
        $this->db->execute();
    }

    public function updateOnProfile($data, $file)
    {
        // Current Time Stamp
        $date = date("Y-m-d H:i:s");
        // Save Data
        $this->db->query('UPDATE ' . $this->table . ' SET nama=:nama, tgl_lahir=:tgl_lahir, jenis_kelamin=:jenis_kelamin, alamat=:alamat, kontak=:kontak, foto=:foto, updated_at=:updated_at WHERE id=:id_pointer');

        $this->db->bind("nama", ucwords($data["nama"]));
        $this->db->bind("tgl_lahir", $data["tgl_lahir"]);
        $this->db->bind("jenis_kelamin", $data["jenis_kelamin"]);
        $this->db->bind("alamat", $data["alamat"]);
        $this->db->bind("kontak", $data["kontak"]);

        if ($file["foto"]["error"] == 4) {
            $this->db->bind("foto", $data["foto_lama"]);
        } else {
            $fileName = explode(".", $file["foto"]["name"]);
            $extension = end($fileName);
            // Upload File ( 2MB 2097152 )
            UploadFile($file, $data["update"], 2097152, ["image/jpeg", "image/jpg", "image/png"], "images");
            // hapus foto lama
            RemoveFileUpload("/images/" . $data["foto_lama"]);
            $this->db->bind("foto", $data["update"] . "." . $extension);
            $_SESSION["admin"]["foto"] = $data["update"] . "." . $extension;
        }
        $this->db->bind("updated_at", $date);
        $this->db->bind("id_pointer", $data["update"]);
        $this->db->execute();
        $_SESSION["admin"]["nama"] = $data["nama"];
        return $data;
    }

    public function updateEmail($data, $id)
    {
        if (!empty($data) && !empty($id)) {
            if ($data["email"] == $data["email2"]) {
                // cek email sudah ada atau tidak
                if ($data["email"] != $_SESSION["admin"]["email"]) {
                    if (!$this->getByEmail($data["email"])) {
                        // change email
                        $this->db->query("UPDATE " . $this->table . " SET email=:email, verifikasi_email=:verifikasi WHERE id=:id_pointer");
                        $this->db->bind("email", $data["email"]);
                        $this->db->bind("verifikasi", "belum_terverifikasi");
                        $this->db->bind("id_pointer", $id);
                        $this->db->execute();
                        // send email to verifikasi
                        $_SESSION["admin"]["email"] = $data["email"];
                        // set idverifikasi
                        $idVerifikasi = $this->generateVerifikasi($data["email"]);
                        // Send Mail
                        if (!PHPmail($data["email"], "E-LAPOR | VERIFIKASI EMAIL", PHPmailVerifikasi(ucwords($_SESSION["admin"]["nama"]), BaseURL() . "/admin/verifikasi/" . $idVerifikasi))) {
                            throw new Exception("Gagal melakukan pengiriman tautan verifikasi!");
                        }
                    } else {
                        $_SESSION["admin"]["redirect"] = "/admin/profil/pengaturan";
                        throw new Exception("Email tersebut sudah digunakan");
                    }
                } else {
                    $_SESSION["admin"]["redirect"] = "/admin/profil/pengaturan";
                    throw new Exception("Anda sekarang menggunakan email tersebut");
                }
            } else {
                $_SESSION["admin"]["redirect"] = "/admin/profil/pengaturan";
                throw new Exception("Email yang anda masukkan tidak sama");
            }
        }
    }

    public function updatePassword($data)
    {
        if (!empty($data)) {
            if ($data["password"] == $data["password2"]) {
                // Save Data
                $this->db->query('UPDATE ' . $this->table . ' SET password=:password, updated_at=:updated_at WHERE id=:id_pointer');
                $this->db->bind("password", password_hash($data["password"], PASSWORD_DEFAULT));
                $this->db->bind("updated_at", date("Y-m-d H:i:s"));
                $this->db->bind("id_pointer", $data["id"]);
                $this->db->execute();
                return true;
            } else {
                throw new Exception("Password tidak sama!");
            }
        }
    }

    public function updateLastLogin($id)
    {
        // Current Time Stamp
        $date = date("Y-m-d H:i:s");
        // Save Data
        $this->db->query('UPDATE ' . $this->table . ' SET last_login=:date WHERE id=:id_pointer');
        // binding data
        $this->db->bind("date", $date);
        $this->db->bind("id_pointer", $id);
        $this->db->execute();
    }

    public function login($data)
    {
        $petugas = $this->getByEmail($data["email"]);
        if ($petugas) {
            if (password_verify($data["password"], $petugas["password"])) {
                if ($petugas["verifikasi_email"] == "terverifikasi") {
                    if ($petugas["akses"] == "aktif") {
                        $this->updateLastLogin($petugas["id"]);
                        setSession("admin", [
                            "id" => $petugas["id"],
                            "nama" => $petugas["nama"],
                            "email" => $petugas["email"],
                            "status" => $petugas["status"],
                            "foto" => $petugas["foto"],
                        ]);
                        return $petugas;
                    } else {
                        throw new Exception("Akun sedang ditangguhkan!");
                    }
                } else {
                    // cek waktu
                    $this->db->query("SELECT * FROM users_verifikasi WHERE email=:email");
                    $this->db->bind("email", $petugas["email"]);
                    $verifikasi = $this->db->single();
                    if ($verifikasi["time_limit"] <= time()) {
                        // set idverifikasi
                        $idVerifikasi = $this->generateVerifikasi($petugas["email"], 5, "update");
                        // Send Mail
                        if (!PHPmail($petugas["email"], "E-LAPOR | VERIFIKASI EMAIL", PHPmailVerifikasi($petugas["nama"], BaseURL() . "/admin/verifikasi/" . $idVerifikasi))) {
                            throw new Exception("Gagal melakukan pengiriman tautan verifikasi!");
                        }
                    }
                    throw new Exception("Akun belum terverifikasi, harap cek pesan pada email!");
                }
            } else {
                throw new Exception("Email atau Password salah!");
            }
        } else {
            throw new Exception("Email atau Password salah!");
        }
    }
}
