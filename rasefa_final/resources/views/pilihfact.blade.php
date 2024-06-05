<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('style/main.css')}}">
    <!-- Remixicon Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Remixicon Icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('logorasefa.png') }}" />
    <style>
        /* body {
            font-family: 'Sans', Serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        } */
        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        .form-group {
            margin: 10px 0;
            text-align: center;
        }
        .form-group button {
            background-color: #DB7093;
            color: #FFFFFF;
            border: none;
            padding: 10px;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 5px;
            display: inline-block;
            width: 150px; 
            height: 40px;
        }
    </style>
</head>
<body>
    <div class="ds-header-inner">
        <h2 href="{{asset('pilihfact')}}" class="ds-logo">
            <span>R</span>asefa
        </h2>
        <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="ri-logout-box-r-line"6>Logout</button>
                    </form>
    </div>
    <div class="ds-katalog">
        <div class="container">
        <h2 class="ds-heading">Pilih Chart Fact:</h2>
        <div class="ds-katalog-list-section ds-register-box">
        <div class="ds-register-list">
            <div class="row">
            <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7">
            <i class="ri-shopping-basket-fill"></i>
            <a href="{{asset('factpembeli1')}}" class="ds-button tambah-ke-keranjang-button">Chart Fact Pembeli</a>
            </div>
            </div>
        </div>
        <div class="ds-register-list">
            <div class="row">
            <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7">
            <i class="ri-store-3-line"></i>
            <a href="{{asset('penjualantoko-chart')}}" class="ds-button tambah-ke-keranjang-button">Chart Fact Penjualan</a>
            </div>
            </div>
        </div>
        <div class="ds-register-list">
            <div class="row">
            <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7">
            <i class="ri-truck-line"></i>
            <a href="{{asset('chartlogistik')}}" class="ds-button tambah-ke-keranjang-button">Chart Fact Pengiriman</a>
            </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>