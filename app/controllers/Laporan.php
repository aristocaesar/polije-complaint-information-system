<?php
require_once "app/core/Controller.php";

class Laporan extends Controller
{

    public function index()
    {
        $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Laporan",
        ];

        $this->view("laporan/index", $data);
    }
}
