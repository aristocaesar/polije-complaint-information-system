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
}
