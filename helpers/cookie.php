<?php

require_once __DIR__.'/../bootstrap/app.php';

use App\Controllers\AuthController;

if( isset($_COOKIE['autoconnection']) && is_string($_COOKIE['autoconnection']) ) {
    $delimiter = "//";
    $split = explode($delimiter, $_COOKIE['autoconnection']);

    if (isset($split[0]) && isset($split[1])) {
        $email = $split[0];
        $password = $split[1];

        $connect = new AuthController();
        $connect->login($email, $password);
    }

}