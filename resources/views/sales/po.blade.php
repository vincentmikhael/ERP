@extends('admin')
@section('main')
<div class="container mt-4">
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Konsumen</th>
                <th scope="col">ID Pembelian</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Quantity</th>
                <th scope="col">Harga</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Najib</td>
                <td>P001</td>
                <td>Lem Kertas</td>
                <td>20</td>
                <td>40000</td>
                <td>Noting To Bill</td>
                <td>
                    <a href="#" class="btn btn-info">Recieve Product</a>
                    <a href="#" class="btn btn-info">Validate</a>
                    <a href="#" class="btn btn-info">Bill</a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Bayu</td>
                <td>P002</td>
                <td>Selotip</td>
                <td>10</td>
                <td>30000</td>
                <td>Noting to Bill</td>
               <td>
                <a href="#" class="btn btn-info">Recieve Product</a>
                <a href="#" class="btn btn-info">Validate</a>
                <a href="#" class="btn btn-info">Bill</a>
               </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Adit</td>
                <td>P003</td>
                <td>Solasi</td>
                <td>5</td>
                <td>20000</td>
                <td>Nothing to bill</td>
               <td>
                <a href="#" class="btn btn-info">Recieve Product</a>
                <a href="#" class="btn btn-info">Validate</a>
                <a href="#" class="btn btn-info">Bill</a>
               </td>
              </tr>
        </tbody>
    </table>
</div>
@endsection