<?php

namespace App\Models;

use CodeIgniter\Model;

class HargaModel extends Model
{
    protected $table = 'harga';
    protected $primaryKey = 'id';
    protected $allowedFields = ['produk_id', 'harga'];

    public function getProdukWithHarga($produk_id)
    {
        return $this->db->table('produk')
            ->select('produk.*, harga.harga')
            ->join('harga', 'harga.produk_id = produk.id', 'inner')
            ->where('produk.id', $produk_id)
            ->get()
            ->getRowArray();
    }
    public function getHargaByProdukId($produk_id)
    {
        return $this->where('produk_id', $produk_id)->get()->getRowArray();
    }
}
