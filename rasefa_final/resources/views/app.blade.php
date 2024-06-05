<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Seller')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('logorasefa.png') }}" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <!-- Custom CSS (jika ada) -->
    <link rel="stylesheet" href="{{asset('style/main.css')}}"> 
    @stack('styles')
</head>

<body>
    
    <!-- Navbar -->
    <nav class="ml-5 navbar navbar-expand-lg custom-navbar-bg shadow-sm">
        <div class="container-fluid">
            <!-- Logo -->
            <h2 href="{{route('seller')}}" class="ds-logo" style="margin-left:30px">
                <span>R</span>asefa
            </h2> 
            <!-- End Logo -->

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('seller') }}">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('toko.index') }}">Toko</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produk.index') }}">Produk</a>
                    </li>
                    <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="ri-logout-box-r-line"6>Logout</button>
                    </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

<style>
    body {
        font-family: 'Helvetica', sans-serif;
    }
    .ds-logo {
        text-transform: uppercase;
        font-size: 18px;
        letter-spacing: 3px;
        color: #000;
        display: flex;
        align-items: center;
    }

    .ds-logo span {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background-color: #DB7093;
        border-radius: 4px;
        color: #FFF;
        font-size: 22px;
        font-weight: 600;
        text-align: center;
        margin-right: 12px;
    }

    .ds-logo:hover {
        color: #DB7093;
    }
    .button:hover {
        text-decoration: underline;
    }

    .nav-item button{
        color: #DB7093;
        font-family: 'Helvetica', sans-serif;
        background-color: #FFF;
        border: 1px #DB7093;
        border-radius: 3px;
    }

    .nav-item a{
        color: #DB7093;
    }
</style>

    <!-- Konten Utama -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS & Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- Custom JS (jika ada) -->
    @stack('scripts')

</body>
<style>
    .custom-navbar-bg {
        background-color: #fff; /* FFC0CB is the shade of pink you provided */
    }
</style>
</html>
