<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\ItemModel;
use App\Models\PurchaseModel;
use App\Models\TransactionModel;
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
        $builder->select('t.id, customers.name, t.payment_method, t.payment_due, t.payment_amount, t.payment_change');
        $builder->from('transactions');
        $builder->join('customers', 't.customer_id = customers.id');
        $transactions = $builder->get()->getResult('array');

        $data = [
            'transactions' => $transactions,
        ];

        return view('template/htmlhead', Transaction::headerData())
            . view('template/dashboard/sidebar', Transaction::userData())
            . view('/transaction/index', $data)
            . view('template/htmlend');
    }

    public function create()
    {
        $session = session();

        if (!isset($_SESSION['cart'])) {
            $session->set('cart', []);
            $session->set('paymentDue', 0);
        }

        $customerModel = new CustomerModel();
        $itemModel = new ItemModel();

        $items = $itemModel->findAll();
        $customers = $customerModel->findAll();

        $data = [
            'cartItems' => session()->get('cart'),
            'customers' => $customers,
            'items' => $items,
            'paymentDue' => session()->get('paymentDue')
        ];

        return view('template/htmlhead', Transaction::headerData())
            . view('template/dashboard/sidebar', Transaction::userData())
            . view('/transaction/create', $data)
            . view('template/htmlend');
    }

    public function updateCartItems()
    {
        $validated = $this->validate([
            'new_cart_item' => 'required|min_length[5]',
            'new_cart_item_qty' => 'required|numeric|min_length[1]'
        ]);

        if (!$validated) {
            return redirect()->back();
        }

        $session = session();

        $newCartItem = $this->request->getPost('new_cart_item');

        if (is_string($newCartItem)) {
            $product = explode('|', $newCartItem);
        }

        $name = $this->request->getPost('new_cart_item');
        $cart = $session->get('cart');
        $newItem =             [
            'id' => $product[0],
            'price' => $product[1],
            'name' => $product[2],
            'qty' => $this->request->getPost('new_cart_item_qty')
        ];

        $exists = false;
        foreach ($cart as $item) {
            if ($item == $newItem) {
                $exists = true;
                break;
            }
        }

        // Add the new item only if it doesn't already exist
        if (!$exists) {
            $cart[] = $newItem;
            $session->set('paymentDue', $session->get('paymentDue') + ($product[1] * $this->request->getPost('new_cart_item_qty')));
            $session->set('cart', $cart);
        }

        return redirect()->back();
    }

    public function deleteAllCartItems()
    {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
            unset($_SESSION['paymentDue']);
            redirect()->to('/transaction/create');
        }
        return redirect()->back();
    }

    public function deleteCartItem($num)
    {
        $session = session();

        if (!isset($_SESSION['cart'])) {
            return redirect()->to('/transaction/create');
        }
        $cart = $session->get('cart');

        if (!is_array($cart[$num])) {
            return redirect()->to('/transaction/create');
        }

        $newPaymentDue = $session->get('paymentDue') - ($cart[$num]['price'] * $cart[$num]['qty']);
        $session->set('paymentDue', $newPaymentDue);
        unset($cart[$num]);
        $session->set('cart', $cart);

        return redirect()->to('/transaction/create');
    }

    public function createTransaction()
    {
        $db = db_connect();
        $validated = $this->validate([
            'customer_id' => 'required',
            'payment_method' => 'required|min_length[1]',
            'payment_amount' => 'required',
            'payment_due' => 'required',
            'cart_item_name' => 'required',
            'cart_item_qty' => 'required'
        ]);

        if (!$validated) {
            return redirect()->to('/transaction/create')->with('validation', $this->validator);
        }

        $customer_id = $this->request->getPost('customer_id');
        $payment_method = $this->request->getPost('payment_method');
        $payment_due = $this->request->getPost('payment_due');
        $payment_amount = $this->request->getPost('payment_amount');

        $session = session();

        if ($payment_amount < $payment_due) {
            return redirect()->to('/transaction/create')->with('validation', $this->validator);
        }

        $payment_change = $payment_amount - $payment_due;

        $transactionModel = new TransactionModel();
        $purchaseModel = new PurchaseModel();
        $data = [
            'customer_id' => $customer_id,
            'payment_method' => $payment_method,
            'payment_due' => $payment_due,
            'payment_amount' => $payment_amount,
            'payment_change' => $payment_change
        ];

        $transactionModel->insert($data);
        $transaction_id = $transactionModel->getInsertID();
        $cart = $session->get('cart');

        foreach(array_keys($cart) as $index) {
            $purchaseModel->insert([
                'transaction_id' => $transaction_id,
                'item_id' => $cart[$index]['id'],
                'qty' => (int)$cart[$index]['qty'],
                'purchase_price' => ($cart[$index]['price'] * $cart[$index]['qty'])
            ]);
        }

        unset($_SESSION['cart']);
        unset($_SESSION['paymentDue']);
        
        return redirect()->to('/transaction');;
    }
}
