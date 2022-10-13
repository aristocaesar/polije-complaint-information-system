<?php

class CoreApi
{
    public function __construct()
    {
        header('Content-Type: application/json; charset=utf-8');
    }
    protected function Response()
    {
        function statusCode($code)
        {
            http_response_code($code);
        }
    }
}
