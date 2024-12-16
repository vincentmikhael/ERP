@extends('admin')
@section('main')
<div class="container mt-4">
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID Produk</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Quantity</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>P001</td>
                <td>Lem Kertas</td>
                <td>20</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>P002</td>
                <td>Selotip</td>
                <td>10</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>P003</td>
                <td>Solasi</td>
                <td>5</td>
              </tr>
        </tbody>
    </table>
</div>
@endsection