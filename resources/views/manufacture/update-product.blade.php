@extends('admin')
@section('main')
<div class="container-fluid">
    <form action="{{ url('edit-product/update/'.$product->kode_produk) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="kode_produk">Code product</label>
            <input type="text" class="form-control" id="kode_produk" name="kode_produk" value="{{$product->kode_produk}}" disabled>
        </div>
        <div class="form-group">
            <label for="nama_product">Nama Product</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{$product->nama_produk}}">
        </div>
        <div class="form-group">
            <label for="harga_product">Harga Product</label>
            <input type="text" class="form-control" id="harga" name="harga" value="{{$product->harga}}">
        </div>
        <div class="form-group">
            <label for="deskripsi_product">Deskripsi Product</label>
            <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk" rows="3">{{$product->deskripsi_produk}}</textarea>
        </div>
        
        <input type="hidden" name="status" value="{{$product->status}}">
    
        <div class="form-group">
            <label for="exampleFormControlFile1">Pilih Gambar Product</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar">
        </div>

        <button class="btn btn-primary" type="submit" name="simpan">Update</button>
    </form>
</div>
@endsection