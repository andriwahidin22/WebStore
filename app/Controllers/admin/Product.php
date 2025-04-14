<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\{KategoriModel, ThumbnailModel, ProdukModel, HargaModel};

class Product extends BaseController
{
    protected $kategoriModel, $thumbnailModel, $produkModel, $hargaModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
        $this->thumbnailModel = new ThumbnailModel();
        $this->produkModel = new ProdukModel();
        $this->hargaModel = new HargaModel();
    }

    private function formatRupiah($angka)
    {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }

    public function index()
    {
        $search = $this->request->getGet('search');
        $query = $this->produkModel
        ->select('produk.id, produk.nama_produk, produk.stok, produk.spesifikasi, kategori.nama_kategori, thumbnail.gambar, harga.harga')
        ->join('kategori', 'kategori.id = produk.kategori_id', 'inner')
        ->join('thumbnail', 'thumbnail.id = produk.thumbnail_id', 'inner')
        ->join('harga', 'harga.produk_id = produk.id', 'inner');
    

        if (!empty($search)) {
            $query->like('produk.nama_produk', $search);
        }

        $products = $query->findAll();

        foreach ($products as &$product) {
            $product['harga'] = $this->formatRupiah($product['harga']);
        }
        return view('admin/product/index', [
            'products' => $products,
            'flashdata' => session()->getFlashdata('message') // Ambil pesan flashdata
        ]);
    }


    public function create()
    {
        $categories = $this->kategoriModel->findAll();
        return view('admin/product/create', ['categories' => $categories]);
    }

    public function store()
    {
        try {
            // Proses penyimpanan data
            $file = $this->request->getFile('thumbnail');
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(FCPATH . 'uploads', $newName);

                $this->thumbnailModel->save(['gambar' => $newName]);
                $thumbnailId = $this->thumbnailModel->insertID();

                $this->produkModel->save([
                    'nama_produk' => $this->request->getPost('nama_produk'),
                    'thumbnail_id' => $thumbnailId,
                    'kategori_id' => $this->request->getPost('kategori_id'),
                    'spesifikasi' => $this->request->getPost('spesifikasi'),
                    'stok' => $this->request->getPost('stok')
                ]);

                $this->hargaModel->save([
                    'produk_id' => $this->produkModel->insertID(),
                    'harga' => $this->request->getPost('harga')
                ]);

                return redirect()->to('/admin/product')->with('message', 'Product added successfully!');
            } else {
                return redirect()->back()->with('error', 'Thumbnail upload failed.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add product.');
        }
    }


    public function edit($id)
    {
        $product = $this->produkModel
            ->select('produk.*, thumbnail.gambar, harga.harga, kategori.nama_kategori')
            ->join('thumbnail', 'thumbnail.id = produk.thumbnail_id')
            ->join('harga', 'harga.produk_id = produk.id')
            ->join('kategori', 'kategori.id = produk.kategori_id')
            ->where('produk.id', $id)
            ->first();

        $categories = $this->kategoriModel->findAll();

        if (!$product) {
            return redirect()->to('/admin/product')->with('error', 'Product not found.');
        }

        return view('admin/product/update', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update($id)
    {
        $file = $this->request->getFile('thumbnail');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $newName);

            $thumbnailData = ['gambar' => $newName];
            $this->thumbnailModel->update($id, $thumbnailData);
        }

        $productData = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'spesifikasi' => $this->request->getPost('spesifikasi'),
            'stok' => $this->request->getPost('stok')
        ];
        $this->produkModel->update($id, $productData);

        $priceData = [
            'harga' => $this->request->getPost('harga')
        ];
        $this->hargaModel->where('produk_id', $id)->set($priceData)->update();

        return redirect()->to('/admin/product')->with('message', 'Product updated successfully!');
    }

    public function delete($id)
    {
        $this->hargaModel->where('produk_id', $id)->delete();

        $product = $this->produkModel->find($id);
        if ($product) {
            $thumbnailId = $product['thumbnail_id'];
            $this->thumbnailModel->delete($thumbnailId);
        }

        $this->produkModel->delete($id);

        return redirect()->to('/admin/product')->with('message', 'Product deleted successfully!');
    }
    public function detail($id)
    {
        $produk = $this->produkModel
            ->select('produk.*, kategori.nama_kategori, thumbnail.gambar, harga.harga')
            ->join('kategori', 'kategori.id = produk.kategori_id')
            ->join('thumbnail', 'thumbnail.id = produk.thumbnail_id')
            ->join('harga', 'harga.produk_id = produk.id')
            ->find($id);

        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        return view('product/detail', ['produk' => $produk]);
    }
    public function search()
    {
        $query = $this->request->getGet('search');
        $produkModel = new ProdukModel();

        $produk = $produkModel
            ->select('produk.*, thumbnail.gambar')
            ->join('thumbnail', 'thumbnail.id = produk.thumbnail_id', 'left') // Pastikan join dengan tabel thumbnail
            ->like('produk.nama_produk', $query)
            ->findAll();

        return view('search_results', ['produk' => $produk, 'query' => $query]);
    }
}
