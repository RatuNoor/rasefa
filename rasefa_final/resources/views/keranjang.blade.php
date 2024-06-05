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

    <style>
        html,
        body {
            height: 100vh;
            /* 100% dari tinggi viewport */
            margin: 0;
            /* Menghapus margin default dari body */
            padding: 0;
            /* Menghapus padding default dari body */
        }
    </style>
</head>

<body>
    <!-- header -->
    <header class="ds-header" id="site-header">
        <div class="container">
            <div class="ds-header-inner">
                <!-- logo -->
                <a href="{{ url('/home') }}" class="ds-logo">
                    <span>R</span>asefa
                </a>
                <!-- logo -->
                <!-- Navigation bar -->
                <ul class="ds-navbar">
                    <li>
                        <form action="/search" method="GET" class="search-form">
                            <input type="text" name="query" placeholder="Cari produk...">
                            <button type="submit"><i class="ri-search-line"></i></button>
                        </form>
                    </li>
                    <li><a href="{{ asset('keranjang') }}" target="_blank"><i class="ri-shopping-cart-2-line"></i></a>
                    </li>
                    <li><a href="account"><i class="ri-account-circle-line"></i></a></li>
                </ul>
                <!-- Navigation bar -->
            </div>
        </div>
    </header>

    <!--  Catalogue-->
    <div class="ds-katalog mb-5">
        <div class="container">
            <h2 class="ds-heading">Keranjang</h2>


            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Toko</th>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Kuantitas</th>
                            <th>Sub-Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($groupedKeranjang as $idToko => $keranjangItems)
                        @foreach ($keranjangItems as $index => $item)
                            <tr>
                                @if ($index == 0)
                                    @php
                                        $toko = $item->toko;
                                    @endphp
                                    <td class="align-middle">{{ optional($toko)->nama_toko }}</td>
                                @endif
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->produk->nama_produk }}</td>
                                <td>{{ number_format($item->produk->harga_produk) }}</td>
                                <td>{{ $item->kuantitas }}</td>
                                <td>Rp. {{ number_format($item->kuantitas * $item->produk->harga_produk) }}</td>
                            </tr>
                        @endforeach
                    @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-end"><strong>Total:</strong></td>
                            <td>
                                <strong>Rp.
                                    {{ number_format(
                                        $groupedKeranjang->sum(function ($keranjangItems) {
                                            return $keranjangItems->sum(function ($item) {
                                                return $item->kuantitas * $item->produk->harga_produk;
                                            });
                                        }),
                                    ) }}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" class="text-end">
                                <!-- Trigger Modal Button -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#checkoutModal">
                                    Checkout
                                </button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
    <!-- Checkout Modal -->
    <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkoutModalLabel">Checkout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_telfon" class="form-label">No. Telefon</label>
                            <input type="tel" class="form-control" id="no_telfon" name="no_telfon" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_rekening" class="form-label">No. Rekening</label>
                            <input type="text" class="form-control" id="no_rekening" name="no_rekening" required>
                        </div>
                        <div class="mb-3">
                            <label for="atas_nama" class="form-label">Atas Nama</label>
                            <input type="text" class="form-control" id="atas_nama" name="atas_nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                            <select class="form-select" id="metode_pembayaran" name="metode_pembayaran" required>
                                <option value="transfer_bank">Transfer Bank</option>
                                <option value="kartu_kredit">Kartu Kredit</option>
                                <option value="e_wallet">E-Wallet</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="opsi_pengiriman" class="form-label">Opsi Pengiriman</label>
                            <select class="form-select" id="opsi_pengiriman" name="opsi_pengiriman" required>
                                <option value="jne">JNE</option>
                                <option value="jnt">JNT</option>
                                <option value="rasefa_delivery">Rasefa Delivery</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--  footer -->
    <footer class="ds-footer text-center pt-0" style="padding-bottom: 35px;">
        <div class="container">
            <section class="p-0">
                <span class="p-0 pt-3">Stay in touch</span>
                <h4>Ready to talk?</h4>
                <p>
                    Feel free to contact us<br>
                    <a href="mailto:test@test.com" class="text-white">Lets Talk</a>
                </p>
            </section>
            <span class="ds-copyright">© 2022 All rights reserved. Free minimal bootstrap template by <a
                    href="https://designstub.com/" target="_blank">Designstub</a>.</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

</body>

</html>
