<?php
require_once "app/core/Controller.php";

class Admin extends Controller
{
    public function index()
    {
        $this->view("admin/auth", $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Login",
            "layout" => "admin"
        ]);
    }

    public function dashboard()
    {
        $this->view("admin/dashboard", $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Dashboard",
            "bodyId" => "page-top"
        ]);
    }
}
