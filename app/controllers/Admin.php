<?php
require_once "app/core/Controller.php";

class Admin extends Controller
{
    public $title = "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember";
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
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Pengaduan",
            "layout_admin" => true
        ]);
    }

    // Informasi
    public function informasi($action = "")
    {
        if ($action != "") {
        } else {
            $this->view("admin/informasi/masuk", $data = [
                "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Informasi",
                "layout_admin" => true,
                // "css" => ["select2.min"],
                // "js" => ["select2.full.min"]
            ]);
        }
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
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Divisi",
            "layout_admin" => true
        ]);
    }

    // Pengguna
    public function pengguna($action = "")
    {
        if ($action != "") {
            if ($action == "verifikasi") {
                $this->view("admin/pengguna/verifikasi", $data = [
                    "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Pengajuan Verifikasi",
                    "layout_admin" => true
                ]);
            }
        } else {
            $this->view("admin/pengguna/index", $data = [
                "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Pengguna",
                "layout_admin" => true
            ]);
        }
    }

    // Petugas
    public function petugas($action = "")
    {
        if ($action != "") {
        } else {
            $this->view("admin/petugas", $data = [
                "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Petugas",
                "layout_admin" => true
            ]);
        }
    }

    // Profile
    public function profil($action = "")
    {
        if ($action == "aktifitas") {
            $this->view("admin/profil/aktifitas", $data = [
                "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Aktifitas",
                "layout_admin" => true
            ]);
        } else if ($action == "pengaturan") {
            $this->view("admin/profil/pengaturan", $data = [
                "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Aktifitas",
                "layout_admin" => true
            ]);
        } else {
            $this->view("admin/profil/index", $data = [
                "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Profile",
                "layout_admin" => true
            ]);
        }
    }

    // Logout
    public function logout()
    {
        $this->view("admin/auth", $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Dashboard",
            "layout_admin" => true
        ]);
    }
}
