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
            Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
            header("Location: " . BaseURL() . "/auth/daftar");
            exit;
        }
    }

    public function recovery()
    {
        UserIsActive();
        $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Lupa Password",
        ];

        $this->view("auth/recovery", $data);
    }

    public function logout()
    {
        session_destroy();
        header("Location: " . BaseURL() . "/auth");
    }
}
