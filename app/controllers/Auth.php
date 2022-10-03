<?php
require_once "app/core/Controller.php";

class Auth extends Controller
{

    public function index()
    {
        $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Masuk",
        ];

        $this->view("auth/masuk", $data);
    }

    public function daftar()
    {
        $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Daftar",
        ];

        $this->view("auth/daftar", $data);
    }
    public function recovery()
    {
        $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Lupa Password",
        ];

        $this->view("auth/recovery", $data);
    }
}
