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
        $this->db->query('SELECT * FROM kategori');
        return $this->db->resultSet();
    }
}
