<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ItemModel;
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

    public static function headerData()
    {
        return [
            'location' => 'Inventory'
        ];
    }

    public function index()
    {
        /**
         *  Inventory contains: CREATE ITEM->'code', 'product name', 'description', 'qty', 'price'
         *                      UPDATE ITEM->'code', 'product name', 'description', 'qty', 'price'
         */
        $userModel = new UserModel();
        $itemModel = new \App\Models\ItemModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);
        $itemData = $itemModel->findAll($limit = 5, $offset = 0);

        $data = [
            'items' => $itemData
        ];

        return view('template/htmlhead', Item::headerData())
            . view('template/dashboard/sidebar', Item::userData())
            . view('dashboard/inventory', $data)
            . view('template/htmlend');
    }

    public function create()
    {
        return view('template/htmlhead', Item::headerData())
            . view('template/dashboard/sidebar', $data = Item::userData())
            . view('dashboard/inventory/create')
            . view('template/htmlend');
    }

    public function createItem()
    {
        $validated = $this->validate([
            'brand' => 'required|min_length[2]',
            'name' => 'required|',
            'code' => 'required|min_length[2]|max_length[32]',
            'category' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'description' => 'max_length[1024]'
        ]);

        if (!$validated) {
            return view('template/htmlhead.php', Item::headerData())
                . view('template/dashboard/sidebar', $data = Item::userData())
                . view('dashboard/inventory/create', ['validation' => $this->validator])
                . view('template/htmlend');
        }

        $brand = $this->request->getPost('brand');
        $name = $this->request->getPost('name');
        $code = $this->request->getPost('code');
        $category = $this->request->getPost('category');
        $price = $this->request->getPost('price');
        $quantity = $this->request->getPost('quantity');
        $description = $this->request->getPost('description');

        $data = [
            'brand' => $brand,
            'name' => $name,
            'code' => $code,
            'category' => $category,
            'price' => $price,
            'qty' => $quantity,
            'description' => $description
        ];

        $itemModel = new \App\Models\ItemModel();
        $query = $itemModel->insert($data);

        if (!$query) {
            return redirect()->to('/dashboard/inventory/create')->with('fail', 'Failed to register the user.');
        }

        return redirect()->to('/dashboard/inventory/create')->with('success', 'Registration success.');
    }

    public function view($num)
    {
        $itemModel = new ItemModel();
        $item = $itemModel->find($num);
        $data = [
            'id' => $num,
            'item' => $item
        ];

        return view('template/htmlhead.php', Item::headerData())
            . view('template/dashboard/sidebar', Item::userData())
            . view('dashboard/inventory/view', $data)
            . view('template/htmlend');
    }

    public function delete($num)
    {
        $itemModel = new ItemModel();
        $query = $itemModel->delete($num);

        return redirect()->to('/dashboard/inventory');
    }
}
