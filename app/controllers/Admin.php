<?php
require_once "app/core/Controller.php";

class Admin extends Controller
{
    // Login
    public function index()
    {
        $this->view("admin/auth", $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Login",
            "layout_admin" => true
        ]);
    }

    // Dasboard
    public function dashboard()
    {
        $this->view("admin/dashboard", $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Dashboard",
            "layout_admin" => true
        ]);
    }

    // Pengaduan
    public function pengaduan()
    {
        $this->view("admin/dashboard", $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Dashboard",
            "layout_admin" => true
        ]);
    }

    // Kategori
    public function kategori()
    {
        $this->view("admin/kategori", $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Kategori",
            "layout_admin" => true
        ]);
    }

    // Divisi
    public function divisi($action = "")
    {
        $this->view("admin/divisi", $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Kategori",
            "layout_admin" => true
        ]);
    }
}
