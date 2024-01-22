<?php

namespace App\Controllers\admin;

use App\Controllers\PrivateMessageController;
use App\Models\User;
use DB;

class UserController
{
    const URL_HANDLER = 'handlers/user-handler.php';

    public function index()
    {

        require_once base_path('view/admin/user/index.php');
    }

    public function signal()
    {
        $res = DB::fetch('SELECT * FROM sendprivatemessages WHERE isReported = 1');
        $signales = (new PrivateMessageController)->hydrate($res);




        require_once base_path('view/admin/user/signal.php');
    }

    public function getUserById($id){
        $res =  (DB::fetch('SELECT * FROM users WHERE idUser = '. $id ))[0];
        return (new User())->hydrate($res);
    }
}