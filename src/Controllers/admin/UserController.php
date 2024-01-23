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
        AdminController::isAdmin();
        require_once base_path('view/admin/user/index.php');
    }

    /**
     * displays the signaled messages
     * @return void
     */
    public function signal()
    {
        AdminController::isAdmin();
        $res = DB::fetch('SELECT * FROM sendprivatemessages WHERE isReported = 1');
        $signales = (new PrivateMessageController)->hydrate($res);

        require_once base_path('view/admin/user/signal.php');
    }

    /**
     * @param $id
     * @display the User object by its ID
     * @return User
     */
    public function getUserById($id){
        $res =  (DB::fetch('SELECT * FROM users WHERE idUser = '. $id ))[0];
        return (new User())->hydrate($res);
    }
}