@extends('admin')
@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
@endsection
@section('main')
<div class="container-fluid">
    <div class="row">
        <h1 class="h3 mb-4 text-gray-800 col-md-12">Insert Bill of Materials</h1>
        <form action="{{ url('product/bom-input') }}" method="post" name="input-form" id="input-form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div>
                <div class="form-group">
                    <label for="nama_product">ID Bom</label>
                    <input type="text" class="form-control" id="kode_bom" name="kode_bom" required>
                </div>
                <div class="form-group">
                    <label for="select_item">Pilih Product</label>
                    <br>
                    <select class="theSelect" name="kode_produk">
                        @if($products->count())
                        @foreach($products as $item)
                        <option value="{{$item->kode_produk}}">{{$item->nama_produk}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <button class="btn btn-primary" type="submit" name="simpan">Tambah</button>
            </div>
        </form>
    </div>


</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script>
    $(".theSelect").select2();
</script>
@endsection