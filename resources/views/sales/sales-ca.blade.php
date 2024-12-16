@extends('admin')
@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
@endsection
@section('main')
<div class="container">
    <form action="{{ url('product/sales-input-item') }}" method="post" name="input-form" id="input-form">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="kode_bom">kode Sales</label>
            <input type="text" class="form-control" name="kode_sales" id="kode_sales" value="{{$sales->kode_sales}}" readonly>
        </div>
        <div class="form-group">
            <label for="nama_customer">Nama Customer</label>
            <input type="text" class="form-control" id="nama_customer" value="{{$sales->nama}}" disabled>
        </div>
        <div class="form-group">
            <label for="nama_customer">Alamat Customer</label>
            <input type="text" class="form-control" id="nama_customer" value="{{$sales->alamat}}" disabled>
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
                <td>{{$item->kode_produk}}</td>
                <td>{{$item->nama_produk}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->satuan}}</td>
                <td>{{$item->harga}}</td>
                <td>{{$item->kuantitas}}</td>
                <td>
                    @if($item->kuantitas < ($item->quantity))
                        <a href="{{ url('product/mo') }}" class="btn btn-danger delete-confirm" role="">Produk Kurang</a>
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
    @if($avail == true && $sales->status == 1)
    <form action="{{ url('/sales/create-bill')}}" method="post" class="" name="input-form" id="input-form">
        {{ csrf_field() }}
        <label>Pilih Pembayaran :</label>
        <div class="form-group">
            <input class="form-control-radio" type="radio" name="metode_pembayaran" id="flexRadioDefault1" value="1" checked>
            <label class="form-check-label" for="flexRadioDefault1">
                Cash
            </label>
        </div>
        <div class="form-group">
            <input class="form-control-radio" type="radio" name="metode_pembayaran" value="2" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2">
                Transfer
            </label>
        </div>
        <input type="text" id="kode_sales" value="{{$sales->kode_sales}}" name="kode_sales" hidden>
        <button type="submit" onclick="return confirm('Place Order?');" class="btn btn-info">Place Order</button>
    </form>
    @elseif($avail == true && $sales->status == 2)
    <label>Metode Pembayaran :
        {{$sales->metode_pembayaran == 1 ? 'Cash' : 'Transfer'}}
    </label><br>
    <label>Total Tagihan : Rp.
        {{$sales->total_harga}}
    </label><br>
    <form action="{{ url('/sales/confirm-bill')}}" method="post" class="" name="input-form" id="input-form">
        {{ csrf_field() }}
        <input type="text" id="kode_sales" value="{{$sales->kode_sales}}" name="kode_sales" hidden>
        <button class="btn btn-primary">Cetak</button>
        <button type="submit" onclick="return confirm('Finish Payment?');" class="btn btn-success">Finish Payment</button>
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