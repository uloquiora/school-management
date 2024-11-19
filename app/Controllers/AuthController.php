<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function authenticate()
    {
        $session = session();
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Save user data in session
            $session->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
                'is_logged_in' => true,
            ]);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid username or password.');
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function store()
    {
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if ($password !== $confirmPassword) {
            return redirect()->back()->with('error', 'Passwords do not match.');
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Save the user
        $userModel->insert([
            'username' => $username,
            'password' => $hashedPassword,
            'role' => 'user', // Default role
        ]);

        return redirect()->to('/login')->with('success', 'Registration successful. Please log in.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
