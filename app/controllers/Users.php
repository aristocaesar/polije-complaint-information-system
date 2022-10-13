<?php
require_once "app/core/Controller.php";

class Users extends Controller
{

    public function index()
    {
        $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - User Area",
        ];

        $this->view("users/index", $data);
    }
}
