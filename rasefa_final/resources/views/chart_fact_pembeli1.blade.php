<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- Google Fots -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Remixicon Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Remixicon Icon -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('style/main.css') }}">
    <title>eda</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
 <!-- header -->
 <header class="ds-header" id="site-header">
        <div class="container">
            <div class="ds-header-inner">
                <!-- logo -->
                <a href="{{asset('pilihfact')}}" class="ds-logo">
                    <span>R</span>asefa
                </a>
                <!-- logo -->
                <!-- Navigation bar -->
                <ul class="ds-navbar">
                    <div style="position: relative; margin: 10px;">
                            <div class="btn-toolbar position-relative top-0 start-50 translate-middle-x" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group" role="group" aria-label="First group">
                                    <a href="{{ asset('factpembeli1') }}" class="btn btn-pink">Total Harga Per-Bulan</a>
                                    <a href="{{ asset('factpembeli2') }}" class="btn btn-pink">Total Pembelian Tiap Kuartal</a>
                                    <a href="{{ asset('factpembeli3') }}" class="btn btn-pink">Jumlah Pesanan Produk Per-Bulan</a>
                                    <a href="{{ asset('factpembeli4') }}" class="btn btn-pink">Total Harga Pembelian Per-Kuartal</a>
                                </div>
                            </div>
                    </div>
                    <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="ri-logout-box-r-line"6>Logout</button>
                    </form>
                </ul>
                <!-- Navigation bar -->
                
            </div>
            <br>
            <h2 class="ds-headingeda">eda Pembelian Charts</h2>
        </div>
    </header>
   
    <div class="ds-katalog">
    <div class="container">
            <div class="col-8 col-sm-8 col-md-12 col-lg-12 col-s-12 col-m-12">
                <div class="p-6 m-20 bg-white rounded shadow">
                    {!! $chart->container() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and other JS dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua/CUqYq21n7p3tT6kCHJ62xFYl2p8axOp7Hh/nU+ETLCCEkKHDn/pq7e" crossorigin="anonymous"></script>


<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}
</body>
</html>