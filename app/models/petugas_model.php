<?php

class Petugas_Model
{
    private $db;
    private $table = "petugas";

    public function __construct()
    {
        $this->db = new Database;
    }

    private function generateID(string $set)
    {
        $numbs = explode("-", $set);
        return "PGS" . join("", $numbs) . date("s");
    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getByEmail($email)
    {
        $this->db->query('SELECT * FROM ' . $this->table . " WHERE email=:email");
        $this->db->bind("email", $email);
        return $this->db->single();
    }

    public function get($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
        $this->db->bind("id", $id);
        $result = $this->db->single();
        if (!$result) {
            return [];
        }
        return $result;
    }

    public function save($data = [], $files = null)
    {
        // id
        $idPetugas = $this->generateID($data["tgl_lahir"]);
        // Current Time Stamp
        $date = date("Y-m-d H:i:s");
        // Save Data
        $this->db->query('INSERT INTO ' . $this->table . ' (id, nama, email, password, tgl_lahir, jenis_kelamin, alamat, kontak, status, akses, foto, created_at, updated_at) VALUES (:id, :nama, :email, :password, :tgl_lahir, :jenis_kelamin, :alamat, :kontak, :status, :akses, :foto, :created_at, :updated_at)');
        // binding data
        $this->db->bind("id", $idPetugas);
        $this->db->bind("nama", ucwords($data["nama"]));
        $this->db->bind("email", $data["email"]);
        // check same character
        if ($data["password"] != $data["password2"]) {
            throw new Exception("Password tidak sama!");
        }
        // hash password
        $password = password_hash($data["password"], PASSWORD_DEFAULT);
        $this->db->bind("password", $password);
        $this->db->bind("tgl_lahir", $data["tgl_lahir"]);
        $this->db->bind("jenis_kelamin", $data["jenis_kelamin"]);
        $this->db->bind("alamat", $data["alamat"]);
        $this->db->bind("kontak", $data["kontak"]);
        $this->db->bind("status", $data["status"]);
        $this->db->bind("akses", $data["akses"]);

        // check image exist
        if ($files["foto"]["name"] == "") {
            $this->db->bind("foto", "USER-default.png");
        } else {
            $exFile = end(explode(".", $files["foto"]["name"]));
            // Upload File ( 2MB 2097152 )
            UploadFile($files, $idPetugas, 2097152, ["image/jpeg", "image/jpg", "image/png"], "images");
            $this->db->bind("foto", $idPetugas . "." . $exFile);
        }

        $this->db->bind("created_at", $date);
        $this->db->bind("updated_at", $date);
        $this->db->execute();
        if ($this->db->rowCount() == 0) {
            throw new Exception("Gagal menambahkan pengguna");
        }
        return $data;
    }

    public function update($data, $files, $id)
    {
        // Current Time Stamp
        $date = date("Y-m-d H:i:s");
        // Save Data
        $this->db->query('UPDATE ' . $this->table . ' SET nama=:nama, email=:email, password=:password, tgl_lahir=:tgl_lahir, jenis_kelamin=:jenis_kelamin, alamat=:alamat, kontak=:kontak, status=:status, akses=:akses, foto=:foto, updated_at=:updated_at WHERE id=:id_pointer');
        // binding data
        $this->db->bind("nama", ucwords($data["nama"]));
        $this->db->bind("email", $data["email"]);
        // check same character
        if ($data["password"] != $data["password2"]) {
            throw new Exception("Password tidak sama!");
        }
        // hash password
        $password = password_hash($data["password"], PASSWORD_DEFAULT);
        $this->db->bind("password", $password);
        $this->db->bind("tgl_lahir", $data["tgl_lahir"]);
        $this->db->bind("jenis_kelamin", $data["jenis_kelamin"]);
        $this->db->bind("alamat", $data["alamat"]);
        $this->db->bind("kontak", $data["kontak"]);
        $this->db->bind("status", $data["status"]);
        $this->db->bind("akses", $data["akses"]);

        // check image exist
        if ($files["foto"]["error"] == 4) {
            $this->db->bind("foto", $data["foto-lama"]);
        } else {
            // hapus foto lama
            RemoveFileUpload("/images/" . $data["foto-lama"]);
            $file = explode(".", $files["foto"]["name"]);
            $extension = end($file);
            // Upload File ( 2MB 2097152 )
            UploadFile($files, $id, 2097152, ["image/jpeg", "image/jpg", "image/png"], "images");
            $this->db->bind("foto", $id . "." . $extension);
        }

        $this->db->bind("updated_at", $date);
        $this->db->bind("id_pointer", $id);
        $this->db->execute();
        if ($this->db->rowCount() == 0) {
            throw new Exception("Gagal memperbarui pengguna");
        }
        return $data;
    }

    public function resetPassword(string $email)
    {
        var_dump($email);
        die;
    }

    public function delete($id, $foto)
    {
        if (empty($id)) {
            throw new Exception("Gagal menghapus pengguna.");
        }
        // hapus foto
        RemoveFileUpload("/images/" . $foto);
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind("id", $id);
        $this->db->execute();
        return [];
    }

    public function updateLastLogin($id)
    {
        // Current Time Stamp
        $date = date("Y-m-d H:i:s");
        // Save Data
        $this->db->query('UPDATE ' . $this->table . ' SET last_login=:date WHERE id=:id_pointer');
        // binding data
        $this->db->bind("date", $date);
        $this->db->bind("id_pointer", $id);
        $this->db->execute();
    }

    public function login($data)
    {
        $petugas = $this->getByEmail($data["email"]);
        if ($petugas) {
            if (password_verify($data["password"], $petugas["password"])) {
                if ($petugas["akses"] == "aktif") {
                    $this->updateLastLogin($petugas["id"]);
                    return $petugas;
                } else {
                    throw new Exception("Akun sedang ditangguhkan!");
                }
            } else {
                throw new Exception("Email atau Password salah!");
            }
        } else {
            throw new Exception("Email atau Password salah!");
        }
    }
}
