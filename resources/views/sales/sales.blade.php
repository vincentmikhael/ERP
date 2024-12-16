@extends('admin')
@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
@endsection
@section('main')
<div class="container">
    <form action="{{ url('sales/list') }}" method="post" name="input-form" id="input-form">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="kode_bom">Kode Sales</label>
            <input type="text" class="form-control" name="kode_sales" id="kode_sales" value="{{$sales->kode_sales}}" readonly>
        </div>
        <div class="form-group mt-3">
            <label for="customer">Customer</label>
            <input type="text" class="form-control" id="customer" value="{{$sales->nama.' - '.$sales->alamat}}" name="customer" readonly>
        </div>
        @if($sales->status == 0)
        <div class="form-group">
            <label for="select_item">Pilih Produk</label>
            <div class="dropdown">
                <select class="theSelect" name="kode_produk">
                    @if($products->count())
                    @foreach($products as $item)
                    <option value="{{$item->kode_produk}}" data-toggle="">{{$item->nama_produk}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="row col-12">
            <div class="form-group">
                <label for="quantity_material">Quantity</label>
                <input type="number" class="form-control" name="quantity" id="quantity"  required>
                <input type="text" class="form-control" name="satuan" value="etc" id="satuan" hidden>
            </div>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Add Produk</button>
        @endif
    </form>
</div>
<div class="container-fluid mt-4">
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode</th>
                <th scope="col">Nama</th>
                <th scope="col">Quantity</th>
                <th scope="col">Satuan</th>
                <th scope="col">Harga</th>
                <th scope="col">Sub Total</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($salesList->count())
            @foreach($salesList as $item)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$item->kode_produk}}</td>
                <td>{{$item->nama_produk}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->satuan}}</td>
                <td>{{$item->harga}}</td>
                @php
                {{
                    $total = $item->harga * $item->quantity;
                }}
                @endphp
                <td>{{$total}}</td>
                @if($sales->status == 0)
                <td>
                    <a href="{{ url('product/bom-delete-item/'.$item->kode_bom_list) }}" class="btn btn-danger delete-confirm" role="button">Hapus</a>
                </td>
                @else
                <td>
                </td>
                @endif
            </tr>
            @endforeach
            @endif
        </tbody>
        </tbody>

    </table>
    <div class="container-sm ">
        <div class="row"></div>
        <div class="row mt-auto p-2 bd-highlight">
            <label for="text_harga" class="font-weight-bold"> Total Harga : </label>
            <label for="total_harga" id="val"> XXXXX</label>
        </div>
    </div>
    @if($sales->status == 0)
    <a href="{{ url('sales/save/'.$sales->kode_sales) }}" class="btn btn-primary">Make Order</a>
    @elseif($sales->status == 1)
    <a href="{{ url('sales/ca-item/'.$sales->kode_sales) }}" class="btn btn-warning">Check Availability</a>
    @endif
</div>
@endsection
@section('script')
<script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js">
</script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js">
</script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js">
</script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script>
    $(".theSelect").select2();
</script>
<script>
    updateSubTotal(); // Initial call

    function updateSubTotal() {
        var table = document.getElementById("myTable");
        let subTotal = Array.from(table.rows).slice(1).reduce((total, row) => {
            return total + parseFloat(row.cells[6].innerHTML);
        }, 0);
        document.getElementById("val").innerHTML = "Rp." + subTotal;
    }
</script>
@endsection