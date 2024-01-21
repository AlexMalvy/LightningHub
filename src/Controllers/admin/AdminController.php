<?php

namespace App\Controllers\admin;

use App\Models\User;

class AdminController
{

    public function index()
    {

        require_once base_path('view/admin/home/index.php');
    }

    public static function countUsers()
    {
        return USER::getAllUsers();
    }

}