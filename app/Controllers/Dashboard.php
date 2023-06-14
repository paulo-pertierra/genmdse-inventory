<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ItemModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);
        $itemModel = new ItemModel();
        $itemsCount = $itemModel->countAllResults();
        $data = [
            'title' => 'Admin Dashboard',
            'userInfo' => $userInfo,
            'itemsCount' => $itemsCount
        ];

        return view('template/htmlhead')
              .view('template/dashboard/sidebar', $data)
              .view('dashboard/index', $data)
              .view('template/htmlend');
    }

    public function preferences()
    {
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        $data = [
            'title' => 'Admin Dashboard',
            'userInfo' => $userInfo
        ];
        
        return view('template/htmlhead')
        .view('template/dashboard/sidebar', $data)
        .view('dashboard/preferences')
        .view('template/htmlend');
    }

    public function customers()
    {
        /**
         * Customers contains: CREATE CUSTOMER-> 'id', 'customer name', 'contact', 'address'
         */
    }

    public function transactions()
    {
        /**
         * Transactions contains: CREATE TRANSACTION 'customer name', 'items' 'price'
         */
    }

    public function summary()
    {

    }
}
