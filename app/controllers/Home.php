<?php
require_once "app/core/Controller.php";

class Home extends Controller
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
        try {
            if (isset($_SESSION["user"])) {
                $user = $this->model("pengguna_model")->get($_SESSION["user"]["id"]);
                if ($user["verifikasi_email"] == "belum_terverifikasi") {
                    Flasher::setMessage("Peringatan", "Harap memverifikasi akun untuk melakukan pengaduan, aspirasi atau informasi", "info");
                    header("Location: " . BaseURL() . "/users");
                    exit;
                }
            }
            $data = [
                "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember",
                "kategori" => $this->model("kategori_model")->getAll(),
                "divisi" => $this->model("divisi_model")->getAll(),
            ];

            $this->view("home/index", $data);
        } catch (Exception $error) {
            Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
            header("Location: " . BaseURL());
            exit;
        }
    }

    public function pengaduan()
    {
        try {
            if (!empty($_POST)) {
                $this->model("pengaduan_model")->sendPengaduan();
                if (isset($_SESSION["p_rahasia"])) {
                    generatePDF::Klasifikasi($_SESSION["p_rahasia"]["id"], $_POST["deskripsi"], $_SESSION["p_rahasia"]["date"]);
                } else {
                    Flasher::setMessage("Berhasil", "Berhasil mengirim pengaduan", "success");
                    header("Location: " . BaseURL());
                }
                exit;
            } else {
                unset($_SESSION["flash"]);
                header("Location: " . BaseURL());
                exit;
            }
        } catch (Exception $error) {
            if ($error->getCode() == 23000) {
                Flasher::setMessage("Terjadi Kesalahan!", "Data yang anda masukkan tidak valid", "error");
            } else {
                Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
            }
            header("Location: " . BaseURL());
            exit;
        }
    }

    public function aspirasi()
    {
        try {
            if (isset($_POST)) {
                $this->model("aspirasi_model")->sendAspirasi();
                Flasher::setMessage("Berhasil", "Berhasil mengirim aspirasi", "success");
                header("Location: " . BaseURL());
                exit;
            }
        } catch (Exception $error) {
            Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
            header("Location: " . BaseURL());
            exit;
        }
    }

    public function informasi()
    {
        try {
            if (isset($_POST)) {
                $this->model("informasi_model")->sendInformasi();
                Flasher::setMessage("Berhasil", "Berhasil mengirim permintaan informasi", "success");
                header("Location: " . BaseURL());
                exit;
            }
        } catch (Exception $error) {
            Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
            header("Location: " . BaseURL());
            exit;
        }
    }
}
