<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\ItemModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
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

    public static function headerData()
    {
        return [
            'location' => 'Dashboard'
        ];
    }

    public function index()
    {
        $itemModel = new ItemModel();
        $itemsCount = $itemModel->countAllResults();

        $customerModel = new CustomerModel();
        $customersCount = $customerModel->countAllResults();
        
        $data = [
            'customersCount' => $customersCount,
            'itemsCount' => $itemsCount
        ];

        return view('template/htmlhead', Dashboard::headerData())
              .view('template/dashboard/sidebar', Dashboard::userData())
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
}
