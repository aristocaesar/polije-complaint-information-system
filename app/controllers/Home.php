<?php
require_once "app/core/Controller.php";

class Home extends Controller
{

    public function index()
    {
        $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember",
        ];

        $this->view("home/index", $data);
    }
}
