<?php

class API
{
    public function index()
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(["nama" => "Aristo Caesar Pratama", "NIM" => "E41211739"]);
    }
}
