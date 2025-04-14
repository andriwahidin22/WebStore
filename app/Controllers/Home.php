<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class Home extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        // Ambil data untuk kategori iOS
        $produkIos = $this->produkModel
            ->select('produk.id, produk.nama_produk, produk.spesifikasi, produk.stok, thumbnail.gambar, harga.harga')
            ->join('thumbnail', 'thumbnail.id = produk.thumbnail_id', 'inner')
            ->join('harga', 'harga.produk_id = produk.id', 'inner')
            ->join('kategori', 'kategori.id = produk.kategori_id', 'inner')
            ->where('kategori.nama_kategori', 'iOS')
            ->findAll();

        // Ambil data untuk kategori Android
        $produkAndroid = $this->produkModel
            ->select('produk.id, produk.nama_produk, produk.spesifikasi, produk.stok, thumbnail.gambar, harga.harga')
            ->join('thumbnail', 'thumbnail.id = produk.thumbnail_id', 'inner')
            ->join('harga', 'harga.produk_id = produk.id', 'inner')
            ->join('kategori', 'kategori.id = produk.kategori_id', 'inner')
            ->where('kategori.nama_kategori', 'Android')
            ->findAll();

        // Ambil produk terbaru
        $produkTerbaru = $this->produkModel
            ->select('produk.id, produk.nama_produk, produk.spesifikasi, produk.stok, thumbnail.gambar, harga.harga')
            ->join('thumbnail', 'thumbnail.id = produk.thumbnail_id', 'inner')
            ->join('harga', 'harga.produk_id = produk.id', 'inner')
            ->orderBy('produk.id', 'DESC')
            ->limit(6)
            ->findAll();

        // Kirim semua data ke view
        return view('index', [
            'produkIos' => $produkIos,
            'produkAndroid' => $produkAndroid,
            'produkTerbaru' => $produkTerbaru,
        ]);
    }
    public function search()
    {
        $query = $this->request->getGet('search'); // Ambil input pencarian
    
        $produk = $this->produkModel
            ->select('produk.id, produk.nama_produk, produk.spesifikasi, produk.stok, thumbnail.gambar, harga.harga, kategori.nama_kategori')
            ->join('thumbnail', 'thumbnail.id = produk.thumbnail_id', 'inner')
            ->join('harga', 'harga.produk_id = produk.id', 'inner')
            ->join('kategori', 'kategori.id = produk.kategori_id', 'inner')
            ->like('produk.nama_produk', $query)
            ->findAll();
    
        return view('search_results', [
            'produk' => $produk,
            'query' => $query,
        ]);
    }
    
}
