<?php

namespace App\Controllers\admin;

use App\Models\Faq;
use App\Models\Games;
use App\Models\Hub;
use App\Models\User;

class AdminController
{
    /**
     * @Route home dashboard
     * @Method public
     * @Template index
     * @return void
     */
    public function index()
    {
        $users = count(USER::getAllUsers());
        $faqs = count(FAQ::getAllFaqList());
        $hubs = count((new Hub)->allRoomsList);
        $games = count((new Games)->allGamesList);


        require_once base_path('view/admin/home/index.php');


    }

    public static function isAdmin() {
        $current_user = \Auth::getCurrentUser();
        if ($current_user['isAdmin'] == 0)
        {
            header('Location: ../index.php');
            exit();
        }
    }
}