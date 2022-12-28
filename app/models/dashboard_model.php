<?php

class Dashboard_Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDataMain()
    {
        $this->db->query("SELECT * FROM statistic_main");
        return $this->db->resultSet();
    }

    public function getCountAllLaporan()
    {
        $this->db->query("SELECT SUM(jumlah) AS jumlah_semua_laporan FROM `statistic_main` WHERE label != 'Pengguna'");
        return $this->db->single();
    }

    public function getCountDivisi()
    {
        $this->db->query("SELECT COUNT(nama) AS jumlah_divisi FROM `divisi`");
        return $this->db->single();
    }

    public function addPengaduan()
    {
        $this->db->query("UPDATE statistic_main SET jumlah=1+(SELECT jumlah FROM statistic_main WHERE label='Pengaduan'), updated_at=:updated_at WHERE label='Pengaduan'");
        $this->db->bind("updated_at", date("Y-m-d H:i:s"));
        $this->db->execute();
    }

    public function addAspirasi()
    {
        $this->db->query("UPDATE statistic_main SET jumlah=1+(SELECT jumlah FROM statistic_main WHERE label='Aspirasi'), updated_at=:updated_at WHERE label='Aspirasi'");
        $this->db->bind("updated_at", date("Y-m-d H:i:s"));
        $this->db->execute();
    }

    public function addInformasi()
    {
        $this->db->query("UPDATE statistic_main SET jumlah=1+(SELECT jumlah FROM statistic_main WHERE label='Informasi'), updated_at=:updated_at WHERE label='Informasi'");
        $this->db->bind("updated_at", date("Y-m-d H:i:s"));
        $this->db->execute();
    }
}
