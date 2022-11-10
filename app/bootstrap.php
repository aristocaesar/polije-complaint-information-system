<?php

//Load Composer's autoloader
require 'vendor/autoload.php';

// APP
require_once("core/App.php");
// DATABASE
require_once("core/Database.php");
// Load Config
require_once("config/config.php");
// Load Libarary
require_once("lib/sweeatalert.php");

new App();
