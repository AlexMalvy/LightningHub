<?php

namespace App\Controllers\admin;

class RoomsController
{
    const URL_HANDLER_HUB = '/handlers/hub-handler.php';

    public function index()
    {
        require_once base_path('view/admin/hub/index.php');
    }

    public function create()
    {
        $hub = null;
        //$title = 'Modifier un produit';
        $actionUrl = self::URL_HANDLER_HUB;
        $actionValue = 'store';
        require_once base_path('view/admin/hub/hub_create.php');
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
//        $product = $this->getProductById($id);
//        $title = 'Modifier un produit';
//        $actionUrl = self::URL_HANDLER;
//        $actionValue = 'update';
        require_once base_path('view/admin/hub/hub_edit.php');
    }
}