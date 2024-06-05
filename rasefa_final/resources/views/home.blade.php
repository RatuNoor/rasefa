<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('style/main.css') }}">
    <title>Rasefa</title>
</head>

<body>
    <!-- header -->
    <header class="ds-header" id="site-header">
        <div class="container">
            <div class="ds-header-inner">
                <!-- logo -->
                <a href="index.html" class="ds-logo">
                    <span>R</span>asefa
                </a>
                <!-- logo -->
                <!-- Navigation bar -->
                <ul class="ds-navbar">
                    <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="ri-logout-box-r-line"6>Logout</button>
                    </form>
                    </li>
                    <li><a href="{{ asset('keranjang') }}" target="_blank"><i class="ri-shopping-cart-2-line"></i></a>
                    </li>
                    <li><a href="{{ asset ('akun-myorders')}}"><i class="ri-account-circle-line"></i></a></li>
                </ul>
                <!-- Navigation bar -->
            </div>
        </div>
    </header>

    <!--  Catalogue-->
    <div class="ds-katalog">
        <div class="container">
            <h2 class="ds-heading">Latest Catalogue</h2>
            <div class="ds-katalog-list-section ds-katalog-box">
                @foreach ($produk as $item)
                    <div class="ds-katalog-list">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                {{ $item->kategori_produk }}
                                <h3 class="ds-katalog-tilte">{{ $item->nama_produk }}</h3>
                            </div>
                            <img src="data:image/png;base64,{{ base64_encode($item->gambar_produk) }}"
                                style="max-width: 100px;">
                        </div>

                        <p> Rp.{{ $item->harga_produk }} </p>
                        <a> {{ $item->nama_toko }} </a>
                        <form action="{{ route('addKeranjang') }}" method="POST" class="mt-3">
                            @csrf
                            <input type="hidden" name="id_produk" value="{{ $item->id_produk }}">
                            <input type="hidden" name="id_toko" value="{{ $item->id_toko }}">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="kuantitas" value="0"
                                            min="0" max="{{ $item->stok }}" placeholder="Jumlah">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="ri-shopping-cart-2-fill btn-md"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--  katalog -->

    <!--  footer -->
    <footer class="ds-footer text-center">
        <div class="container">
            <section>
                <span>Stay in touch</span>
                <h4>Ready to talk?</h4>
                <p>Feel free to contact us</p>
                <a href="mailto:test@test.com" class="ds-button">Lets Talk</a>
            </section>
            <span class="ds-copyright">© 2022 All rights reserved. Free minimal bootstrap template by <a
                    href="https://designstub.com/" target="_blank">Designstub</a>.</span>
        </div>
        <script>
            const searchForm = document.querySelector('.search-form');
            const searchInput = document.querySelector('input[name="query"]');

            searchForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const query = searchInput.value;

                // Perform an AJAX request
                fetch(`/search?query=${query}`, {
                        method: 'GET',
                    })
                    .then(response => response.json()) // Assuming the server returns JSON
                    .then(data => {
                        // Handle the response data, e.g., update the search results in the DOM
                        // You can replace the following line with your own logic:
                        console.log(data);
                    })
                    .catch(error => {
                        // Handle errors, e.g., display an error message to the user
                        console.error(error);
                    });
            });
        </script>
    </footer>
</body>

</html>
