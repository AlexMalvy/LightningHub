<?php

namespace App\Models;

use DB;

class Faq
{

    public array $allFaqList = [];


    public function __construct()
    {
        $this->allFaqList = DB::fetch("SELECT question, answer FROM faq");
    }


}