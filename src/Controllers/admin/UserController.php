<?php

namespace App\Controllers\admin;

class UserController
{
    const URL_HANDLER = 'handlers/user-handler.php';

    public function index()
    {

        require_once base_path('view/admin/user/index.php');
    }
}