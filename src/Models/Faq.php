<?php

namespace App\Models;

use DB;

class Faq
{
    public function __construct()
    {
        $this->allFaqList = DB::fetch("SELECT question, answer FROM faq");
    }

    public array $allFaqList = [];
}