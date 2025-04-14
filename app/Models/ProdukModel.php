<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_produk', 'thumbnail_id', 'kategori_id', 'stok', 'spesifikasi'];

    public function searchProducts(string $query = null): array
    {
        $builder = $this->db->table($this->table)
            ->select('produk.id, produk.nama_produk, produk.spesifikasi, produk.stok, produk.harga, thumbnail.gambar, kategori.nama_kategori')
            ->join('thumbnail', 'thumbnail.id = produk.thumbnail_id', 'left')
            ->join('kategori', 'kategori.id = produk.kategori_id', 'left');

        if (!empty($query)) {
            $builder->like('produk.nama_produk', $query);
        }

        return $builder->get()->getResultArray();
    }
}
