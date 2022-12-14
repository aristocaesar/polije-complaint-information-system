<?php
require_once "app/core/Controller.php";

class Auth extends Controller
{
    public function index()
    {
        UserIsActive();
        try {
            if (isset($_POST["submit"])) {
                $this->model("pengguna_model")->login($_POST);
                Flasher::setMessage("Berhasil Login", "Hallo, Selamat Datang " . $_SESSION["user"]["nama"], "success");
                header("Location: " . BaseURL() . "/users");
                exit;
            }
            $data = [
                "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Masuk",
            ];
            $this->view("auth/masuk", $data);
        } catch (Exception $error) {
            Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
            header("Location: " . BaseURL() . "/auth");
            exit;
        }
    }

    public function daftar()
    {
        UserIsActive();
        try {
            if (isset($_POST["submit"])) {
                $this->model("pengguna_model")->register($_POST);
                Flasher::setMessage("Berhasil", "Berhasil registrasi, silakan verifikasi untuk login", "success");
                header("Location: " . BaseURL() . "/auth");
                exit;
            }
            $data = [
                "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Daftar",
            ];
            $this->view("auth/daftar", $data);
        } catch (Exception $error) {
            if ($error->getCode() == 23000) {
                Flasher::setMessage("Terjadi Kesalahan!", "Email sudah digunakan!", "error");
            } else {
                Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
            }
            header("Location: " . BaseURL() . "/auth/daftar");
            exit;
        }
    }

    public function recovery(String $token = "")
    {
        try {
            UserIsActive();
            $data = [
                "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Lupa Password",
            ];
            if ($token == "") {
                if (isset($_POST["submit"])) {
                    $this->model("pengguna_model")->recoveryPassword($_POST["email"]);
                    Flasher::setMessage("Berhasil", "Tautan pemulihan berhasil dikirimkan, silakan cek email", "success");
                    header("Location: " . BaseURL() . "/auth/recovery");
                    exit;
                }
            } else {
                if (isset($_POST["submit"])) {
                    // ubah password
                    $this->model("pengguna_model")->changePasswordRecovery();
                    Flasher::setMessage("Berhasil", "Password berhasil diperbarui, silakan login kembali", "success");
                    header("Location: " . BaseURL() . "/auth");
                    exit;
                } else {
                    $avaibleToken = $this->model("pengguna_model")->checkRecoveryToken($token);
                    if ($avaibleToken) {
                        $data["token"] = $token;
                        $data["email"] = $avaibleToken["email"];
                        $this->view("auth/setup_password", $data);
                        exit;
                    } else {
                        throw new Exception("Token sudah kadaluarsa");
                    }
                }
            }

            $this->view("auth/recovery", $data);
        } catch (Exception $error) {
            Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
            header("Location: " . BaseURL() . "/auth/recovery");
            exit;
        }
    }

    public function logout()
    {
        unset($_SESSION["user"]);
        header("Location: " . BaseURL() . "/auth");
    }
}
