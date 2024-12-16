<?php

namespace App\Http\Controllers;

use App\Models\MoModel;
use App\Models\ProductModel;
use App\Models\BomModel;
use App\Models\BomListModel;
use App\Models\TempProduceModel;
use Illuminate\Http\Request;
use File;
use Image;
use PDF;

class ManufactureController extends Controller
{
    public function input()
    {
        return view('manufacture.input-product');
    }
    public function inputMaterial()
    {
        return view('manufacture.input-material');
    }
    public function allProduct()
    {
        $product = ProductModel::where('status',1)->get();
        return view('manufacture.product', ['products' => $product]);
    }
    public function allMaterial()
    {
        $product = ProductModel::where('status',2)->get();
        return view('manufacture.material', ['products' => $product]);
    }
    public function getAvailability($bomList, $mo)
    {
        $avail = true;
        foreach ($bomList as $item) {
            if ($item->kuantitas < ($item->quantity * $mo->quantity)) {
                $avail = false;
            } else {
                $avail = true;
            }
        }
        return $avail;
    }
    public function upload(Request $request)
    {
        $this->validate($request, [
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required',
            'deskripsi_produk' => 'required',
            'status' => 'required',
            'gambar' => 'file|image|mimes:jpeg,png,jpg:max:2048'
        ]);
        if ($request->hasfile('gambar')) {
            $image = $request->file('gambar');
            $nama_gambar = time() . "_" . $image->getClientOriginalName();
            $destinationPath = public_path('/gambar');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $nama_gambar);
            $image->move($destinationPath, $nama_gambar);
        } else {
            $nama_gambar = "placeholder.png";
        }

        ProductModel::create([
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'kuantitas' => 0,
            'harga' => $request->harga,
            'status' => $request->status,
            'deskripsi_produk' => $request->deskripsi_produk,
            'gambar' => $nama_gambar
        ]);
        if($request->status == 1){
            return redirect('/product');
        }else{
            return redirect('/material');
        }
        
    }
    public function edit($kode_produk)
    {
        $product = ProductModel::find($kode_produk);
        return view('manufacture.update-product', compact('product'), ['product' => $product]);
    }

    public function update($kode_produk, Request $request)
    {
        $this->validate($request, [
            'nama_produk' => 'required',
            'harga' => 'required',
            'deskripsi_produk' => 'required',
            'status' => 'required',
            'gambar' => 'file|image|mimes:jpeg,png,jpg:max:2048'
        ]);

        $product = ProductModel::find($kode_produk);
        $product->nama_produk = $request->nama_produk;
        $product->harga = $request->harga;
        $product->deskripsi_produk = $request->deskripsi_produk;
        $product->status = $request->status;

        if ($request->hasfile('gambar')) {

            File::delete('gambar/' . $product->gambar);
            $image = $request->file('gambar');
            $nama_gambar = time() . "_" . $image->getClientOriginalName();
            $destinationPath = public_path('/gambar');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $nama_gambar);
            $image->move($destinationPath, $nama_gambar);

            $product->gambar = $nama_gambar;
        }

        $product->save();
        if($request->status == 1){
            return redirect('/product');
        }else{
            return redirect('/material');
        }
    }
    public function delete($kode_produk)
    {
        $product = ProductModel::find($kode_produk);
        File::delete('gambar/' . $product->gambar);

        // hapus data
        $product->delete();
        if($product->status == 1){
            return redirect('/product');
        }else{
            return redirect('/material');
        }
    }

    public function material()
    {
        return view('manufacture.bom');
    }
    public function manufactureOrder()
    {
        $moDatas = MoModel::join('tb_bom', 'tb_mo.kode_bom', '=', 'tb_bom.kode_bom')
            ->join('tb_produk', 'tb_bom.kode_produk', '=', 'tb_produk.kode_produk')
            ->get(['tb_mo.*', 'tb_produk.nama_produk']);
        $boms = BomModel::join('tb_produk', 'tb_bom.kode_produk', '=', 'tb_produk.kode_produk')
            ->get(['tb_bom.*', 'tb_produk.nama_produk']);
        return view('manufacture.manufacture-order', ['moDatas' => $moDatas, 'boms' => $boms]);
    }
    public function moUpload(Request $request)
    {
        MoModel::create([
            'kode_mo' => $request->kode_mo,
            'kode_bom' => $request->kode_bom,
            'quantity' => $request->quantity,
            'status' => 1,
        ]);
        $moDatas = MoModel::join('tb_bom', 'tb_mo.kode_bom', '=', 'tb_bom.kode_bom')
            ->join('tb_produk', 'tb_bom.kode_produk', '=', 'tb_produk.kode_produk')
            ->get(['tb_mo.*', 'tb_produk.nama_produk']);
        $boms = BomModel::join('tb_produk', 'tb_bom.kode_produk', '=', 'tb_produk.kode_produk')
            ->get(['tb_bom.*', 'tb_produk.nama_produk']);
        return view('manufacture.manufacture-order', ['moDatas' => $moDatas, 'boms' => $boms]);
    }
    public function moUpdate($kode_mo, Request $request)
    {
        $mo = MoModel::find($kode_mo);
        $mo->status = $mo->status + 1;
        $mo->kode_bom =  $mo->kode_bom;
        $mo->quantity =  $mo->quantity;
        $mo->save();
        $moDatas = MoModel::join('tb_bom', 'tb_mo.kode_bom', '=', 'tb_bom.kode_bom')
            ->join('tb_produk', 'tb_bom.kode_produk', '=', 'tb_produk.kode_produk')
            ->get(['tb_mo.*', 'tb_produk.nama_produk']);
        $boms = BomModel::join('tb_produk', 'tb_bom.kode_produk', '=', 'tb_produk.kode_produk')
            ->get(['tb_bom.*', 'tb_produk.nama_produk']);
        return view('manufacture.manufacture-order', ['moDatas' => $moDatas, 'boms' => $boms]);
    }
    public function caItems($kode_mo)
    {
        $mo = MoModel::find($kode_mo);
        $kode_bom = $mo->kode_bom;
        $bom = BomModel::join('tb_produk', 'tb_bom.kode_produk', '=', 'tb_produk.kode_produk')
            ->where('tb_bom.kode_bom', $kode_bom)
            ->first(['tb_bom.*', 'tb_produk.nama_produk', 'tb_produk.harga']);
        $bomList = BomListModel::join('tb_produk', 'tb_bom_list.kode_produk', '=', 'tb_produk.kode_produk')
            ->where('tb_bom_list.kode_bom', $kode_bom)
            ->get(['tb_bom_list.*', 'tb_produk.nama_produk', 'tb_produk.harga', 'tb_produk.kuantitas']);
        $produk = ProductModel::where('status', 2)->get();
        $avail = $this->getAvailability($bomList, $mo);
        return view('manufacture.ca-item', ['bom' => $bom, 'materials' => $produk, 'mo' => $mo, 'list' => $bomList, 'avail' => $avail]);
    }

    public function moProduce($kode_mo)
    {
        $mo = MoModel::find($kode_mo);
        $kode_bom = $mo->kode_bom;
        $bomList = BomListModel::join('tb_produk', 'tb_bom_list.kode_produk', '=', 'tb_produk.kode_produk')
            ->where('tb_bom_list.kode_bom', $kode_bom)
            ->get(['tb_bom_list.*', 'tb_produk.nama_produk', 'tb_produk.harga', 'tb_produk.kuantitas']);
        foreach ($bomList as $list) {
            TempProduceModel::create([
                'kode_bom_list' => $list->kode_bom_list,
                'quantity_order' => $list->quantity * $mo->quantity,
            ]);
        }
        $mo->status = $mo->status + 1;
        $mo->save();
        return redirect('/product/ca-item/' . $kode_mo);
    }

    public function moProsesProduce($kode_mo)
    {
        $mo = MoModel::find($kode_mo);
        $kode_bom = $mo->kode_bom;
        $bomList = BomListModel::join('tb_produk', 'tb_bom_list.kode_produk', '=', 'tb_produk.kode_produk')
            ->where('tb_bom_list.kode_bom', $kode_bom)
            ->get(['tb_bom_list.*', 'tb_produk.nama_produk', 'tb_produk.harga', 'tb_produk.kuantitas']);
        $bom = BomModel::find($kode_bom);
        $produk = ProductModel::find($bom->kode_produk);
        $produk->kuantitas = $produk->kuantitas + $mo->quantity;
        $produk->save();
        foreach ($bomList as $list) {
            $temp = TempProduceModel::where('kode_bom_list', $list->kode_bom_list)->get()->first();
            $produk = ProductModel::find($list->kode_produk);
            $produk->kuantitas = $produk->kuantitas - $temp->quantity_order;
            $produk->save();
            $tempDelete = TempProduceModel::find($temp->id);
            $tempDelete->delete();
        }
        $mo->status = 5;
        $mo->save();
        return redirect('/product/mo');
    }

    public function printPdf()
    {
        $pdf = PDF::loadview('manufacture.product-pdf');
        return $pdf->stream();
    }
}
