<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ERP Dimsum</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{ asset('template/css/sb-admin-2.min.css') }}">
    @yield('head')
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="position: fixed; top: 0; width: 100%; z-index: 100;">
        <a class="navbar-brand" href="index.html">
          <img src="/gambar/logo.png" style="width: 40px;" alt="">
          DIMSUM
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link active" href="/">
                <i class="fas fa-fw fa-tachometer-alt"></i> Dashboard
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownProduk" role="button" data-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i> Produk
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownProduk">
                <a class="dropdown-item" href="/product">All Produk</a>
                <a class="dropdown-item" href="/product/input-product">Input Produk</a>
                <a class="dropdown-item" href="/product/mo">Manufacture Order</a>
              </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMaterial" role="button" data-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-fw fa-folder"></i> Material
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMaterial">
                  <a class="dropdown-item" href="/material">All Material</a>
                  <a class="dropdown-item" href="/material/input-material">Input Material</a>
                </div>
              </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownPurchasing" role="button" data-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i> Purchasing
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownPurchasing">
                <a class="dropdown-item" href="/sales/all-rfq">All Purchase</a>
                <a class="dropdown-item" href="/sales/rfq">RFQ</a>
                <a class="dropdown-item" href="/sales/vendor-input">Vendor</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownSales" role="button" data-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i> Sales
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownSales">
                <a class="dropdown-item" href="/sales/all">All Sales</a>
                <a class="dropdown-item" href="/sales/input">Sales Quotation</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="/sales/vendor-input">
                <i class="fas fa-fw fa-folder"></i> Stakeholder
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownBom" role="button" data-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-fw fa-list"></i> Bill of Materials
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownBom">
                <a class="dropdown-item" href="/product/bom">Bom List</a>
                <a class="dropdown-item" href="/product/bom-input">Insert Bom</a>
              </div>
            </li>
            {{-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownInventory" role="button" data-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-fw fa-list"></i> Inventory
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownInventory">
                <a class="dropdown-item" href="/inventory/inventory">Inventory List</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAccounting" role="button" data-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-fw fa-list"></i> Accounting
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownAccounting">
                <a class="dropdown-item" href="/accounting/accounting">Accounting</a>
              </div>
            </li> --}}
          </ul>
    
        </div>
      </nav>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                {{-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="{{ asset('template/img/undraw_profile_1.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav> --}}
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <br><br><br> <br><br>
                    <div class="card shadow-sm p-1 p-md-3">
                        @yield('main')
                    </div>
                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <br><br><br>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Vincent</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="{{ asset('template/css/sb-admin-2.min.css') }}">

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"> </script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"> </script>


    <!-- Core plugin JavaScript-->
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"> </script>


    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template/js/sb-admin-2.min.js') }}"> </script>

    <!-- Page level plugins -->
    <script src="{{ asset('template/vendor/chart.js/Chart.min.js') }}"> </script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('template/js/demo/chart-area-demo.js') }}"> </script>
    <script src="{{ asset('template/js/demo/chart-pie-demo.js') }}"> </script>
    @yield('script')
</body>

</html>