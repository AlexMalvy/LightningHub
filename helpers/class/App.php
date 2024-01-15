<?php

class App
{
    public static function terminate() : void
    {
        // Remove errors, success and old data
        unset($_SESSION['errors']);
        unset($_SESSION['success']);
        unset($_SESSION['old']);
    }
}