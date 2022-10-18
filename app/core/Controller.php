<?php

/**
 * Controller
 * Core for control view and data
 */
class Controller
{
    // Default 
    private $file = "home/index";
    // Constructor
    public function __construct()
    {
        // Load Config
        require_once("config/config.php");
        // Load Lib
        require_once("lib/sweeatalert.php");
    }
    // Show view where controllers
    protected function view($file, $data = [])
    {
        // Load header
        require_once("app/views/components/header.php");
        // Load view
        if (file_exists("app/views/" . $file . ".php")) {
            require_once("app/views/" . $file . ".php");
        } else {
            require_once("app/views/" . $this->file . ".php");
        }
        // Load Footer
        require_once("app/views/components/footer.php");
    }
}
