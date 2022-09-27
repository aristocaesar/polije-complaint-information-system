<?php

/**
 * APP
 * Core for management routing
 */
class App
{
    // Default controller dan method
    private $controller = "Home";
    private $method = "index";
    private $params = [];

    public function __construct()
    {
        // Init Url
        $url = $this->parseUrl();
        // Jika controller tersedia (controller)
        if (!empty($url)) {
            $nameFile = ucfirst($url[0]);
            if (file_exists('app/controllers/' . $nameFile . ".php")) {
                // Replace default controller
                $this->controller = $nameFile;
                // Hapus controller pada baris index url
                unset($url[0]);
            }
        }

        // Panggil controller berdasarkan result controller
        require_once("app/controllers/" . $this->controller . ".php");
        $this->controller = new $this->controller;

        // Jika method tersedia (controller/method)
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                // Rreplace method
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Jika terdapat sisa value dari url, maka dianggap params
        if (!empty($url)) {
            // Replace params
            $this->params = array_values($url);
        }

        // Jalankan controller dan method serta parmas jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Parse URL -> Controller / Method / Params
     * Params "url" merupakan hasil pengkondisian dari .htaccess
     */
    public function parseUrl()
    {
        // Jika terdapat permintaan request GET 
        if (isset($_GET["url"])) {
            // Hapus last slash
            $url = rtrim($_GET["url"], "/");
            // Sanitasi dari simbol berbahaya
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Pecah berdasarkan slah
            $url = explode("/", $url);
            return $url;
        }
    }
}
