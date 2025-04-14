<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\{ProdukModel, OrderModel};

class Dashboard extends BaseController
{
    protected $produkModel, $orderModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->orderModel = new OrderModel();
    }

    public function index()
    {
        // Hitung Total Produk
        $totalProducts = $this->produkModel->countAllResults();

        // Hitung Total Penjualan (Rp)
        $totalSales = $this->orderModel
            ->selectSum('total_harga')
            ->get()
            ->getRow()
            ->total_harga ?? 0;

        // Hitung Total Stok
        $totalStock = $this->produkModel
            ->selectSum('stok')
            ->get()
            ->getRow()
            ->stok ?? 0;

        // Hitung Total Produk Terjual
        $totalSold = $this->orderModel
            ->selectSum('quantity')
            ->get()
            ->getRow()
            ->quantity ?? 0;

        // Data untuk Donut Chart
        $donutLabels = ['Stock', 'Sold'];
        $donutValues = [$totalStock, $totalSold];

        // Data untuk Sales Chart (per hari)
        $salesData = $this->orderModel
            ->select("DATE(created_at) as date, SUM(total_harga) as total")
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get()
            ->getResultArray();

        $salesLabels = array_column($salesData, 'date');
        $salesValues = array_column($salesData, 'total');

        return view('admin/dashboard/index', [
            'totalProducts' => $totalProducts,
            'totalSales' => $totalSales,
            'totalStock' => $totalStock,
            'totalSold' => $totalSold,
            'salesLabels' => $salesLabels,
            'salesValues' => $salesValues,
            'donutLabels' => $donutLabels,
            'donutValues' => $donutValues,
        ]);
    }
}
