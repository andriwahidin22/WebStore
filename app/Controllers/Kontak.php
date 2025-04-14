<?php

namespace App\Controllers;

class Kontak extends BaseController
{
    public function index()
    {
        return view('contact/kontak'); // Menampilkan file 'kontak.php' dari folder 'contact'
    }
}
