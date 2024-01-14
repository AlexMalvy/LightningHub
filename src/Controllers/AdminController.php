<?php

namespace App\Controllers;

class AdminController
{
    public function index()
    {
        require_once base_path('view/admin/home.php');
    }
}