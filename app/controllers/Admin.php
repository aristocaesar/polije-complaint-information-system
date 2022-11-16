<?php
require_once "app/core/Controller.php";

class Admin extends Controller
{
    public $title = "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember";

    // Login
    public function index($action = "")
    {
        AdminIsActive();
        try {
            if (!empty($action)) {
                if ($action == "login") {
                    if (isset($_POST["submit"])) {
                        if ($this->model("petugas_model")->login($_POST)) {
                            Flasher::setMessage("Selamat Datang!", "Anda berhasil login dengan akun", "success");
                            header("Location: " . BaseURL() . "/admin/dashboard");
                        }
                    }
                }
            }
            $this->view("admin/auth", $data = [
                "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Login",
                "layout_admin" => true
            ]);
        } catch (Exception $error) {
            Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
            header("Location: " . BaseURL() . "/admin");
            exit;
        }
    }

    // Dasboard
    public function dashboard()
    {
        AdminIsTrue();
        $this->view("admin/dashboard", $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Dashboard",
            "layout_admin" => true,
            "main" => $this->model("dashboard_model")->getDataMain()
        ]);
    }

    // Pengaduan
    public function pengaduan($action = "")
    {
        AdminIsTrue();
        if ($action != "") {
            if (isset($_POST)) {
                if ($action == "toproses") {
                    // Ubah Status Informasi menjadi proses
                    header("Location: " . BaseURL() . "/admin/informasi");
                    exit;
                }
            }
            if ($action == "proses") {
                $this->view("admin/pengaduan/proses", $data = [
                    "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Pengaduan Proses",
                    "layout_admin" => true,
                ]);
                return;
            }
            if ($action == "selesai") {
                $this->view("admin/pengaduan/selesai", $data = [
                    "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Pengaduan Selesai",
                    "layout_admin" => true,
                ]);
                return;
            }
        }
        $this->view("admin/pengaduan/masuk", $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Pengaduan Masuk",
            "layout_admin" => true,
        ]);
    }

    // Aspirasi
    public function aspirasi($action = "")
    {
        AdminIsTrue();
        if ($action != "") {
            if (isset($_POST)) {
                if ($action == "toproses") {
                    // Ubah Status Informasi menjadi proses
                    header("Location: " . BaseURL() . "/admin/aspirasie");
                    exit;
                }
            }
            if ($action == "proses") {
                $this->view("admin/aspirasi/proses", $data = [
                    "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Aspirasi Proses",
                    "layout_admin" => true,
                ]);
                return;
            }
            if ($action == "selesai") {
                $this->view("admin/aspirasi/selesai", $data = [
                    "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Aspirasi Selesai",
                    "layout_admin" => true,
                ]);
                return;
            }
        }
        $this->view("admin/aspirasi/masuk", $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Aspirasi Masuk",
            "layout_admin" => true,
        ]);
    }

    // Informasi
    public function informasi($action = "")
    {
        AdminIsTrue();
        try {
            if (!empty($action)) {
                if (isset($_POST["submit"])) {
                    if ($action == "toproses") {
                        // Ubah Status Informasi menjadi proses
                        $this->model("informasi_model")->changeToProces($_POST["id-informasi-tindak-lanjut"]);
                        Flasher::setMessage("Berhasil", "Berhasil memproses informasi", "success");
                    }
                    if ($action == "tangguhkan") {
                        // Ubah Status Informasi menjadi ditangguhkan
                        $this->model("informasi_model")->tangguhkan($_POST["alasan_ditangguhkan"], $_POST["id"]);
                        Flasher::setMessage("Berhasil", "Berhasil menangguhkan informasi", "success");
                    }
                    header("Location: " . BaseURL() . "/admin/informasi");
                    exit;
                }
                if ($action == "proses") {
                    $this->view("admin/informasi/proses", $data = [
                        "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Informasi Proses",
                        "layout_admin" => true,
                    ]);
                    exit;
                }
                if ($action == "selesai") {
                    $this->view("admin/informasi/selesai", $data = [
                        "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Informasi Selesai",
                        "layout_admin" => true,
                        "informasi" => $this->model("informasi_model")->getByStatus("selesai")
                    ]);
                    exit;
                }
            }
            $this->view("admin/informasi/masuk", $data = [
                "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Informasi Masuk",
                "layout_admin" => true,
                "informasi" => $this->model("informasi_model")->getByStatus("belum_ditanggapi")
            ]);
        } catch (Exception $error) {
            Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
            header("Location: " . BaseURL() . "/admin/informasi");
            exit;
        }
    }

    // Kategori
    public function kategori($action = "")
    {
        AdminIsTrue();
        try {
            if (!empty($action)) {
                if (isset($_POST)) {
                    if (isset($_POST["add"])) {
                        $this->model("kategori_model")->save($_POST);
                        Flasher::setMessage("Berhasil", "Berhasil menambahkan kategori", "success");
                    } else if (isset($_POST["update"])) {
                        $this->model("kategori_model")->update($_POST, $_POST["update"]);
                        Flasher::setMessage("Berhasil", "Berhasil memperbarui kategori", "success");
                    } else if (isset($_POST["delete"])) {
                        $this->model("kategori_model")->delete($_POST["delete"]);
                        Flasher::setMessage("Berhasil", "Berhasil menghapus kategori", "success");
                    }
                    header("Location: " . BaseURL() . "/admin/kategori");
                    exit;
                }
            }
            $this->view("admin/kategori", $data = [
                "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Kategori",
                "layout_admin" => true,
                "kategori" => $this->model("kategori_model")->getAll()
            ]);
        } catch (Exception $error) {
            Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
            header("Location: " . BaseURL() . "/admin/kategori");
            exit;
        }
    }

    // Divisi - DONE
    public function divisi($action = "")
    {
        AdminIsTrue();
        try {
            if (!empty($action)) {
                if (isset($_POST["submit"])) {
                    if (isset($_POST["add"])) {
                        $this->model("divisi_model")->save($_POST);
                        Flasher::setMessage("Berhasil", "Berhasil menambahkan divisi", "success");
                    } else if (isset($_POST["update"])) {
                        $this->model("divisi_model")->update($_POST, $_POST["update"]);
                        Flasher::setMessage("Berhasil", "Berhasil memperbarui divisi", "success");
                    } else if (isset($_POST["delete"])) {
                        $this->model("divisi_model")->delete($_POST["delete"]);
                        Flasher::setMessage("Berhasil", "Berhasil menghapus divisi", "success");
                    }
                    header("Location: " . BaseURL() . "/admin/divisi");
                    exit;
                }
            }
            $this->view("admin/divisi", $data = [
                "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Divisi",
                "layout_admin" => true,
                "divisi" => $this->model("divisi_model")->getAll()
            ]);
        } catch (Exception $error) {
            Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
            header("Location: " . BaseURL() . "/admin/divisi");
            exit;
        }
    }

    // Pengguna - DONE
    public function pengguna($action = "")
    {
        AdminIsTrue();
        try {
            if (!empty($action)) {
                if (isset($_POST["submit"])) {
                    if (isset($_POST["add"])) {
                        $this->model("pengguna_model")->save($_POST);
                        Flasher::setMessage("Berhasil", "Berhasil menambahkan pengguna", "success");
                    } else if ($action == "update") {
                        $this->model("pengguna_model")->update($_POST, $_POST["update"]);
                        Flasher::setMessage("Berhasil", "Berhasil memperbarui pengguna", "success");
                    } else if ($action == "delete") {
                        $this->model("pengguna_model")->delete($_POST["delete"]);
                        Flasher::setMessage("Berhasil", "Berhasil menghapus pengguna", "success");
                    }
                    header("Location: " . BaseURL() . "/admin/pengguna");
                    exit;
                }
                if ($action == "verifikasi") {
                    $this->view("admin/pengguna/verifikasi", $data = [
                        "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Pengajuan Verifikasi",
                        "layout_admin" => true
                    ]);
                    exit;
                }
            }
            $this->view("admin/pengguna/index", $data = [
                "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Pengguna",
                "layout_admin" => true,
                "penggunas" => $this->model("pengguna_model")->getAll()
            ]);
        } catch (Exception $error) {
            Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
            header("Location: " . BaseURL() . "/admin/pengguna");
            exit;
        }
    }

    // Petugas - DONE
    public function petugas($action = "")
    {
        AdminIsTrue();
        try {
            if (!empty($action)) {
                if (isset($_POST["submit"])) {
                    if (isset($_POST["add"])) {
                        $this->model("petugas_model")->save($_POST, $_FILES);
                        Flasher::setMessage("Berhasil", "Berhasil menambahkan petugas", "success");
                    } else if ($action == "update") {
                        $this->model("petugas_model")->update($_POST, $_FILES, $_POST["update"]);
                        Flasher::setMessage("Berhasil", "Berhasil memperbarui petugas", "success");
                    } else if ($action == "delete") {
                        $this->model("petugas_model")->delete($_POST["delete"], $_POST["foto"]);
                        Flasher::setMessage("Berhasil", "Berhasil menghapus petugas", "success");
                    }
                }
                header("Location: " . BaseURL() . "/admin/petugas");
                exit;
            }
            $this->view("admin/petugas", $data = [
                "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Petugas",
                "layout_admin" => true,
                "petugas" => $this->model("petugas_model")->getAll()
            ]);
        } catch (Exception $error) {
            Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
            header("Location: " . BaseURL() . "/admin/petugas");
            exit;
        }
    }

    public function verifikasi($idVerifikasi)
    {
        try {
            if (!isset($_SESSION["admin"]["id"])) {
                $this->model("petugas_model")->acceptVerifikasi($idVerifikasi);
                Flasher::setMessage("Berhasil", "Berhasil verifikasi email, silakan login!", "success");
            }
            header("Location: " . BaseURL() . "/admin");
        } catch (Exception $error) {
            Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
            header("Location: " . BaseURL() . "/admin");
            exit;
        }
    }

    // Profile
    public function profil($action = "")
    {
        AdminIsTrue();
        try {
            if (!empty($action)) {
                if (isset($_POST["submit"])) {
                    if ($action == "update") {
                        $this->model("petugas_model")->updateOnProfile($_POST, $_FILES);
                        Flasher::setMessage("Berhasil", "Berhasil memperbarui profil", "success");
                        header("Location: " . BaseURL() . "/admin/profil");
                        exit;
                    } else if ($action == "gantipassword") {
                        $this->model("petugas_model")->updatePassword($_POST);
                        Flasher::setMessage("Berhasil", "Berhasil memperbarui password", "success");
                        header("Location: " . BaseURL() . "/admin/profil/pengaturan");
                        exit;
                    } else if ($action == "gantiemail") {
                        $this->model("petugas_model")->updateEmail($_POST, $_SESSION["admin"]["id"]);
                        Flasher::setMessage("Berhasil", "Berhasil memperbarui email, silakan verifikasi dan login kembali", "success");
                        header("Location: " . BaseURL() . "/admin/profil/pengaturan");
                        Flasher::Redirect("/admin/logout", 5);
                        exit;
                    }
                }
                if ($action == "pengaturan") {
                    $this->view("admin/profil/pengaturan", $data = [
                        "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Aktifitas",
                        "layout_admin" => true
                    ]);
                    exit;
                }
            }
            $this->view("admin/profil/index", $data = [
                "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - Profile",
                "layout_admin" => true,
                "profile" => $this->model("petugas_model")->get($_SESSION["admin"]["id"])
            ]);
        } catch (Exception $error) {
            Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
            if (!empty($_SESSION["admin"]["redirect"])) {
                header("Location: " . BaseURL() . $_SESSION["admin"]["redirect"]);
                unset($_SESSION["admin"]["redirect"]);
            } else {
                header("Location: " . BaseURL() . "/admin/profil");
            }
            exit;
        }
    }

    // Logout
    public function logout()
    {
        session_destroy();
        header("Location: " . BaseURL() . "/admin");
    }
}
