<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'produk_id', 
        'quantity', 
        'total_harga', 
        'alamat', 
        'email', 
        'metode_pembayaran', 
        'bukti_pembayaran'
    ];
    protected $useTimestamps = false; 
}

