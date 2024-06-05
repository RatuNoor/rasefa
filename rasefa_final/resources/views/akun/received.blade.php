<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Rasefa</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../style/user-setting.css"> 
  <link rel="stylesheet" href="{{asset('style/account.css')}}"> 
  <link rel="stylesheet" href="{{ asset('style/main.css') }}">
  <!-- Remixicon Icon -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Remixicon Icon -->
</head>

<body>
    <!-- partial:../../partials/_navbar.html -->
      <!-- header -->
      <header class="ds-header" id="site-header">   
        <div class="container">
            <div class="ds-header-inner">
              <!-- logo -->
              <a href="{{asset('/home')}}" class="ds-logo">
                <span>R</span>asefa
              </a>
              <!-- logo -->
              <ul class="ds-navbar">
                    <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="ri-logout-box-r-line"6>Logout</button>
                    </form>
                  </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="{{asset('akun-myorders')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">My Orders</span>
            </a>
          </li>
        </ul>
      </nav>

      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">  
            <div class="col-12 grid-margin stretch-card">
                <ul class="nav flex-row">
                    <li class="nav-item"><a class="nav-link" href="{{asset('akun-myorders')}}">Process</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{asset('shipped')}}">Shipped</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{asset('received')}}">Received</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{asset('completed')}}">Completed</a></li>
                </ul>
            </div>
            <!-- Orderan -->
            @foreach($barangReceived as $order)
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <i class="fa-light fa-store" style="color: #e15692;"></i>
                  <h3 class="card-title">{{$order -> nama_toko}}</h3>
                    <p class="card-description">
                        Pesanan telah sampai alamat tujuan
                    </p>
                    <p> Nomor resi: {{$order -> nomor_resi}}
                    <div class="product-details">
                    <?php
                      $gambar_base64 = base64_encode($order->gambar_produk);
                    ?>
                    <figure><img src="data:image/png;base64,{{$gambar_base64}}"></figure>
                        <div>
                            <div class="product-info">
                                <p>{{$order -> nama_produk}}</p>
                                <p>Jumlah: {{$order -> jumlah_pesanan_produk}}</p>
                            </div>
                            <div class="product-info">
                                <p>Harga per Produk: Rp{{$order -> harga_produk}}</p>
                                <p>Total Order: Rp{{$order -> total_harga}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Tambahkan form untuk "Pesanan Batal" -->
                    @if($order->status == "Sudah Sampai")
                        <form action="{{ route('konfirmasi-barang') }}" method="POST">
                        @csrf
                              <input type="hidden" name="nomor_resi" value="{{ $order->nomor_resi }}">
                              <button type="submit" class="btn btn-inverse-secondary btn-fw">Order Received</button>
                        </form>
                    @endif                           
                </div>
              </div>
            </div>
            <!-- Orderan -->
            @endforeach         
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->

  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
  <script src="../../js/script.js"></script>
</body>

</html>