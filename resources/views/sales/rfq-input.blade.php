@extends('admin')
@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
@endsection
@section('main')
<div class="container-fluid">
    <div class="row">
        <h1 class="h3 mb-4 text-gray-800 col-md-12">Add Quotation</h1>
        <form action="{{ url('sales/rfq') }}" method="post" name="input-form" id="input-form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div>
                <div class="form-group">
                    <label for="nama_product">ID RFQ</label>
                    <input type="text" class="form-control" id="kode_rfq" name="kode_rfq" required>
                </div>
                <div class="form-group">
                    <label for="select_item">Pilih Vendor</label>
                    <br>
                    <select class="theSelect" name="kode_vendor">
                        @if($vendors->count())
                        @foreach($vendors as $item)
                        <option value="{{$item->kode}}">{{$item->nama}}</option>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#datetimepickerDemo').datetimepicker({
            minDate: new Date()
        });
    });
</script>
<script>
    $(".theSelect").select2();
</script>

@endsection