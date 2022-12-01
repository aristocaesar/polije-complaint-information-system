<?php

// Init Session
if (!session_id()) session_start();

//Load Composer's autoloader
require 'vendor/autoload.php';

// dotenv
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

// APP
require_once("core/App.php");
// DATABASE
require_once("core/Database.php");
// Flasher
require_once("core/Flasher.php");
// Load Config
require_once("config/config.php");
// Load Libarary
require_once("lib/lib.php");

new App();
