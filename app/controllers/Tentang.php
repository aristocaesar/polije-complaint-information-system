<?php
require_once "app/core/Controller.php";

class Tentang extends Controller
{

    public function index()
    {
        $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Tentang",
        ];

        $this->view("tentang/index", $data);
    }
}
