<?php

class Pengguna_Model
{
    private $db;
    private $table = "users";

    public function __construct()
    {
        $this->db = new Database;
    }

    private function generateID(string $set)
    {
        $numbs = explode("-", $set);
        return "USR" . join("", $numbs) . date("s");
    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
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

    public function save($data = [])
    {
        // Current Time Stamp
        $date = date("Y-m-d H:i:s");
        // Save Data
        $this->db->query('INSERT INTO ' . $this->table . ' (id, nama, email, password, tgl_lahir, alamat, kontak, status, akses, foto, created_at, updated_at) VALUES (:id, :nama, :email, :password, :tgl_lahir, :alamat, :kontak, :status, :akses, :foto, :created_at, :updated_at)');
        // binding data
        $this->db->bind("id", $this->generateID($data["tgl_lahir"]));
        $this->db->bind("nama", ucwords($data["nama"]));
        $this->db->bind("email", $data["email"]);
        // check same character
        if ($data["password"] != $data["password2"]) {
            throw new Exception("Terjadi Kesalahan! - Password tidak sama!");
        }
        // hash password
        $password = password_hash($data["password"], PASSWORD_DEFAULT);
        $this->db->bind("password", $password);
        $this->db->bind("tgl_lahir", $data["tgl_lahir"]);
        $this->db->bind("alamat", $data["alamat"]);
        $this->db->bind("kontak", $data["kontak"]);
        $this->db->bind("status", $data["status"]);
        $this->db->bind("akses", $data["akses"]);
        $this->db->bind("foto", "USER-default.png");
        $this->db->bind("created_at", $date);
        $this->db->bind("updated_at", $date);
        $this->db->execute();
        if ($this->db->rowCount() == 0) {
            throw new Exception("Terjadi Kesalahan! - Gagal menambahkan pengguna");
        }
        return $data;
    }

    public function update($data, $nama)
    {
        // Cek Emtpy Data
        if ((!isset($data["nama"]) || !isset($data["deskripsi"]) || empty($nama))) {
            throw new Exception("Data yang dikirimkan tidak valid!");
        }
        // Current Time Stamp
        $date = date("Y-m-d H:i:s");
        $this->db->query('UPDATE ' . $this->table . ' SET nama=:nama, deskripsi=:deskripsi,  updated_at=:updated_at WHERE nama=:nama_pointer');
        $this->db->bind("nama", ucfirst($data["nama"]));
        $this->db->bind("deskripsi", ucfirst($data["deskripsi"]));
        $this->db->bind("updated_at", $date);
        $this->db->bind("nama_pointer", ucfirst($nama));
        $this->db->execute();
        return $this->get($data["nama"]);
    }

    public function resetPassword(string $email)
    {
        # code...
    }

    public function delete($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind("id", $id);
        $this->db->execute();
        return [];
    }
}
