<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\SalesListModel;
use App\Models\SalesModel;
use App\Models\StakeholderModel;
use Illuminate\Http\Request;
use Svg\Tag\Rect;

class SalesController extends Controller
{
    public function inputSale()
    {
        $customer = StakeholderModel::Where('level', 2)->get();
        return view('sales.sales-input', ['customers' => $customer]);
    }
    public function upload(Request $request)
    {
        $tanggal = date("Y/m/d");
        SalesModel::create([
            'kode_sales' => $request->kode_sales,
            'kode_customer' => $request->kode_customer,
            'tanggal_transaksi' => $tanggal,
            'status' => 0,
            'total_harga' => 0,
            'metode_pembayaran' => 0
        ]);

        return redirect('sales/input/' . $request->kode_sales);
    }
    public function inputItems($kode_sales)
    {
        $sales = SalesModel::join('tb_stakeholder', 'tb_sales.kode_customer', '=', 'tb_stakeholder.kode')
            ->where('tb_sales.kode_sales', $kode_sales)
            ->first(['tb_sales.*', 'tb_stakeholder.nama', 'tb_stakeholder.alamat']);
        $salesList = SalesListModel::join('tb_produk', 'tb_sales_list.kode_produk', '=', 'tb_produk.kode_produk')
            ->where('tb_sales_list.kode_sales', $kode_sales)
            ->get(['tb_sales_list.*', 'tb_produk.nama_produk', 'tb_produk.harga']);
        $produk = ProductModel::where('status', 1)->get();
        return view('sales.sales', ['sales' => $sales, 'salesList' => $salesList, 'products' => $produk]);
    }
    public function uploadItems(Request $request)
    {
        $check = SalesListModel::where('kode_produk', $request->kode_produk)
            ->where('kode_sales', $request->kode_sales)
            ->first();
        if ($check != null) {
            $list = SalesListModel::find($check->kode_sales_list);
            $jumlah_baru = $list->quantity + $request->quantity;
            $list->quantity = $jumlah_baru;
            $list->save();
        } else {
            SalesListModel::create([
                'kode_sales' => $request->kode_sales,
                'kode_produk' => $request->kode_produk,
                'quantity' => $request->quantity,
                'satuan' => $request->satuan
            ]); 
        }
        return $this->calcPrice($request->kode_sales);
    }
    public function calcPrice($kode_sales)
    {
        $total_harga = 0;
        $lists = SalesListModel::where('kode_sales', $kode_sales)->get();
        foreach ($lists as $i) {
            $product = ProductModel::find($i->kode_produk);
            $harga = $product->harga;
            $total_harga = $total_harga + ($harga * $i->quantity);
        }
        $sales = SalesModel::find($kode_sales);
        $sales->total_harga = $total_harga;
        $sales->save();

        return redirect('sales/input/'.$kode_sales);
    }
    public function saveItems($kode_sales)
    {
        $sales = SalesModel::find($kode_sales);
        $sales->status = $sales->status + 1;
        $sales->save();
        return redirect('sales/input/' . $kode_sales);
    }
    public function caItems($kode_sales)
    {
        $sales = SalesModel::join('tb_stakeholder', 'tb_sales.kode_customer', '=', 'tb_stakeholder.kode')
        ->where('tb_sales.kode_sales', $kode_sales)
        ->first(['tb_sales.*', 'tb_stakeholder.nama', 'tb_stakeholder.alamat']);
        $kode_sales = $sales->kode_sales;
        $saleList = SalesListModel::join('tb_produk', 'tb_sales_list.kode_produk', '=', 'tb_produk.kode_produk')
            ->where('tb_sales_list.kode_sales', $kode_sales)
            ->get(['tb_sales_list.*', 'tb_produk.nama_produk', 'tb_produk.harga', 'tb_produk.kuantitas']);
        $produk = ProductModel::where('status', 1)->get();
        $avail = $this->getAvailability($saleList, $sales);
        return view('sales.sales-ca', ['sales' => $sales, 'materials' => $produk, 'list' => $saleList, 'avail' => $avail]);
    }
    public function salesCreateBill(Request $request)
    {
        $sales = SalesModel::find($request->kode_sales);
        $sales->metode_pembayaran = $request->metode_pembayaran;
        $sales->status = $sales->status + 1;
        $sales->save();
        return $this->caItems($request->kode_sales);
    }
    public function getAvailability($saleList, $sales)
    {
        $avail = true;
        foreach ($saleList as $item) {
            if ($item->kuantitas < ($item->quantity)) {
                $avail = false;
            } else {
                $avail = true;
            }
        }
        return $avail;
    }
    public function confirmBill(Request $request)
    {

        $saleList = SalesListModel::Where('kode_sales', $request->kode_sales)->get();
        foreach ($saleList as $item) {
            $product = ProductModel::find($item->kode_produk);
            $product->kuantitas = $product->kuantitas - $item->quantity;
            $product->save();
        }
        $sales = SalesModel::find($request->kode_sales);
        $sales->metode_pembayaran = $sales->metode_pembayaran;
        $sales->status = $sales->status + 1;
        $sales->save();
        return redirect('sales/all');
    }
    public function allSales()
    {
        $sales = SalesModel::join('tb_stakeholder', 'tb_sales.kode_customer', '=', 'tb_stakeholder.kode')
            ->get(['tb_sales.*', 'tb_stakeholder.nama', 'tb_stakeholder.alamat']);
        return view('sales.sales-all', ['sales' => $sales]);
    }
}
