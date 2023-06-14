<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Item extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public static function userData()
    {
        $userData = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userData->find($loggedInUserId);

        $data = [
            'title' => 'Admin Dashboard',
            'userInfo' => $userInfo
        ];
        return $data;
    }

    public function inventory()
    {
        /**
         *  Inventory contains: CREATE ITEM->'code', 'product name', 'description', 'qty', 'price'
         *                      UPDATE ITEM->'code', 'product name', 'description', 'qty', 'price'
         */
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        $data = [
            'title' => 'Admin Dashboard',
            'userInfo' => $userInfo
        ];

        return view('template/htmlhead')
            . view('template/dashboard/sidebar', Item::userData())
            . view('dashboard/inventory')
            . view('template/htmlend');
    }

    public function create()
    {
        return view('template/htmlhead')
        . view('template/dashboard/sidebar', $data = Item::userData())
        . view('dashboard/inventory/create')
        . view('template/htmlend');
    }
}
