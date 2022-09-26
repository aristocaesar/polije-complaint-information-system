<?php

class App
{
    public function __construct()
    {
        var_dump($this->parse_url());
    }

    /**
     * Parse URL -> Controller / Method
     * Params "url" merupakan hasil pengkondisian dari .htaccess
     */
    public function parse_url()
    {
        // Jika terdapat permintaan request GET 
        if (isset($_GET)) {
            // Hapus last slash
            $url = rtrim($_GET["url"], "/");
            // Sanitasi dari simbol berbahaya
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }
    }
}
