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
        $db = \Config\Database::connect();
        $builder = $db->table('transactions t')->distinct();
        $builder->select('t.id, customers.name, t.transaction_type, t.total_price, t.payment_amount, t.payment_change');
        $builder->from('transactions');
        $builder->join('customers', 't.customer_id = customers.id');
        $transactions = $builder->get()->getResult('array');

        $data = [
            'transactions' => $transactions
        ];

        return view('template/htmlhead', Transaction::headerData())
            . view('template/dashboard/sidebar', Transaction::userData())
            . view('/transaction/index', $data)
            . view('template/htmlend');
    }
}
