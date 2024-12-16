@extends('admin')
@section('main')
<div class="p-5 mb-5 bg-white rounded">
    <button type="button" class="btn btn-primary d-flex justify-content-end mb-5">Print</button>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Vendor</th>
            <th scope="col">Nama</th>
            <th scope="col">Total</th>
            <th scope="col">Tanggal</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>R001</td>
            <td>Najib</td>
            <td>150000</td>
            <td>22/12/2022</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>R002</td>
            <td>Bayu</td>
            <td>200000</td>
            <td>12/12/2022</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td >R003</td>
            <td >Adit</td>
            <td>240000</td>
            <td>11/11/2022</td>
          </tr>
        </tbody>
      </table>
</div>
@endsection
@section('script')
<script>
    $(".input-form").submit(function(e) {
        e.preventDefault();
    });
</script>
@endsection