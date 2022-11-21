<?php

require_once("app/models/dashboard_model.php");

class Pengguna_Model
{
    private $db;
    private $dashboard;
    private $table = "pengguna";

    public function __construct()
    {
        $this->db = new Database;
        $this->dashboard = new Dashboard_Model;
    }

    private function generateID(string $set)
    {
        $numbs = explode("-", $set);
        return "USR" . join("", $numbs) . date("s");
    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
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

    public function getByEmail($email = "")
    {
        if (!empty($email)) {
            $this->db->query("SELECT * FROM pengguna WHERE email=:email");
            $this->db->bind("email", $email);
            return $this->db->single();
        } else {
            return false;
        }
    }

    public function getAllLaporan($id = "")
    {
        if (!empty($id)) {
            // ambil semua pengaduan, informasi dan aspirasi berdasarkan id
            return true;
        }
    }

    public function save($data = [])
    {
        // check uniq mail
        $this->checkUniqEmail($data["email"]);
        // Current Time Stamp
        $date = date("Y-m-d H:i:s");
        // Save Data
        $this->db->query('INSERT INTO ' . $this->table . ' (id, nama, email, password, tgl_lahir, jenis_kelamin, alamat, kontak, status, akses, foto, created_at, updated_at) VALUES (:id, :nama, :email, :password, :tgl_lahir, :jenis_kelamin, :alamat, :kontak, :status, :akses, :foto, :created_at, :updated_at)');
        // binding data
        $this->db->bind("id", $this->generateID($data["tgl_lahir"]));
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
        $this->db->bind("foto", "USER-default.png");
        $this->db->bind("created_at", $date);
        $this->db->bind("updated_at", $date);
        $this->db->execute();
        if ($this->db->rowCount() == 0) {
            throw new Exception("Gagal menambahkan pengguna");
        }
        $this->dashboard->actionPengguna("add");
        return $data;
    }

    public function update($data, $id)
    {
        // Save Data
        $this->db->query('UPDATE ' . $this->table . ' SET nama=:nama, tgl_lahir=:tgl_lahir, jenis_kelamin=:jenis_kelamin, alamat=:alamat, kontak=:kontak, status=:status, akses=:akses, updated_at=:updated_at WHERE id=:id');
        // binding data
        $this->db->bind("nama", ucwords($data["nama"]));
        $this->db->bind("tgl_lahir", $data["tgl_lahir"]);
        $this->db->bind("jenis_kelamin", $data["jenis_kelamin"]);
        $this->db->bind("alamat", $data["alamat"]);
        $this->db->bind("kontak", $data["kontak"]);
        $this->db->bind("status", $data["status"]);
        $this->db->bind("akses", $data["akses"]);
        $this->db->bind("updated_at", date("Y-m-d H:i:s"));
        $this->db->bind("id", $id);
        $this->db->execute();
        if ($this->db->rowCount() == 0) {
            throw new Exception("Gagal memperbarui pengguna");
        }
        return $data;
    }

    public function resetPassword(string $email)
    {
        var_dump($email);
        die;
    }

    public function delete($id)
    {
        if (empty($id)) {
            throw new Exception("Gagal menghapus pengguna.");
        }
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind("id", $id);
        $this->db->execute();
        $this->dashboard->actionPengguna("less");
        return [];
    }

    public function checkUniqEmail($email = "")
    {
        if (!empty($email)) {
            $this->db->query("SELECT * FROM petugas WHERE email=:email");
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

    public function register($data = [])
    {
        if (!empty($data)) {
            // check uniq email
            $this->checkUniqEmail($data["email"]);
            // Current Time Stamp
            $date = date("Y-m-d H:i:s");
            // Register query
            $this->db->query('INSERT INTO ' . $this->table . ' (id, nama, email, password, tgl_lahir, jenis_kelamin, alamat, kontak, status, akses, foto, created_at, updated_at) VALUES (:id, :nama, :email, :password, :tgl_lahir, :jenis_kelamin, :alamat, :kontak, :status, :akses, :foto, :created_at, :updated_at)');
            // binding data
            $this->db->bind("id", $this->generateID($data["tgl_lahir"]));
            $this->db->bind("nama", ucwords($data["nama_lengkap"]));
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
            $this->db->bind("alamat", "");
            $this->db->bind("kontak", $data["kontak"]);
            $this->db->bind("status", $data["status"]);
            $this->db->bind("akses", "aktif");
            $this->db->bind("foto", "USER-default.png");
            $this->db->bind("created_at", $date);
            $this->db->bind("updated_at", $date);
            $this->db->execute();
            if ($this->db->rowCount() == 0) {
                throw new Exception("Gagal Registrasi");
            }
            // set idverifikasi
            $idVerifikasi = $this->generateVerifikasi($data["email"]);
            // Send Mail
            if (!PHPmail($data["email"], "E-LAPOR | VERIFIKASI EMAIL", PHPmailVerifikasi($data["nama_lengkap"], BaseURL() . "/users/verifikasi/" . $idVerifikasi))) {
                throw new Exception("Gagal melakukan pengiriman tautan verifikasi!");
            }
            $this->dashboard->actionPengguna("add");
            return $data;
        } else {
            throw new Exception("Gagal melakukan registarsi!");
        }
    }

    public function userUpdate($data, $foto)
    {
        if (!empty($data)) {
            $this->db->query("UPDATE " . $this->table . " SET nama=:nama, tgl_lahir=:tgl_lahir, jenis_kelamin=:jenis_kelamin, alamat=:alamat, kontak=:kontak, status=:status, foto=:foto, updated_at=:updated_at WHERE id=:id");
            $this->db->bind("nama", ucwords($data["nama"]));
            $this->db->bind("tgl_lahir", $data["tgl_lahir"]);
            $this->db->bind("jenis_kelamin", $data["jenis_kelamin"]);
            $this->db->bind("alamat", $data["alamat"]);
            $this->db->bind("kontak", $data["kontak"]);
            $this->db->bind("status", $data["status"]);
            if ($foto["foto"]["error"] != 4) {
                $file = explode(".", $foto["foto"]["name"]);
                $extension = end($file);
                // hapus foto lama
                RemoveFileUpload("/images/" . $data["foto_lama"]);
                // Upload File ( 2MB 2097152 )
                UploadFile($foto, $data["id"], 2097152, ["image/jpeg", "image/jpg", "image/png"], "images");
                $this->db->bind("foto", $data["id"] . "." . $extension);
                $_SESSION["user"]["foto"] = $data["id"] . "." . $extension;
            } else {
                $this->db->bind("foto", $data["foto_lama"]);
            }
            $this->db->bind("updated_at", date("Y-m-d H:i:s"));
            $this->db->bind("id", $data["id"]);
            $this->db->execute();
            if ($this->db->rowCount() == 0) {
                throw new Exception("Gagal memperbarui profil");
            }
            return $data;
        } else {
            throw new Exception("Gagal memperbarui profil!");
        }
    }

    public function userUpdatePassword($data)
    {
        try {
            if ($data["password1"] === $data["password2"]) {
                $user = $this->get($_SESSION["user"]["id"]);
                if (password_verify($data["password"], $user["password"])) {
                    $this->db->query("UPDATE " . $this->table . " SET password=:password, updated_at=:updated_at WHERE id=:id");
                    $this->db->bind("password", password_hash($data["password1"], PASSWORD_DEFAULT));
                    $this->db->bind("updated_at", date("Y-m-d H:i:s"));
                    $this->db->bind("id", $_SESSION["user"]["id"]);
                    $this->db->execute();
                    return true;
                } else {
                    throw new Exception("Password yang anda masukkan salah!");
                }
            } else {
                throw new Exception("Password tidak sama!");
            }
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
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
            $this->db->query("UPDATE pengguna SET verifikasi_daftar=:verifikasi, updated_at=:updated_at WHERE email=:email");
            $this->db->bind("verifikasi", "aktif");
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

    public function login($data = [])
    {
        if (!empty($data)) {
            $pengguna = $this->getByEmail($data["email"]);
            if ($pengguna) {
                if (password_verify($data["password"], $pengguna["password"])) {
                    if ($pengguna["verifikasi_daftar"] == "aktif") {
                        if ($pengguna["akses"] == "aktif") {
                            $this->updateLastLogin($pengguna["id"]);
                            setSession("user", [
                                "id" => $pengguna["id"],
                                "nama" => $pengguna["nama"],
                                "email" => $pengguna["email"],
                                "foto" => $pengguna["foto"],
                            ]);
                            return $pengguna;
                        } else {
                            throw new Exception("Akun sedang ditangguhkan!");
                        }
                    } else {
                        // cek waktu
                        $this->db->query("SELECT * FROM users_verifikasi WHERE email=:email");
                        $this->db->bind("email", $pengguna["email"]);
                        $verifikasi = $this->db->single();
                        if ($verifikasi["time_limit"] <= time()) {
                            // set idverifikasi
                            $idVerifikasi = $this->generateVerifikasi($pengguna["email"], 5, "update");
                            // Send Mail
                            if (!PHPmail($pengguna["email"], "E-LAPOR | VERIFIKASI EMAIL", PHPmailVerifikasi($pengguna["nama"], BaseURL() . "/users/verifikasi/" . $idVerifikasi))) {
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
        } else {
            throw new Exception("Gagal melakukan request login!");
        }
    }
}
