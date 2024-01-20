<?php

namespace Tests;

use App\Controllers\SocialsController;
use PHPUnit\Framework\TestCase;

class SocialsControllerTest extends TestCase
{
    public function getSocialByFriend (){
        $controller = new SocialsController();
        $result = $controller->getSocialByFriend(1);

    }
}
