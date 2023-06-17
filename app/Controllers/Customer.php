<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\CustomerModel;

class Customer extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

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
        $customerModel = new CustomerModel();

        $customers = $customerModel->findAll();

        $data = [
            'customers' => $customers
        ];
        return view('template/htmlhead', Customer::headerData())
              .view('template/dashboard/sidebar', Customer::userData())
              .view('/customer/index', $data)
              .view('template/htmlend');
    }

    public function create()
    {
        return view('template/htmlhead', Customer::headerData())
              .view('template/dashboard/sidebar', Customer::userData())
              .view('/customer/create')
              .view('template/htmlend');
    }

    public function createCustomer()
    {
        $validated = $this->validate([
            'name' => 'required|min_length[1]',
            'address' => 'required|min_length[3]|max_length[255]',
            'contact_number' => [
                'rules' => 'required|min_length[4]|max_length[15]',
                'errors' => [
                    'required' => 'The phone number field is required.',
                    'min_length' => 'The phone number must be at least 4 characters.',
                    'max_length' => 'Exceeded maximum phone number length.'
                ]
            ],
            'contact_email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'The email address field is required.',
                    'valid_email' => 'The email address field must contain a valid email address.'
                ]
            ],
            'remarks' => 'max_length[1024]',
        ]);

        if (!$validated) {
            return view('template/htmlhead.php', Item::headerData())
                . view('template/dashboard/sidebar', $data = Item::userData())
                . view('/customer/create', ['validation' => $this->validator])
                . view('template/htmlend');
        }

        $name = $this->request->getPost('name');
        $address = $this->request->getPost('address');
        $contactNumber = $this->request->getPost('contact_number');
        $contactEmail = $this->request->getPost('contact_email');
        $remarks = $this->request->getPost('remarks');


        $data = [
            'name' => $name,
            'address' => $address,
            'contact_number' => $contactNumber,
            'contact_email' => $contactEmail,
            'remarks' => $remarks
        ];

        $customerModel = new CustomerModel();
        $query = $customerModel->insert($data);

        if (!$query) {
            return redirect()->to('/customer/create')->with('fail', 'Failed to register customer.');
        }

        return redirect()->to('/customer/create')->with('success', 'Registration success.');
    }
    
    public function view($num)
    {
        $customerModel = new CustomerModel();
        $customer = $customerModel->find($num);
        $data = [
            'id' => $num,
            'customer' => $customer
        ];
        return view('template/htmlhead', Customer::headerData())
              .view('template/dashboard/sidebar', Customer::userData())
              .view('/customer/view', $data)
              .view('template/htmlend');
    }

    public function update($num)
    {
        $customerModel = new CustomerModel();
        $customer = $customerModel->find($num);
        $data = [
            'id' => $num,
            'customer' => $customer
        ];

        return view('template/htmlhead', Customer::headerData())
              .view('template/dashboard/sidebar', Customer::userData())
              .view('/customer/update', $data)
              .view('template/htmlend');
    }

    public function updateCustomer($num)
    {
        $validated = $this->validate([
            'name' => 'required|min_length[1]',
            'address' => 'required|min_length[3]|max_length[255]',
            'contact_number' => [
                'rules' => 'required|min_length[4]|max_length[15]',
                'errors' => [
                    'required' => 'The phone number field is required.',
                    'min_length' => 'The phone number must be at least 4 characters.',
                    'max_length' => 'Exceeded maximum phone number length.'
                ]
            ],
            'contact_email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'The email address field is required.',
                    'valid_email' => 'The email address field must contain a valid email address.'
                ]
            ],
            'remarks' => 'max_length[1024]',
        ]);

        if (!$validated) {
            session()->setFlashdata(['validation' => $this->validator]);
            return redirect()->to('/customer/'. $num . '/update');
        }
        $customerModel = new CustomerModel();
        
        $name = $this->request->getPost('name');
        $address = $this->request->getPost('address');
        $contactNumber = $this->request->getPost('contact_number');
        $contactEmail = $this->request->getPost('contact_email');
        $remarks = $this->request->getPost('remarks');

        $data = [
            'name' => $name,
            'address' => $address,
            'contact_number' => $contactNumber,
            'contact_email' => $contactEmail,
            'remarks' => $remarks
        ];

        $query = $customerModel->update($num, $data);

        if(!$query)
        {
            return redirect()->to('/customer/' . $num . '/update')->with('fail', 'Failed to edit the customer details.');
        }

        return redirect()->to('/customer')->with('success', 'Update success.');
    }
    
    public function delete($num)
    {
        $customerModel = new CustomerModel();
        $query = $customerModel->delete($num);

        return redirect()->to('/customer');
    }
}
