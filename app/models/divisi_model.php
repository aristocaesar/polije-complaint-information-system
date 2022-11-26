<?php

class Divisi_Model
{
    private $db;
    private $table = "divisi";

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
        if (!empty($data)) {
            // Current Time Stampe
            $date = date("Y-m-d H:i:s");
            // Save Data
            $this->db->query('INSERT INTO ' . $this->table . ' VALUES (:nama, :deskripsi, :penanggung_jawab, :email, :kontak, :alamat, :created_at, :updated_at)');
            $this->db->bind("nama", ucfirst($data["nama"]));
            $this->db->bind("deskripsi", ucfirst($data["deskripsi"]));
            $this->db->bind("penanggung_jawab", ucwords($data["penanggung_jawab"]));
            $this->db->bind("email", $data["email"]);
            $this->db->bind("kontak", $data["kontak"]);
            $this->db->bind("alamat", ucfirst($data["alamat"]));
            $this->db->bind("created_at", $date);
            $this->db->bind("updated_at", $date);
            $this->db->execute();
            return [
                "nama" => ucfirst($data["nama"]),
                "deskripsi" => ucfirst($data["deskripsi"]),
                "penanggung_jawab" => ucwords($data["penanggung_jawab"]),
                "email" => $data["email"],
                "kontak" => $data["kontak"],
                "alamat" => ucfirst($data["alamat"]),
                "created_at" => $date,
                "updated_at" => $date
            ];
        }
    }

    public function update($data, $nama)
    {
        if (!empty($data)) {
            // Update Data
            $nama = str_replace("-", " ", $nama);
            // Current Time Stamp
            $date = date("Y-m-d H:i:s");
            $this->db->query('UPDATE ' . $this->table . ' SET nama=:nama, deskripsi=:deskripsi, penanggung_jawab=:penanggung_jawab, email=:email, kontak=:kontak, alamat=:alamat, updated_at=:updated_at WHERE nama=:nama_pointer');
            $this->db->bind("nama", ucfirst($data["nama"]));
            $this->db->bind("deskripsi", ucfirst($data["deskripsi"]));
            $this->db->bind("penanggung_jawab", ucwords($data["penanggung_jawab"]));
            $this->db->bind("email", $data["email"]);
            $this->db->bind("kontak", $data["kontak"]);
            $this->db->bind("alamat", ucfirst($data["alamat"]));
            $this->db->bind("updated_at", $date);
            $this->db->bind("nama_pointer", ucfirst($nama));
            $this->db->execute();
            if ($this->db->rowCount() == 0) {
                throw new Exception("Terjadi Kesalahan! - divisi " . $nama . " tidak tersedia!");
            }
            return $this->get($data["nama"]);
        }
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
            throw new Exception("Terjadi Kesalahan! - divisi " . $nama . " tidak tersedia!");
        }
        return [
            "deleted" => true
        ];
    }
}
