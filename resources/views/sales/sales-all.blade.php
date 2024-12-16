@extends('admin')
@section('head')
<link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('main')
<div class="container-fluid">
    <table class="table" id="myTable" name="myTable">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Customer</th>
                <th scope="col">Tanggal Transaksi</th>
                <th scope="col">Status</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Metode Pembayaran</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($sales->count())
            @foreach($sales as $item)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$item->nama}}</td>
                <td>{{$item->tanggal_transaksi}}</td>
                <td> @if($item->status == 0 )
                    <span class="badge badge-secondary">Cart</span>
                    @elseif($item->status == 1)
                    <span class="badge badge-primary">Order</span>
                    @elseif($item->status == 2)
                    <span class="badge badge-warning">Waiting to Bill</span>
                    @elseif($item->status == 3)
                    <span class="badge badge-secondary">Dones</span>
                    @endif
                </td>
                <td>{{$item->total_harga}}</td>
                <td> @if($item->metode_pembayaran == 1 )
                    <span class="badge badge-primary">Cash</span>
                    @elseif($item->metode_pembayaran == 2)
                    <span class="badge badge-primary">Transfer</span>
                    @endif
                </td>
                <td>
                    @if($item->status < 2)
                    <a href="{{ url('/sales/input/'.$item->kode_sales) }}" class="btn btn-warning" role="button"><i class="fas fa-edit"></i></a>
                    @elseif($item->status == 2)
                    <a href="{{ url('/sales/ca-item/'.$item->kode_sales) }}" class="btn btn-warning" role="button">Make Payment</a>
                    @endif
                    <form action="/delete-item/{{ $item->kode_produk }}" method="post">
                        @method('delete')
                        {{ csrf_field() }}
                        <button type="submit" onclick="return confirm('Yakin hapus Lem '+'{{$item->nama_produk}}?');" class="btn btn-danger delete-confirm my-1">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                    <!-- <a href="" class="btn btn-danger delete-confirm" role="button">Hapus</a> -->
                    <a href="/item/pdf" class="btn btn-info" role="button"><i class="fas fa-print"></i></a>
                </td>
            </tr>

            @endforeach
            @else
            <tr>
                <td colspan="7"> No record found </td>
            </tr>
            @endif
        </tbody>
    </table>
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
@endsection