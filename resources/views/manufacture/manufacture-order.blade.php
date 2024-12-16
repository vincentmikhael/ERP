@extends('admin')
@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
@endsection
@section('main')
<div class="container mt-4">
  <form action="{{ url('/product/mo') }}" method="post" name="input-form" id="input-form">
    {{ csrf_field() }}
    <div class="form-group mt-3">
      <label for="kode_produk">ID Manufacture Order</label>
      <input type="text" class="form-control" id="kode_mo" name="kode_mo" required>
    </div>
    <div class="form-group">
      <label for="select_item">Pilih Material</label>
      <div class="dropdown">
        <select class="theSelect" name="kode_bom">
          @if($boms->count())
          @foreach($boms as $item)
          <option value="{{$item->kode_bom}}" data-toggle="">{{$item->kode_bom}} - {{$item->nama_produk}}</option>
          @endforeach
          @endif
        </select>
      </div>
    </div>
    <div class="form-group mt-3">
      <label for="kode_produk">Quantity</label>
      <input type="text" class="form-control" id="quantity" name="quantity" required>
    </div>
    <button type="submit" class="btn btn-info">Add</button>
  </form>

  <table class="table table-bordered mt-3">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">ID Manufacture</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Quantity</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @if($moDatas->count())
      @foreach($moDatas as $item)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$item->kode_mo}}</td>
        @if($item->status == 3)
        <td><a href="{{ url('/product/ca-item/'.$item->kode_mo) }}">{{$item->nama_produk}}</a></td>
        @else
        <td>{{$item->nama_produk}}</td>
        @endif
        <td>{{$item->quantity}}</td>
        <td>
          @if($item->status == 1 )
          <span class="badge badge-secondary">Backlog</span>
          @elseif($item->status == 2)
          <span class="badge badge-primary">Mark as todo</span>
          @elseif($item->status == 3)
          <span class="badge badge-warning">Check avaliability</span>
          @elseif($item->status == 4)
          <span class="badge badge-secondary">Produce</span>
          @elseif($item->status == 5)
          <span class="badge badge-success">Done</span>
          @endif

        </td>
        <td>
          @if($item->status == 1 )
          <form action="/product/mo/update/{{$item->kode_mo}}" method="post">
            @method('put')
            {{ csrf_field() }}
            <button type="submit" onclick="return confirm('Proses Mark as todo?');" class="btn btn-info">Mark as todo</button>
          </form>
          @elseif($item->status == 2)
          <form action="/product/mo/update/{{$item->kode_mo}}" method="post">
            @method('put')
            {{ csrf_field() }}
            <button type="submit" onclick="return confirm('Proses CA?');" class="btn btn-info">Check availability</button>
          </form>
          @elseif($item->status == 3)
          <!-- <button  type="submit" onclick="return confirm('Proses Produce?');" class="btn btn-info">Produce</button> -->
          @elseif($item->status == 4)
          <form action="/product/done/{{$item->kode_mo}}" method="post">
            @method('post')
            {{ csrf_field() }}
            <button type="submit" onclick="return confirm('Sudah selesai?');" class="btn btn-info">Mark as done</button>
          </form>
          @endif
          @if($item->status != 5)
          <button href="#" class="btn btn-danger">Cancel Produce</button>
          @endif
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script>
  $(".theSelect").select2();
</script>
@endsection