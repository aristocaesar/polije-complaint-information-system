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
            "laporan" => $this->model("pengguna_model")->getAllLaporan($userID),
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
