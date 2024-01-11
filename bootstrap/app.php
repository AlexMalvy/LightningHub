<?php

// Base app path (on filesystem)
define('APP_BASE_PATH', realpath(__DIR__.'/../'));

// All imports
require_once __DIR__.'/../vendor/autoload.php';

// Import class Controllers
require_once(__DIR__."/../controller/UserController.php");
require_once(__DIR__."/../controller/AuthController.php");

session_start();