<?php

namespace App\Controllers\admin;

class FaqController
{
    const URL_HANDLER_FAQ = '/handlers/faq-handler.php';

    public function index()
    {
        require_once base_path('view/admin/faq/index.php');
    }

    public function create()
    {
        $faq = null;
        //$title = 'Modifier un produit';
        $actionUrl = self::URL_HANDLER_FAQ;
        $actionValue = 'store';
        require_once base_path('view/admin/faq/faq_create.php');
    }
}