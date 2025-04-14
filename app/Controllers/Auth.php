<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    // Menampilkan halaman login
    public function login()
    {
        // Cek apakah sudah login
        if (session()->get('isLoggedIn')) {
            return redirect()->to(session()->get('role') === 'admin' ? '/admin/dashboard' : '/');
        }

        return view('auth/login');
    }

    public function auth()
    {
        // Ambil username dan password dari form login
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role');  // Ambil role yang dipilih
    
        // Ambil data user berdasarkan username
        $userModel = new UserModel();
        $user = $userModel->getUser($username);

        // Debugging: Menampilkan username dan password yang dimasukkan
        // Hapus echo statement setelah debugging selesai
        echo 'Username yang dimasukkan: ' . $username . '<br>';
        echo 'Password yang dimasukkan: ' . $password . '<br>';
    
        // Cek apakah user ditemukan
        if ($user) {
            // Debugging: Menampilkan hash password di database
            echo 'Hash password di database: ' . $user['password'] . '<br>';

            // Periksa apakah password yang dimasukkan cocok dengan hash password di database
            if (password_verify($password, $user['password'])) {
                echo 'Password valid!<br>';
    
                // Jika login berhasil dan role sesuai, set session
                session()->set([
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'isLoggedIn' => true,
                ]);
    
                // Redirect sesuai dengan role user
                if ($user['role'] === 'admin') {
                    return redirect()->to('/admin/dashboard');
                } else {
                    return redirect()->to('/');
                }
            } else {
                echo 'Password tidak valid.<br>';
                return redirect()->to('/login')->with('error', 'Username atau Password salah.');
            }
        } else {
            echo 'User tidak ditemukan.<br>';
            return redirect()->to('/login')->with('error', 'Username atau Password salah.');
        }
        session()->set([
            'user_id' => $user['id'],
            'username' => $user['username'],
            'is_logged_in' => true
        ]);
    }
    
    // Logout dan hancurkan session
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
        
    }
    
}
