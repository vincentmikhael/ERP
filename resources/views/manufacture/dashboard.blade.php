@extends('admin')
@section('main')
<h1 class="text-center">ERP DIMSUM</h1>
<br><br>
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">
                            Product</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xl font-weight-bold text-success text-uppercase mb-1">
                            Earnings / Month</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xl font-weight-bold text-info text-uppercase mb-1">In Order
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-lg font-weight-bold text-warning text-uppercase mb-1">
                            Customers</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">50</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-lg-4 mb-4">
        <div class="card bg-primary text-white shadow">
            <div class="card-body">
                Product Table <br>
                <a href="/product" class="text-white-50 small">Detail</a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-4">
        <div class="card bg-success text-white shadow">
            <div class="card-body">
                Material Table <br>
                <a href="/material" class="text-white-50 small">Detail</a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-4">
        <div class="card bg-info text-white shadow">
            <div class="card-body">
                Purchasing Page <br>
                <a href="/sales/all-rfq" class="text-white-50 small">Detail</a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-4">
        <div class="card bg-warning text-white shadow">
            <div class="card-body">
                Sales Page <br>
                <a href="/sales/all" class="text-white-50 small">Detail</a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-4">
        <div class="card bg-danger text-white shadow">
            <div class="card-body">
                Vendor / Customer Page <br>
                <a href="/sales/vendor-input" class="text-white-50 small">Detail</a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-4">
        <div class="card bg-secondary text-white shadow">
            <div class="card-body">
                Bill of Materials Table <br>
                <a href="/product/bom" class="text-white-50 small">#858796</a>
            </div>
        </div>
    </div>
</div>
@endsection