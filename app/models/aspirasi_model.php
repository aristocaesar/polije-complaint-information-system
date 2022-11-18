<?php

class Aspirasi_Model
{
    private $db;
    private $table = "aspirasi";

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function get($id)
    {
        $nama = str_replace("-", " ", $id);
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
        $this->db->bind("id", $id);
        $result = $this->db->single();
        if (!$result) {
            return [];
        }
        return $result;
    }

    public function getByStatus($status = "")
    {
        switch ($status) {
            case 'belum_ditanggapi':
                $this->db->query("SELECT * FROM " . $this->table . " WHERE status=:status ORDER BY created_at ASC");
                $this->db->bind("status", "belum_ditanggapi");
                break;
            case 'proses':
                $this->db->query("SELECT * FROM " . $this->table . " WHERE status=:status ORDER BY created_at ASC");
                $this->db->bind("status", "proses");
                break;
            case 'selesai':
                $this->db->query("SELECT * FROM " . $this->table . " WHERE status=:status OR status=:status_dua ORDER BY created_at DESC");
                $this->db->bind("status", "ditangguhkan");
                $this->db->bind("status_dua", "selesai");
                break;
            default:
                throw new Exception("Error Processing Request Get Aspirasi By Status");
                break;
        }

        return $this->db->resultSet();
    }

    public function tangguhkan($data = [])
    {
        if (!empty($data)) {
            $this->db->query("UPDATE " . $this->table . " SET status=:status, tanggapan=:tanggapan, updated_at=:updated_at WHERE id=:id");
            $this->db->bind("status", "ditangguhkan");
            $this->db->bind("tanggapan", $data["alasan-ditangguhkan"]);
            $this->db->bind("updated_at", date("Y-m-d H:i:s"));
            $this->db->bind("id", $data["id"]);
            $this->db->execute();
            return true;
        } else {
            throw new Exception("Error Processing Request");
        }
    }

    public function changeToProces($id = "")
    {
        if ($id != "") {
            $this->db->query("UPDATE " . $this->table . " SET status=:status, updated_at=:updated_at WHERE id=:id");
            $this->db->bind("status", "proses");
            $this->db->bind("updated_at", date("Y-m-d H:i:s"));
            $this->db->bind("id", $id);
            $this->db->execute();
            return true;
        } else {
            throw new Exception("Error Processing Request Change To Proces");
        }
    }

    public function changeToComplate($data, $file)
    {
        if (!empty($data)) {
            // Update status to selesai
            $this->db->query("UPDATE " . $this->table . " SET status=:status, tanggapan=:tanggapan, lampiran=:lampiran, updated_at=:updated_at WHERE id=:id");
            $this->db->bind("status", "selesai");
            $this->db->bind("tanggapan", $data["tanggapan"]);
            // upload lampiran
            if ($file["foto"]["error"] != 4) {
                $f = explode(".", $file["foto"]["name"]);
                $extension = end($f);
                UploadFile($file, "L-ASPI-" . $data["id"], 2097152, ["application/pdf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "image/jpeg", "image/jpg", "image/png"], "document/aspirasi");
                $this->db->bind("lampiran", "L-INFO-" . $data["id"] . "." . $extension);
            } else {
                $this->db->bind("lampiran", null);
            }
            $this->db->bind("updated_at", date("Y-m-d H:i:s"));
            $this->db->bind("id", $data["id"]);
            $this->db->execute();
            return true;
        } else {
            throw new Exception("Error Processing Request Change To Complate");
        }
    }
}
