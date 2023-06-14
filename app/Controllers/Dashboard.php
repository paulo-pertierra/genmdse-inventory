<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
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

        $customerModel = new CustomerModel();
        $customersCount = $customerModel->countAllResults();
        $data = [
            'title' => 'Admin Dashboard',
            'userInfo' => $userInfo,
            'itemsCount' => $itemsCount,
            'customersCount' => $customersCount
        ];

        $header = [
            'location' => 'Dashboard'
        ];

        return view('template/htmlhead', $header)
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
        
        return view('template/htmlhead', ['location' => 'Preferences'])
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
