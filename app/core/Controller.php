<?php

/**
 * Controller
 * Core for control view and data
 */
class Controller
{
    // Constructor
    public function __construct()
    {
        // Load Config
        require_once("config/config.php");
        // Load Lib
        require_once("lib/sweeatalert.php");
    }
    // Show view where controllers
    protected function view($file, $data = [
        "layout" => "user"
    ])
    {
        // Load header
        if ($data["layout"] == "admin") {
            // Layout for admin
            require_once("app/views/components/admin/header.php");
        } else {
            // Layout for user
            require_once("app/views/components/header.php");
        }
        // Load view
        if (file_exists("app/views/" . $file . ".php")) {
            require_once("app/views/" . $file . ".php");
        }
        // Load Footer
        if ($data["layout"] == "admin") {
            // Layout for admin
            require_once("app/views/components/admin/footer.php");
        } else {
            require_once("app/views/components/footer.php");
        }
    }
}
