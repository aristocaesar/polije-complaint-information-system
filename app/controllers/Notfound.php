<?php
require_once "app/core/Controller.php";

class Notfound extends Controller
{
    public function __construct()
    {
        if (isset($_SESSION["user"])) {
            $user = $this->model("pengguna_model")->get($_SESSION["user"]["id"]);
            if (empty($user)) {
                header("Location: " . BaseURL() . "/auth/logout");
            }
        }
    }

    public function index()
    {
        $this->view("404", $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Halaman Tidak Ditemukan",
        ]);
    }
}
