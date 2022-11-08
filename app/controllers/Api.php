<?php

require_once("app/core/CoreApi.php");

class API extends CoreApi
{

    public function __construct()
    {
        parent::__construct();
        // Cek Auth
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

    public function pengguna($nama = "")
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if ($nama == "") {
                    $this->Response(200, "OK", $this->model("pengguna_model")->getAll());
                } else {
                    $this->Response(200, "OK", $this->model("pengguna_model")->get($nama));
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
}
