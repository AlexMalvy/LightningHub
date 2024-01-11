<?php

namespace Controllers;

abstract class Controller
{
    public function render(string $view, array $data = []) : void
    {
        extract($data); // Convert array key:value to $key = value variables
        require_once base_path('/views/'.$view.'.php');
    }
}