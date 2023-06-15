<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ItemModel;
use App\Models\UserModel;

class Transaction extends BaseController
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
        $data = [
            'items' => [
                [
                    ''
                ]
            ]
        ];

        return view('template/htmlhead', Transaction::headerData())
            . view('template/dashboard/sidebar', Transaction::userData())
            . view('/inventory/index', $data)
            . view('template/htmlend');
    }
}
