@extends('admin')
@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
@endsection
@section('main')
<div class="container">
    <form action="{{ url('product/bom-input-item') }}" method="post" name="input-form" id="input-form">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="kode_bom">kode Bom</label>
            <input type="text" class="form-control" name="kode_bom" id="kode_bom" value="{{$bom->kode_bom}}" readonly>
        </div>
        <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" value="{{$bom->nama_produk}}" disabled>
        </div>
    </form>
</div>
<div class="container-fluid mt-4">
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode</th>
                <th scope="col">Nama Bahan</th>
                <th scope="col">Quantity</th>
                <th scope="col">Satuan</th>
                <th scope="col">Harga Satuan</th>
                <th scope="col">On Hand</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @if($list->count())
            @foreach($list as $item)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$item->kode_bom}}</td>
                <td>{{$item->nama_produk}}</td>
                <td>{{$item->quantity * $mo->quantity}}</td>
                <td>{{$item->satuan}}</td>
                <td>{{$item->harga}}</td>
                <td>{{$item->kuantitas}}</td>
                <td>
                    @if($item->kuantitas < ($item->quantity * $mo->quantity ))
                        <a href="{{ url('sales/rfq') }}" class="btn btn-danger delete-confirm" role="">Bahan Kurang</a>
                        @else
                        <span class="badge badge-success">Tersedia</span>
                        @endif
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    <div class="container-sm ">
        <div class="row"></div>
        <!-- <div class="row mt-auto p-2 bd-highlight">
            <label for="text_harga" class="font-weight-bold"> Total Harga : </label>
            <label for="total_harga" id="val"> XXXXX</label>
        </div> -->
    </div>
    @if($avail == true && $mo->status == 3)
    <form action="{{ url('/product/mo-produce/'.$mo->kode_mo ) }}" method="post" class="btn p-0" name="input-form" id="input-form">
        {{ csrf_field() }}
        <button type="submit" onclick="return confirm('Proses Produce?');" class="btn btn-info">Produce</button>
    </form>
    
    @endif
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script>
    $(".theSelect").select2();
</script>

@endsection