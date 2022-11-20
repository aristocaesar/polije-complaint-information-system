<?php

/**
 * Controller
 * Core for control view and data
 */
class Controller
{
    // Show view where controllers
    protected function view($file, $data)
    {
        // Load header
        if (isset($data["layout_admin"]) && $data["layout_admin"] == true) {
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
        if (isset($data["layout_admin"]) && $data["layout_admin"] == true) {
            // Layout for admin
            require_once("app/views/components/admin/footer.php");
        } else {
            require_once("app/views/components/footer.php");
        }
    }

    protected function model($model)
    {
        // Get Model and Instance
        require_once("app/models/" . $model . ".php");
        return new $model;
    }
}
