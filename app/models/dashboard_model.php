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
}
