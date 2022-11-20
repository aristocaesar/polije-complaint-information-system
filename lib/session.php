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

function UserIsTrue()
{
    if (!isset($_SESSION["user"])) {
        header("Location: " . BaseURL() . "/auth");
    }
}

function UserIsActive()
{
    if (isset($_SESSION["user"])) {
        header("Location: " . BaseURL() . "/users");
    }
}

function removeSession()
{
    session_destroy();
}
