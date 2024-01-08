<?php


// Import function helpers
require_once __DIR__.'/../controller/functions.php';

// Import class helpers
require_once __DIR__.'/../helpers/class/DB.php';

// Import class Models
require_once(__DIR__."/../Models/User.php");
require_once(__DIR__."/../Models/Hub.php");
require_once(__DIR__."/../Models/Filters.php");
require_once(__DIR__."/../Models/Games.php");
require_once(__DIR__."/../Models/Faq.php");

// Import class Controllers
require_once(__DIR__."/../controller/UserController.php");


session_start();
