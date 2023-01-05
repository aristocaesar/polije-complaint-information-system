<?php
require_once "app/core/Controller.php";

class Tentang extends Controller
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
        $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Tentang",
        ];

        $this->view("tentang/index", $data);
    }
}
