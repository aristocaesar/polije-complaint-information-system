<?php
require_once "app/core/Controller.php";

class Notfound extends Controller
{
    public function index()
    {
        $this->view("404", $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Halaman Tidak Ditemukan",
        ]);
    }
}
