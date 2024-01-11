<?php

namespace Controllers;

class WelcomeController
{
    public function index() : void
    {
        require_once base_path('views/welcome/index.php');
    }
}