<?php

function setSession($name = "", $data = [])
{
    if ($name != "") {
        $_SESSION[$name] = $data;
    }
}

function getSession($name = "", $key = "")
{
    return $_SESSION[$name][$key];
}

function AdminIsTrue()
{
    if (!isset($_SESSION["admin"])) {
        header("Location: " . BaseURL() . "/admin");
    }
}

function AdminIsActive()
{
    if (isset($_SESSION["admin"])) {
        header("Location: " . BaseURL() . "/admin/dashboard");
    }
}

function removeSession()
{
    session_destroy();
}
