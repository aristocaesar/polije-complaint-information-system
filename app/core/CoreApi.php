<?php

class CoreApi
{
    public function __construct()
    {
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
    }

    protected function model($model)
    {
        // Get Model and Instance
        require_once("app/models/" . $model . ".php");
        return new $model;
    }

    public function Response($code, $status, $data)
    {
        http_response_code($code);
        echo json_encode([
            "code" => $code,
            "status" => $status,
            "data" => $data
        ]);
    }
}
