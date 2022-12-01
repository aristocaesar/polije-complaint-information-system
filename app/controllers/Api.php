<?php

require_once("app/core/CoreApi.php");

class API extends CoreApi
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        header("Location: " . BaseURL());
    }

    public function login()
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (!empty($_POST["email"]) && !empty($_POST["password"])) {
                    $this->Response(200, "OK", $this->model("pengguna_model")->login([
                        "email" => $_POST["email"],
                        "password" => $_POST["password"],
                        "mobile" => true
                    ]));
                } else {
                    throw new Exception("Error Processing Login Request");
                }
            }
        } catch (Exception $error) {
            $this->Response(200, "ERR", [
                "message" => $error->getMessage()
            ]);
        }
    }

    public function register()
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (!empty($_POST)) {
                    $this->Response(200, "OK", $this->model("pengguna_model")->register($_POST));
                } else {
                    throw new Exception("Error Processing Register Request");
                }
            }
        } catch (Exception $error) {
            $message = $error->getMessage();
            if ($error->getCode() == 23000) {
                $message = "Email ini sudah digunakan!";
            }
            $this->Response(200, "ERR", [
                "message" => $message
            ]);
        }
    }

    public function recovery()
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (!empty($_POST["email"])) {
                    $this->Response(200, "OK", $this->model("pengguna_model")->recoveryPassword($_POST["email"]));
                } else {
                    throw new Exception("Error Processing Recovery Password Request");
                }
            }
        } catch (Exception $error) {
            $this->Response(200, "ERR", [
                "message" => $error->getMessage()
            ]);
        }
    }

    public function changefoto()
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (!empty($_POST["email"]) && !empty($_FILES["foto"])) {
                    $this->Response(200, "OK", $this->model("pengguna_model")->updateFoto());
                } else {
                    throw new Exception("Error Processing Change Photo Profile Request");
                }
            }
        } catch (Exception $error) {
            $this->Response(200, "ERR", [
                "message" => $error->getMessage()
            ]);
        }
    }

    public function kategori($nama = "")
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if ($nama == "") {
                    $this->Response(200, "OK", $this->model("kategori_model")->getAll());
                } else {
                    $this->Response(200, "OK", $this->model("kategori_model")->get($nama));
                }
            }
        } catch (Exception $error) {
            $this->Response(400, "ERR", [
                "message" => $error->getMessage()
            ]);
        }
    }

    public function divisi($nama = "")
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if ($nama == "") {
                    $this->Response(200, "OK", $this->model("divisi_model")->getAll());
                } else {
                    $this->Response(200, "OK", $this->model("divisi_model")->get($nama));
                }
            }
        } catch (Exception $error) {
            $this->Response(400, "ERR", [
                "message" => $error->getMessage()
            ]);
        }
    }

    public function pengaduan($id = "")
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if ($id != "") {
                    $this->Response(200, "OK", $this->model("pengaduan_model")->getPengaduan($id));
                } else {
                    throw new Exception("Error Processing Pengaduan Request");
                }
            } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST)) {
                    $this->Response(201, "Created", $this->model("pengaduan_model")->sendPengaduan($_POST));
                } else {
                    throw new Exception("Error Processing Pengaduan Request");
                }
            }
        } catch (Exception $error) {
            $this->Response(400, "ERR", [
                "message" => $error->getMessage()
            ]);
        }
    }

    public function aspirasi($id = "")
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if ($id != "") {
                    $this->Response(200, "OK", $this->model("aspirasi_model")->getAspirasi($id));
                } else {
                    throw new Exception("Error Processing Aspirasi Request");
                }
            } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST)) {
                    $this->Response(201, "Created", $this->model("aspirasi_model")->sendAspirasi($_POST));
                } else {
                    throw new Exception("Error Processing Aspirasi Request");
                }
            }
        } catch (Exception $error) {
            $this->Response(400, "ERR", [
                "message" => $error->getMessage()
            ]);
        }
    }

    public function informasi($id = "")
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if ($id != "") {
                    $this->Response(200, "OK", $this->model("informasi_model")->getInformasi($id));
                } else {
                    throw new Exception("Error Processing Informasi Request");
                }
            } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST)) {
                    $this->Response(201, "Created", $this->model("informasi_model")->sendInformasi($_POST));
                } else {
                    throw new Exception("Error Processing Informasi Request");
                }
            }
        } catch (Exception $error) {
            $this->Response(200, "ERR", [
                "message" => $error->getMessage()
            ]);
        }
    }

    public function pengguna($id = "")
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if ($id == "") {
                    $this->Response(200, "OK", $this->model("pengguna_model")->getAll());
                } else {
                    $this->Response(200, "OK", $this->model("pengguna_model")->get($id));
                }
            } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($id == "changeemail") {
                    if ($_POST["email"] == $_POST["email2"]) {
                        $this->Response(200, "OK", $this->model("pengguna_model")->changeEmail());
                    } else {
                        throw new Exception("Email tidak sama!");
                    }
                } elseif ($id == "changepassword") {
                    $this->Response(200, "OK", $this->model("pengguna_model")->updatePasswordMobile());
                } elseif ($id == "changefoto") {
                    $this->Response(200, "OK", $this->model("pengguna_model")->updateFotoMobile());
                } elseif ($id == "update") {
                    $this->Response(200, "OK", $this->model("pengguna_model")->saveMobile());
                } else {
                    throw new Exception("Error Processing Change Password Request");
                }
            }
        } catch (Exception $error) {
            $this->Response(400, "ERR", [
                "message" => $error->getMessage()
            ]);
        }
    }

    public function petugas($id = "")
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if ($id == "") {
                    $this->Response(200, "OK", $this->model("petugas_model")->getAll());
                } else {
                    $this->Response(200, "OK", $this->model("petugas_model")->get($id));
                }
            }
        } catch (Exception $error) {
            $this->Response(400, "ERR", [
                "message" => $error->getMessage()
            ]);
        }
    }
}
