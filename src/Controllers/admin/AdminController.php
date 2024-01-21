<?php

namespace App\Controllers\admin;

use App\Models\Faq;
use App\Models\Games;
use App\Models\Hub;
use App\Models\User;

class AdminController
{

    public function index()
    {
        $users = count(USER::getAllUsers());
        $faqs = count(FAQ::getAllFaqList());
        $hubs = count((new Hub)->allRoomsList);
        $games = count((new Games)->allGamesList);
        require_once base_path('view/admin/home/index.php');
    }

    public static function countUsers()
    {
        return count(USER::getAllUsers());
    }



}