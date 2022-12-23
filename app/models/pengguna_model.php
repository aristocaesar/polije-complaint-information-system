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
            // check length
            if (
                strlen($data["nama_lengkap"]) >= 64 ||
                strlen($data["email"]) >= 45 ||
                strlen($data["password"]) >= 64 ||
                strlen($data["password2"]) >= 64 ||
                strlen($data["kontak"]) >= 18
            ) {
                throw new Exception("Informasi pengguna tidak sesuai!");
            }
            // check uniq email
            $this->checkUniqEmail($data["email"]);
            // Current Time Stamp
            $date = date("Y-m-d H:i:s");
            // Register query
            $this->db->query('INSERT INTO ' . $this->table . ' (id, nama, email, password, tgl_lahir, jenis_kelamin, alamat, kontak, status, akses, foto, created_at, updated_at) VALUES (:id, :nama, :email, :password, :tgl_lahir, :jenis_kelamin, :alamat, :kontak, :status, :akses, :foto, :created_at, :updated_at)');
            // binding data
            $this->db->bind("id", $this->generateID($data["tgl_lahir"]));
            $this->db->bind("nama", ucwords(strtolower($data["nama_lengkap"])));
            $this->db->bind("email", $data["email"]);
            // check same character
            if ($data["password"] != $data["password2"]) {
                throw new Exception("Password tidak sama!");
            }
            // hash password
            $password = password_hash($data["password"], PASSWORD_DEFAULT);
            $this->db->bind("password", $password);
            $tglLahir = $data["tgl_lahir"];
            if (empty($tglLahir)) {
                $tglLahir = date("m/d/Y", strtotime(time()));
            }
            $this->db->bind("tgl_lahir", $tglLahir);
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
            if (!PHPmail($data["email"], "E-LAPOR | VERIFIKASI EMAIL", PHPmailVerifikasi(ucwords(strtolower($data["nama_lengkap"])), BaseURL() . "/users/verifikasi/" . $idVerifikasi))) {
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
            if (empty($data["nama"]) || empty($data["alamat"]) || empty($data["kontak"])) {
                throw new Exception("Harap melengkapi data yang tersedia");
            }
            $this->db->query("UPDATE " . $this->table . " SET nama=:nama, tgl_lahir=:tgl_lahir, jenis_kelamin=:jenis_kelamin, alamat=:alamat, kontak=:kontak, status=:status, foto=:foto, updated_at=:updated_at WHERE id=:id");
            $this->db->bind("nama", ucwords($data["nama"]));
            if (strlen($data["nama"]) >= 64) {
                throw new Exception("Nama terlalu panjang!");
            }
            $_SESSION["user"]["nama"] = $data["nama"];
            $this->db->bind("tgl_lahir", $data["tgl_lahir"]);
            $this->db->bind("jenis_kelamin", $data["jenis_kelamin"]);
            if (strlen($data["alamat"]) >= 128) {
                throw new Exception("Alamat terlalu panjang!");
            }
            $this->db->bind("alamat", $data["alamat"]);
            if (strlen($data["kontak"]) >= 18) {
                throw new Exception("Kontak terlalu panjang!");
            }
            $this->db->bind("kontak", $data["kontak"]);
            $this->db->bind("status", $data["status"]);
            if ($foto["foto"]["error"] != 4) {
                $file = explode(".", $foto["foto"]["name"]);
                $extension = end($file);
                // Upload File ( 2MB 2097152 )
                UploadFile($foto, $data["id"], 2097152, ["image/jpeg", "image/jpg", "image/png"], "images");
                // hapus foto lama
                RemoveFileUpload("/images/" . $data["foto_lama"]);
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
                if (strlen($data["password"]) >= 64 || strlen($data["password1"]) >= 64 || strlen($data["password1"]) >= 64) {
                    throw new Exception("Password tidak sama!");
                }
                $user = $this->get($_SESSION["user"]["id"]);
                if (password_verify($data["password"], $user["password"])) {
                    if ($data["password1"] != $data["password"]) {
                        $this->db->query("UPDATE " . $this->table . " SET password=:password, updated_at=:updated_at WHERE id=:id");
                        $this->db->bind("password", password_hash($data["password1"], PASSWORD_DEFAULT));
                        $this->db->bind("updated_at", date("Y-m-d H:i:s"));
                        $this->db->bind("id", $_SESSION["user"]["id"]);
                        $this->db->execute();
                        return true;
                    } else {
                        throw new Exception("Password ini sedang anda gunakan!");
                    }
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
        if ($verifikasi) {
            if ($verifikasi["time_limit"] >= time()) {
                // update users
                $this->updateToVerified($verifikasi["email"]);
                // // hapus data verifikasi
                $this->removeDataVerifikasi($verifikasi["email"]);
                return true;
            } else {
                throw new Exception("Tautan sudah kadaluarsa!");
            }
        } else {
            throw new Exception("Tautan sudah kadaluarsa!");
        }
    }

    public function updateToVerified($email)
    {
        if (!empty($email)) {
            $this->db->query("UPDATE pengguna SET verifikasi_daftar=:verifikasi, verifikasi_email=:verifikasi_email,  updated_at=:updated_at WHERE email=:email");
            $this->db->bind("verifikasi", "terverifikasi");
            $this->db->bind("verifikasi_email", "terverifikasi");
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
            if (strlen($data["email"]) >= 45 || strlen($data["password"]) >= 64) {
                throw new Exception("Email atau Password salah!");
            }
            $pengguna = $this->getByEmail($data["email"]);
            if ($pengguna) {
                if (password_verify($data["password"], $pengguna["password"])) {
                    if ($pengguna["verifikasi_daftar"] == "terverifikasi") {
                        if ($pengguna["akses"] == "aktif") {
                            $this->updateLastLogin($pengguna["id"]);
                            if (!isset($data["mobile"])) {
                                setSession("user", [
                                    "id" => $pengguna["id"],
                                    "nama" => $pengguna["nama"],
                                    "email" => $pengguna["email"],
                                    "foto" => $pengguna["foto"],
                                ]);
                            }
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

    public function generateRecoveryToken(String $email = "", int $time = 5, String $action = "create")
    {
        if (!empty($email)) {
            $date = date("Y-m-d H:i:s");
            $token = substr(md5(openssl_random_pseudo_bytes(20)), -32);
            $times = 60 * $time;
            $limit = time() + $times;
            if ($action == "create") {
                $this->db->query("INSERT INTO users_recovery (email, verifikasi, time_limit, created_at, updated_at) VALUES (:email, :verifikasi, :time_limit, :created_at, :updated_at)");
                $this->db->bind("email", $email);
                $this->db->bind("verifikasi", $token);
                $this->db->bind("time_limit", $limit);
                $this->db->bind("created_at", $date);
                $this->db->bind("updated_at", $date);
                $this->db->execute();
            } else if ($action == "update") {
                $this->db->query("UPDATE users_recovery SET verifikasi=:verifikasi, time_limit=:time_limit, updated_at=:updated_at WHERE email=:email");
                $this->db->bind("verifikasi", $token);
                $this->db->bind("time_limit", $limit);
                $this->db->bind("updated_at", $date);
                $this->db->bind("email", $email);
                $this->db->execute();
            }
            return $token;
        } else {
            throw new Exception("Gagal melakukan pemulihan kata sandi");
        }
    }

    public function recoveryCheck(String $email = "")
    {
        if (!empty($email)) {
            $this->db->query("SELECT * FROM users_recovery WHERE email=:email");
            $this->db->bind("email", $email);
            return $this->db->single();
        } else {
            throw new Exception("Error Processing Check Recovery");
        }
    }

    public function recoveryPassword(String $email = "")
    {
        if (!empty($email)) {
            // cek email user 
            $user = $this->getByEmail($email);
            if ($user) {
                // cek data recovery, jika tidak ada maka buat token
                $recovery = $this->recoveryCheck($email);
                if (!$recovery) {
                    // create token
                    $token = $this->generateRecoveryToken($email, 5);
                    // send email with new updated token
                    PHPmail($user["email"], "E-LAPOR | RECOVERY PASSWORD", PHPmailRecovery($user["nama"], BaseURL() . "/auth/recovery/" . $token));
                } else {
                    // update token when time expired
                    if ($recovery["time_limit"] <= time()) {
                        $token = $this->generateRecoveryToken($email, 5, "update");
                        // send email with new updated token
                        PHPmail($user["email"], "E-LAPOR | RECOVERY PASSWORD", PHPmailRecovery($user["nama"], BaseURL() . "/auth/recovery/" . $token));
                    }
                }
                return $user;
            } else {
                throw new Exception("Email tidak terdaftar");
            }
        } else {
            throw new Exception("Error Processing Recovery Password");
        }
    }

    public function checkRecoveryToken(String $token = "")
    {
        if (!empty($token)) {
            // cek token
            $this->db->query("SELECT * FROM users_recovery WHERE verifikasi=:token");
            $this->db->bind("token", $token);
            $token = $this->db->single();
            if ($token) {
                if ($token["time_limit"] <= time()) {
                    throw new Exception("Token sudah kadaluarsa");
                } else {
                    return $token;
                }
            } else {
                return false;
            }
        } else {
            throw new Exception("Error Processing Check Token");
        }
    }

    public function removeToken(String $token = "")
    {
        if (!empty($token)) {
            $this->db->query("DELETE FROM users_recovery WHERE verifikasi=:token");
            $this->db->bind("token", $token);
            $this->db->execute();
            return true;
        } else {
            throw new Exception("Error Processing Remove Token");
        }
    }

    public function changePasswordRecovery()
    {
        if (isset($_POST["submit"])) {
            if ($_POST["password"] == $_POST["password2"]) {
                if ($this->checkRecoveryToken($_POST["token"])) {
                    $this->db->query("UPDATE pengguna SET password=:password, updated_at=:updated_at WHERE email=:email");
                    $this->db->bind("password", password_hash($_POST["password"], PASSWORD_DEFAULT));
                    $this->db->bind("updated_at", date("Y-m-d H:i:s"));
                    $this->db->bind("email", $_POST["email"]);
                    $this->db->execute();
                    $this->removeToken($_POST["token"]);
                    return true;
                }
            } else {
                throw new Exception("Password tidak sama");
            }
        } else {
            throw new Exception("Gagal memperbarui password");
        }
    }

    public function checkEmailVerifikasi(String $email = "")
    {
        if (!empty($email)) {
            $this->db->query("SELECT * FROM users_verifikasi WHERE email=:email");
            $this->db->bind("email", $email);
            return $this->db->single();
        } else {
            return false;
        }
    }

    public function sendEmail($email, $nama, $token)
    {
        // send email
        if (!PHPmail($email, "E_LAPOR | VERIFIKASI EMAIL", PHPmailVerifikasi($nama, BaseURL() . "/users/verifikasi/" . $token))) {
            throw new Exception("Error Processing Sending Email");
        };
        return true;
    }

    public function changeEmail()
    {
        // update email
        $id = "";
        $nama = "";

        if (isset($_POST["id_user_mobile"])) {
            $id = $_POST["id_user_mobile"];
            $user = $this->get($id);
            $nama = $user["nama"];
            if (!password_verify($_POST["password"], $user["password"])) {
                throw new Exception("Password salah");
            }
            if ($_POST["email"] == $user["email"]) {
                throw new Exception("Email tersebut sedang anda gunakan");
            }
        } else {
            $id = $_SESSION["user"]["id"];
            $nama = $_SESSION["user"]["nama"];
        }

        $this->db->query("UPDATE " . $this->table . " SET email=:email, verifikasi_email=:verifikasi, created_at=:created_at WHERE id=:id");
        $this->db->bind("email", $_POST["email"]);
        $this->db->bind("verifikasi", "belum_terverifikasi");
        $this->db->bind("created_at", date("Y-m-d H:i:s"));
        $this->db->bind("id", $id);
        $this->db->execute();
        if ($this->db->rowCount() != 0) {
            // update session email
            if (!isset($_POST["id_user_mobile"])) {
                $_SESSION["user"]["email"] = $_POST["email"];
            }
            // check email on verifikasi
            // if user verifkasi as true (update token) and false (create token)
            $token = "";
            $emailVerifikasiAvaible = $this->checkEmailVerifikasi($_POST["email"]);
            if (!$emailVerifikasiAvaible) {
                // create token on db 
                $token = $this->generateVerifikasi($_POST["email"]);
                $this->sendEmail($_POST["email"], $nama, $token);
            } else {
                // update token on db
                if ($emailVerifikasiAvaible["time_limit"] <= time()) {
                    $newToken = $this->generateVerifikasi($_POST["email"], 5, "update");
                    $this->sendEmail($_POST["email"], $nama, $newToken);
                }
            }
            return [
                "message" => "Berhasil memperbarui email, silakan check email untuk konfirmasi"
            ];
        } else {
            throw new Exception("Gagal memperbarui email");
        }
    }

    public function newVerifikasi()
    {
        $nama = "";
        $email = "";
        if (isset($_SESSION["user"]["email"])) {
            $nama = $_SESSION["user"]["nama"];
            $email = $_SESSION["user"]["email"];
        } else {
            $nama = $_POST["nama_lengkap"];
            $email = $_POST["email"];
        }
        $this->db->query("SELECT * FROM users_verifikasi WHERE email=:email");
        $this->db->bind("email", $email);
        $userVerifikasi = $this->db->single();
        if ($userVerifikasi["time_limit"] <= time()) {
            $token = $this->generateVerifikasi($nama, 5, "update");
            $this->sendEmail($email, $nama, $token);
            return true;
        } else {
            return true;
        }
    }

    public function saveMobile()
    {
        if (isset($_POST)) {
            $this->db->query("UPDATE " . $this->table . " SET nama=:nama, tgl_lahir=:tgl_lahir, jenis_kelamin=:jenis_kelamin, alamat=:alamat, kontak=:kontak, status=:status, updated_at=:updated_at WHERE id=:id");
            $this->db->bind("nama", $_POST["nama"]);
            $this->db->bind("tgl_lahir", $_POST["tgl_lahir"]);
            $this->db->bind("jenis_kelamin", $_POST["jenis_kelamin"]);
            $this->db->bind("alamat", $_POST["alamat"]);
            $this->db->bind("kontak", $_POST["kontak"]);
            $this->db->bind("status", $_POST["status"]);
            $this->db->bind("updated_at", date("Y-m-d H:i:s"));
            $this->db->bind("id", $_POST["id_user_mobile"]);
            $this->db->execute();
            return $_POST;
        }
    }

    public function updatePasswordMobile()
    {
        if (isset($_POST) && !empty($_POST)) {
            if ($_POST["password"] == $_POST["password2"]) {
                $user = $this->get($_POST["id_user_mobile"]);
                if (password_verify($_POST["old_password"], $user["password"])) {
                    if ($_POST["password"] != $_POST["old_password"]) {
                        $this->db->query("UPDATE " . $this->table . " SET password=:password, updated_at=:updated_at WHERE id=:id");
                        $this->db->bind("password", password_hash($_POST["password"], PASSWORD_DEFAULT));
                        $this->db->bind("updated_at", date("Y-m-d H:i:s"));
                        $this->db->bind("id", $user["id"]);
                        $this->db->execute();
                        return [
                            "message" => "Password berhasil diperbarui!"
                        ];
                    } else {
                        throw new Exception("Password ini sedang anda gunakans");
                    }
                } else {
                    throw new Exception("Password lama salah!");
                }
            } else {
                throw new Exception("Password tidak sama!");
            }
        } else {
            throw new Exception("Error Processing Request Change Password");
        }
    }

    public function updateFotoMobile()
    {
        if (isset($_FILES["foto"]) == true && isset($_POST["id_user_mobile"]) == true) {
            $user = $this->get($_POST["id_user_mobile"]);
            if ($user) {
                if ($_FILES["foto"]["error"] != 4) {
                    $this->db->query("UPDATE " . $this->table . " SET foto=:foto, updated_at=:updated_at WHERE id=:id");
                    $file = explode(".", $_FILES["foto"]["name"]);
                    $extension = end($file);
                    // hapus foto lama
                    RemoveFileUpload("/images/" . $user["foto"]);
                    // Upload File ( 2MB 2097152 )
                    UploadFile($_FILES, $user["id"], 2097152, ["image/jpeg", "image/jpg", "image/png"], "images");
                    $this->db->bind("foto", $user["id"] . "." . $extension);
                    $this->db->bind("updated_at", date("Y-m-d H:i:s"));
                    $this->db->bind("id", $user["id"]);
                    $this->db->execute();
                    return $user;
                } else {
                    throw new Exception("Error Processing Change Photo Request");
                }
            } else {
                throw new Exception("Error Processing Change Photo Request");
            }
        } else {
            throw new Exception("Error Processing Change Photo Request");
        }
    }
}
