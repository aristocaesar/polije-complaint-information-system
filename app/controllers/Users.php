<?php
require_once "app/core/Controller.php";

class Users extends Controller
{

    public function index()
    {
        UserIsTrue();
        $userID = $_SESSION["user"]["id"];
        $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - User Area",
            "user" => $this->model("pengguna_model")->get($userID),
            "pengaduan" => $this->model("pengaduan_model")->getByPengguna($userID),
            "aspirasi" => $this->model("aspirasi_model")->getByPengguna($userID),
            "informasi" => $this->model("informasi_model")->getByPengguna($userID)
        ];

        $this->view("users/index", $data);
    }

    public function profil()
    {
        if (isset($_POST["submit"])) {
            try {
                $this->model("pengguna_model")->userUpdate($_POST, $_FILES);
                Flasher::setMessage("Berhasil", "Berhasil memperbarui profil", "success");
                header("Location: " . BaseURL() . "/users");
                exit;
            } catch (Exception $error) {
                Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
                header("Location: " . BaseURL() . "/users");
                exit;
            }
        } else {
            header("Location: " . BaseURL() . "/users");
            exit;
        }
    }

    public function changeemail()
    {
        try {
            if (isset($_POST["submit"])) {
                if ($_POST["email"] == $_POST["email2"]) {
                    $userLogin = $this->model("pengguna_model")->get($_SESSION["user"]["id"]);
                    if ($userLogin["email"] != $_POST["email"]) {
                        $user = $this->model("petugas_model")->getByEmail($_POST["email"]);
                        if (!$user) {
                            if (password_verify($_POST["password"], $userLogin["password"])) {
                                // rubah email dan kirimkan link verifikasi
                                var_dump("ok");
                                die;
                            } else {
                                throw new Exception("Password salah");
                            }
                        } else {
                            throw new Exception("Email sudah digunakan");
                        }
                    } else {
                        throw new Exception("Email ini sedang kamu gunakan");
                    }
                } else {
                    throw new Exception("Email tidak sama");
                }
            } else {
                header("Location: " . BaseURL() . "/users");
                exit;
            }
        } catch (Exception $error) {
            Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
            header("Location: " . BaseURL() . "/users");
            exit;
        }
    }

    public function changepassword()
    {
        if (isset($_POST["submit"])) {
            try {
                $this->model("pengguna_model")->userUpdatePassword($_POST);
                Flasher::setMessage("Berhasil", "Berhasil memperbarui password, silakan login", "success");
                header("Location: " . BaseURL() . "/auth/logout");
                exit;
            } catch (Exception $error) {
                Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
                header("Location: " . BaseURL() . "/users");
                exit;
            }
        } else {
            header("Location: " . BaseURL() . "/users");
            exit;
        }
    }

    public function verifikasi($idVerifikasi = "")
    {
        try {
            if (!isset($_SESSION["admin"]["id"])) {
                $this->model("pengguna_model")->acceptVerifikasi($idVerifikasi);
                Flasher::setMessage("Berhasil", "Berhasil verifikasi email, silakan login!", "success");
            }
            header("Location: " . BaseURL() . "/auth");
        } catch (Exception $error) {
            Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
            header("Location: " . BaseURL() . "/auth");
            exit;
        }
    }
}
