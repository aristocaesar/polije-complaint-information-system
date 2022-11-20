<?php
require_once "app/core/Controller.php";

class Users extends Controller
{

    public function index()
    {
        UserIsTrue();
        $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - User Area",
            "laporan" => $this->model("pengguna_model")->getAllLaporan($_SESSION["user"]["id"])
        ];

        $this->view("users/index", $data);
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
