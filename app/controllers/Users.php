<?php
require_once "app/core/Controller.php";

class Users extends Controller
{
    public function __construct()
    {
        if (isset($_SESSION["user"])) {
            $user = $this->model("pengguna_model")->get($_SESSION["user"]["id"]);
            if (empty($user) || $user["akses"] == "blokir") {
                header("Location: " . BaseURL() . "/auth/logout");
            }
        }
    }

    public function index()
    {
        UserIsTrue();
        $userID = $_SESSION["user"]["id"];
        $data = [
            "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - User Area",
            "user" => $this->model("pengguna_model")->get($userID),
            "pengaduan" => $this->model("pengaduan_model")->getByPengguna($userID),
            "aspirasi" => $this->model("aspirasi_model")->getByPengguna($userID),
            "informasi" => $this->model("informasi_model")->getByPengguna($userID)
        ];

        $this->view("users/index", $data);
    }

    public function pengaduan($id = "")
    {
        if (!empty($id)) {
            UserIsTrue();
            $data = [
                "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - User Area",
                "klasifikasi" => "Pengaduan",
                "laporan" => $this->model("pengaduan_model")->get($id),
            ];

            $this->view("users/klasifikasi", $data);
        } else {
            header("Location: " . BaseURL() . "/users");
        }
    }

    public function aspirasi($id = "")
    {
        if (!empty($id)) {
            UserIsTrue();
            $data = [
                "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - User Area",
                "klasifikasi" => "Aspirasi",
                "laporan" => $this->model("aspirasi_model")->get($id),
            ];

            $this->view("users/klasifikasi", $data);
        } else {
            header("Location: " . BaseURL() . "/users");
        }
    }

    public function informasi($id = "")
    {
        if (!empty($id)) {
            UserIsTrue();
            $data = [
                "title" => "Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember - User Area",
                "klasifikasi" => "Informasi",
                "laporan" => $this->model("informasi_model")->get($id),
            ];

            $this->view("users/klasifikasi", $data);
        } else {
            header("Location: " . BaseURL() . "/users");
        }
    }

    public function profil()
    {
        if (isset($_POST["submit"])) {
            try {
                $this->model("pengguna_model")->userUpdate($_POST, $_FILES);
                Flasher::setMessage("Berhasil", "Berhasil memperbarui profil", "success");
                header("Location: " . BaseURL() . "/users");
                exit;
            } catch (Exception $error) {
                Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
                header("Location: " . BaseURL() . "/users");
                exit;
            }
        } else {
            header("Location: " . BaseURL() . "/users");
            exit;
        }
    }

    public function changeemail()
    {
        try {
            if (isset($_POST["submit"])) {
                if (strlen($_POST["email"]) >= 45 || strlen($_POST["email2"]) >= 45 || strlen($_POST["password"]) >= 64) {
                    throw new Exception("Email salah!");
                }
                // check match emails
                if ($_POST["email"] == $_POST["email2"]) {
                    // check email is not equals with email user logined
                    if ($_POST["email"] != $_SESSION["user"]["email"]) {
                        // get user by email user logined
                        $petugas = $this->model("petugas_model")->getByEmail($_POST["email"]);
                        if (!$petugas) {
                            //get user for compare password with user input
                            $userLogin = $this->model("pengguna_model")->get($_SESSION["user"]["id"]);
                            if (password_verify($_POST["password"], $userLogin["password"])) {
                                // rubah email dan kirimkan link verifikasi
                                $this->model("pengguna_model")->changeEmail();
                                Flasher::setMessage("Berhasil", "Berhasil memperbarui email, silakan check email untuk konfirmasi", "success");
                                header("Location: " . BaseURL() . "/users");
                                exit;
                            } else {
                                throw new Exception("Password salah");
                            }
                        } else {
                            throw new Exception("Email sudah digunakan");
                        }
                    } else {
                        throw new Exception("Email ini sedang kamu gunakan");
                    }
                } else {
                    throw new Exception("Email tidak sama");
                }
            } else {
                header("Location: " . BaseURL() . "/users");
                exit;
            }
        } catch (Exception $error) {
            if ($error->getCode() == 23000) {
                Flasher::setMessage("Terjadi Kesalahan!", "Email sudah digunakan", "error");
                header("Location: " . BaseURL() . "/users");
                exit;
            }
            Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
            header("Location: " . BaseURL() . "/users");
            exit;
        }
    }

    public function changepassword()
    {
        if (isset($_POST["submit"])) {
            try {
                $this->model("pengguna_model")->userUpdatePassword($_POST);
                Flasher::setMessage("Berhasil", "Berhasil memperbarui password, silakan login", "success");
                header("Location: " . BaseURL() . "/auth/logout");
                exit;
            } catch (Exception $error) {
                Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
                header("Location: " . BaseURL() . "/users");
                exit;
            }
        } else {
            header("Location: " . BaseURL() . "/users");
            exit;
        }
    }

    public function sendnewverifikasi()
    {
        $this->model("pengguna_model")->newVerifikasi();
        Flasher::setMessage("Berhasil", "Berhasil mengirimkan tautan verifiaksi, silakan check email untuk konfirmasi", "success");
        header("Location: " . BaseURL() . "/users");
        exit;
    }

    public function verifikasi($idVerifikasi = "")
    {
        try {
            if ($this->model("pengguna_model")->acceptVerifikasi($idVerifikasi)) {
                if (!isset($_SESSION["user"])) {
                    Flasher::setMessage("Berhasil", "Email berhasil diverifikasi, silakan login!", "success");
                    header("Location: " . BaseURL() . "/auth");
                } else {
                    Flasher::setMessage("Berhasil", "Email berhasil diverifikasi", "success");
                    header("Location: " . BaseURL() . "/users");
                }
            }
        } catch (Exception $error) {
            Flasher::setMessage("Terjadi Kesalahan!", $error->getMessage(), "error");
            if (isset($_SESSION["user"])) {
                header("Location: " . BaseURL() . "/users");
            } else {
                header("Location: " . BaseURL() . "/auth");
            }
            exit;
        }
    }
}
