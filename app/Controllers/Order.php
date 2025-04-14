<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class Order extends BaseController
{
    public function index($id)
    {
        $produkModel = new ProdukModel();
    
        // Ambil data produk beserta harga dan gambar
        $produk = $produkModel
            ->select('produk.id, produk.nama_produk, produk.stok, produk.spesifikasi, harga.harga, thumbnail.gambar, kategori.nama_kategori')
            ->join('harga', 'harga.produk_id = produk.id', 'inner')
            ->join('thumbnail', 'thumbnail.id = produk.thumbnail_id', 'inner')
            ->join('kategori', 'kategori.id = produk.kategori_id', 'inner')
            ->find($id);
    
        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }
    
        // Tampilkan view checkout dengan data produk
        return view('order/index', ['produk' => $produk]);
    }
    

    public function processOrder()
    {
        $orderModel = new \App\Models\OrderModel();
        $produkModel = new \App\Models\ProdukModel();
    
        $produk_id = $this->request->getPost('produk_id');
        $quantity = $this->request->getPost('quantity');
        $alamat = $this->request->getPost('alamat');
        $email = $this->request->getPost('email');
        $metode_pembayaran = $this->request->getPost('metode_pembayaran');
    
        // Ambil data produk
        $produk = $produkModel->find($produk_id);
        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }
    
        // Validasi stok
        if ($produk['stok'] < $quantity) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi.');
        }
    
        // Hitung total harga
        $total_harga = $produk['harga'] * $quantity;
    
        // Simpan data pesanan
        $orderModel->insert([
            'produk_id' => $produk_id,
            'quantity' => $quantity,
            'total_harga' => $total_harga,
            'alamat' => $alamat,
            'email' => $email,
            'metode_pembayaran' => $metode_pembayaran,
        ]);
    
        // Kurangi stok produk
        $produkModel->update($produk_id, ['stok' => $produk['stok'] - $quantity]);
    
        return redirect()->to('/')->with('message', 'Pesanan berhasil dibuat.');
    }    
}
