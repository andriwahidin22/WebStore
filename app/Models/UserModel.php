<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // Nama tabel yang digunakan oleh model ini
    protected $table = 'users';

    // Primary key untuk tabel ini
    protected $primaryKey = 'id';

    // Daftar field yang diperbolehkan untuk disertakan dalam query
    protected $allowedFields = ['username', 'password', 'profile_picture', 'role'];

    // Menambahkan timestamp untuk created_at dan updated_at
    protected $useTimestamps = true;

    // Fungsi untuk mendapatkan user berdasarkan username
    public function getUser($username)
    {
        return $this->where('username', $username)->first();
    }

    // Fungsi untuk memperbarui profil pengguna
    public function updateProfile($userId, $data)
    {
        // Jika password tidak kosong, hash password baru
        if (!empty($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        } else {
            // Jika tidak ada perubahan pada password, jangan perbarui password
            unset($data['password']);
        }

        // Update profil pengguna di database
        return $this->update($userId, $data);
    }
}
