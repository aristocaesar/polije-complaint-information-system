<?php

class Kategori_Model
{
    private $db;
    private $table = "kategori";

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function get($nama)
    {
        $nama = str_replace("-", " ", $nama);
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama=:nama");
        $this->db->bind("nama", $nama);
        $result = $this->db->single();
        if (!$result) {
            return [];
        }
        return $result;
    }

    public function save($data)
    {
        // Cek Emtpy Data
        if (!isset($data["nama"]) || !isset($data["deskripsi"])) {
            throw new Exception("Data yang dikirimkan tidak valid!");
        }
        // Current Time Stamp
        $date = date("Y-m-d H:i:s");
        // Save Data
        $this->db->query('INSERT INTO ' . $this->table . ' VALUES (:nama, :deskripsi, :created_at, :updated_at)');
        $this->db->bind("nama", ucfirst($data["nama"]));
        $this->db->bind("deskripsi", ucfirst($data["deskripsi"]));
        $this->db->bind("created_at", $date);
        $this->db->bind("updated_at", $date);
        $this->db->execute();
        if ($this->db->rowCount() == 0) {
            throw new Exception("Terjadi Kesalahan! - Gagal menambahkan kategori");
        }
        return [
            "nama" => ucfirst($data["nama"]),
            "deskripsi" => ucfirst($data["deskripsi"]),
            "created_at" => $date,
            "updated_at" => $date
        ];
    }

    public function update($data, $nama)
    {
        // Update Data
        $nama = str_replace("-", " ", $nama);
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

    public function delete($nama)
    {
        // Update Data
        $nama = str_replace("-", " ", $nama);
        // Cek Emtpy Data
        if (!isset($nama) || empty($nama)) {
            throw new Exception("Data yang dikirimkan tidak valid!");
        }
        // Current Time Stamp
        $date = date("Y-m-d H:i:s");
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE nama=:nama_pointer');
        $this->db->bind("nama_pointer", ucfirst($nama));
        $this->db->execute();
        if ($this->db->rowCount() == 0) {
            throw new Exception("Terjadi Kesalahan! - kategori " . $nama . " tidak tersedia!");
        }
        return [];
    }
}
