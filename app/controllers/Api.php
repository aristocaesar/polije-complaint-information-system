<?php

require_once("app/core/CoreApi.php");

class API extends CoreApi
{

    public function __construct()
    {
        parent::__construct();
        // Cek Auth
    }

    public function aspirasi($id = "")
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if ($id == "") {
                    $this->Response(200, "OK", $this->model("aspirasi_model")->getAll());
                } else {
                    $this->Response(200, "OK", $this->model("aspirasi_model")->get($id));
                }
            } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["add"])) {
                    // ADD
                    $this->Response(201, "Created", $this->model("aspirasi_model")->save($_POST));
                } else if (isset($_POST["update"])) {
                    // UPDATE
                    $this->Response(200, "OK", $this->model("aspirasi_model")->update($_POST, $_POST["update"]));
                } else if (isset($_POST["delete"])) {
                    // DELETE
                    $this->Response(200, "OK", $this->model("aspirasi_model")->delete($_POST["delete"]));
                } else {
                    throw new Exception("Error Method Request!");
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
                if ($id == "") {
                    $this->Response(200, "OK", $this->model("informasi_model")->getAll());
                } else {
                    $this->Response(200, "OK", $this->model("informasi_model")->get($id));
                }
            } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["add"])) {
                    // ADD
                    $this->Response(201, "Created", $this->model("informasi_model")->save($_POST));
                } else if (isset($_POST["update"])) {
                    // UPDATE
                    $this->Response(200, "OK", $this->model("informasi_model")->update($_POST, $_POST["update"]));
                } else if (isset($_POST["delete"])) {
                    // DELETE
                    $this->Response(200, "OK", $this->model("informasi_model")->delete($_POST["delete"]));
                } else {
                    throw new Exception("Error Method Request!");
                }
            }
        } catch (Exception $error) {
            $this->Response(400, "ERR", [
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
            } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["add"])) {
                    // ADD
                    $this->Response(201, "Created", $this->model("kategori_model")->save($_POST));
                } else if (isset($_POST["update"])) {
                    // UPDATE
                    $this->Response(200, "OK", $this->model("kategori_model")->update($_POST, $_POST["update"]));
                } else if (isset($_POST["delete"])) {
                    // DELETE
                    $this->Response(200, "OK", $this->model("kategori_model")->delete($_POST["delete"]));
                } else {
                    throw new Exception("Error Method Request!");
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
            } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["add"])) {
                    // ADD
                    $this->Response(201, "Created", $this->model("divisi_model")->save($_POST));
                } else if (isset($_POST["update"])) {
                    // UPDATE
                    $this->Response(200, "OK", $this->model("divisi_model")->update($_POST, $_POST["update"]));
                } else if (isset($_POST["delete"])) {
                    // DELETE
                    $this->Response(200, "OK", $this->model("divisi_model")->delete($_POST["delete"]));
                } else {
                    throw new Exception("Error Method Request!");
                }
            }
        } catch (Exception $error) {
            $this->Response(400, "ERR", [
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
            } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["add"])) {
                    // ADD
                    $this->Response(201, "Created", $this->model("pengguna_model")->save($_POST));
                } else if (isset($_POST["update"])) {
                    // UPDATE
                    $this->Response(200, "OK", $this->model("pengguna_model")->update($_POST, $_POST["update"]));
                } else if (isset($_POST["delete"])) {
                    // DELETE
                    $this->Response(200, "OK", $this->model("pengguna_model")->delete($_POST["delete"]));
                } else {
                    throw new Exception("Error Method Request!");
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
            } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["add"])) {
                    // ADD
                    $this->Response(201, "Created", $this->model("petugas_model")->save($_POST));
                } else if (isset($_POST["update"])) {
                    // UPDATE
                    $this->Response(200, "OK", $this->model("petugas_model")->update($_POST, $_POST["update"]));
                } else if (isset($_POST["delete"])) {
                    // DELETE
                    $this->Response(200, "OK", $this->model("petugas_model")->delete($_POST["delete"]));
                } else {
                    throw new Exception("Error Method Request!");
                }
            }
        } catch (Exception $error) {
            $this->Response(400, "ERR", [
                "message" => $error->getMessage()
            ]);
        }
    }
}
