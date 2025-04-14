<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profile extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // Ambil user_id dari session
        $userId = session()->get('user_id');

        if (!$userId) {
            // Jika tidak ada user_id di session, redirect ke login
            return redirect()->to('/auth/login');
        }

        // Ambil data user berdasarkan user_id
        $user = $this->userModel->find($userId);

        if (!$user) {
            // Jika user tidak ditemukan, redirect ke dashboard
            return redirect()->to('/admin/dashboard')->with('error', 'User not found.');
        }

        // Kirim data user ke view
        return view('admin/profile/index', [
            'user' => $user
        ]);
    }
}
