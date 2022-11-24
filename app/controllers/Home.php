<?php
require_once "app/core/Controller.php";

class Home extends Controller
{

    public function index()
    {
        try {
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
                    generatePDF::Klasifikasi($_SESSION["p_rahasia"]["id"], $_POST["judul"], $_POST["deskripsi"], $_SESSION["p_rahasia"]["date"]);
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
            Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
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
