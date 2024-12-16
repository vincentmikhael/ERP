<?php

namespace App\Http\Controllers;

use App\Models\BomListModel;
use App\Models\BomModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class BomController extends Controller
{
    public function material()
    {
        $bom = BomModel::join('tb_produk', 'tb_bom.kode_produk', '=', 'tb_produk.kode_produk')
            ->get(['tb_bom.*', 'tb_produk.nama_produk']);

        return view('manufacture.bom-list', ['boms' => $bom]);
    }
    public function materialInput()
    {
        $produk = ProductModel::where('status', 1)->get();
        return view('manufacture.bom', ['products' => $produk]);
    }
    public function materialInputItems($kode_bom)
    {
        $bom = BomModel::join('tb_produk', 'tb_bom.kode_produk', '=', 'tb_produk.kode_produk')
            ->where('tb_bom.kode_bom', $kode_bom)
            ->first(['tb_bom.*', 'tb_produk.nama_produk', 'tb_produk.harga']);
        $bomList = BomListModel::join('tb_produk', 'tb_bom_list.kode_produk', '=', 'tb_produk.kode_produk')
            ->where('tb_bom_list.kode_bom', $kode_bom)
            ->get(['tb_bom_list.*', 'tb_produk.nama_produk', 'tb_produk.harga']);
        $produk = ProductModel::where('status', 2)->get();
        return view('manufacture.bom-item', ['bom' => $bom, 'materials' => $produk, 'list' => $bomList]);
    }
    public function upload(Request $request)
    {
        $this->validate($request, [
            'kode_bom' => 'required',
            'kode_produk' => 'required',
        ]);
        $tanggal = date("Y/m/d");
        BomModel::create([
            'kode_bom' => $request->kode_bom,
            'kode_produk' => $request->kode_produk,
            'tanggal' => $tanggal,
        ]);
        return redirect('/product/bom-input-item/' . $request->kode_bom);
    }
    public function uploadList(Request $request)
    {
        $check = BomListModel::where('kode_produk', $request->kode_produk)
            ->where('kode_bom', $request->kode_bom)
            ->first();
        if ($check != null) {
            $list = BomListModel::find($check->kode_bom_list);
            $jumlah_baru = $list->quantity + $request->quantity;
            $list->quantity = $jumlah_baru;
            $list->save();
        } else {
            BomListModel::create([
                'kode_bom' => $request->kode_bom,
                'kode_produk' => $request->kode_produk,
                'quantity' => $request->quantity,
                'satuan' => $request->satuan
            ]);
        }
        return $this->calcPrice($request->kode_bom);
    }
    public function calcPrice($kode_bom)
    {
        $total_harga = 0;
        $lists = BomListModel::where('kode_bom', $kode_bom)->get();
        foreach ($lists as $i) {
            $product = ProductModel::find($i->kode_produk);
            $harga = $product->harga;
            $total_harga = $total_harga + ($harga * $i->quantity);
        }
        $bom = BomModel::find($kode_bom);
        $bom->total_harga = $total_harga;
        $bom->save();
        return redirect('/product/bom-input-item/' . $kode_bom);
    }
    public function deleteList($kode_bom_list)
    {
        $bom_list = BomListModel::find($kode_bom_list);
        $product = ProductModel::find($bom_list->kode_produk);
        $harga = $product->harga;
        $bom = BomModel::find($bom_list->kode_bom);
        $harga_lama = $bom->total_harga;
        $harga_baru = $harga_lama - ($harga * $bom_list->quantity);

        $bom->total_harga = $harga_baru;
        $bom->save();

        $bom_list->delete();
        return redirect('/product/bom-input-item/' . $bom_list->kode_bom);
    }
}
