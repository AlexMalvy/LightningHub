<?php

namespace App\Controllers\admin;

use App\Models\Faq;

class FaqController
{
    const URL_HANDLER_FAQ = '/handlers/faq-handler.php';

    public function index()
    {
        $faqs = FAQ::getAllFaqList();
        $faqs = $this->hydrate($faqs);



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

    public function hydrate(array $faqs) : array
    {

        foreach ($faqs as $key => $faq) {

            $faqs[$key] = Faq::hydrate($faq);
        }

        return $faqs;
    }
}