<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hash;

class Auth extends BaseController
{

    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        return view('template/htmlhead.php')
             . view('auth/login')
             . view('template/htmlend');
    }

    public function register()
    {
        return view('template/htmlhead.php')
             . view('auth/register')
             . view('template/htmlend');
    }

    /**
     * Register a User to database.
     */
    public function registerUser()
    {
        $validated = $this->validate([
            'name' => 'required|min_length[4]',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]|max_length[32]',
            'confirmPassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Please confirm your password.',
                    'matches' => 'Your password did not match.'
                ]
            ]
        ]);

        if (!$validated) 
        {
            return view('template/htmlhead.php')
                 . view('auth/register', ['validation' => $this->validator])
                 . view('template/htmlend');
        }
        
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => Hash::encrypt($password)
        ];   

        $userModel = new \App\Models\UserModel();
        $query = $userModel->insert($data);

        if(!$query)
        {
            return redirect()->to('auth/register')->with('fail', 'Failed to register the user.');
        }

        return redirect()->to('auth/register')->with('success', 'Registration success.');
    }

    public function loginUser()
    {
        $validated = $this->validate([
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]|max_length[32]',
        ]); 

        if (!$validated) {
            return view('template/htmlhead.php')
            . view('auth/login', ['validation' => $this->validator])
            . view('template/htmlend');
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new \App\Models\UserModel();
        $userData = $userModel->where('email', $email)->first();

        if (!$userData) {
            session()->setFlashdata('fail', 'Incorrect email.');
            return redirect()->to('auth');
        }

        $checkPassword = Hash::check($password, $userData['password']);

        if(!$checkPassword)
        {
            session()->setFlashdata('fail', 'Incorrect password.');
            return redirect()->to('auth');
        }

        $userId = $userData['id'];

        session()->set('loggedInUser', $userId);
        return redirect()->to('/dashboard');
    }
}
