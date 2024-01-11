<?php

// Base app path (on filesystem)
define('APP_BASE_PATH', realpath(__DIR__.'/../'));

// All imports
require_once __DIR__.'/../vendor/autoload.php';

// Import function helpers
//require_once __DIR__.'/../helpers/path_functions.php';
//require_once __DIR__.'/../helpers/html_functions.php';
//require_once __DIR__.'/../helpers/redirect_functions.php';
//require_once __DIR__.'/../helpers/session_functions.php';
//
//// Import class helpers
//require_once __DIR__.'/../helpers/class/App.php';
//require_once __DIR__.'/../helpers/class/DB.php';
//require_once __DIR__.'/../helpers/class/Auth.php';


session_start();