<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Customer extends BaseController
{
    public static function headerData()
    {
        return [
            'location' => 'Customers',
            'title' => 'Data'
        ];
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

    public function index()
    {
        return view('template/htmlhead', Customer::headerData())
              .view('template/dashboard/sidebar', Customer::userData())
              .view('/customers/index')
              .view('template/htmlend');
    }
}
