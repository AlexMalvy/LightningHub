<?php

namespace App\Controllers\admin;

class AdminController
{

    public function index()
    {
        require_once base_path('view/admin/home/index.php');
    }

}