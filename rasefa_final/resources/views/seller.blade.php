@extends('app')

@section('content')
    <div class="text-center my-4">
            <i class="fas fa-boxes mr-2"><h2 style="font-family:serif;">Jumlah Toko dan Produk</h2>
            
            </i>
        <hr>
    </div>
    <div class="row">
        <!-- Card Toko -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-store fa-3x mb-3"></i>
                    <h4 class="card-title">Toko</h4>
                    <p class="card-text">{{ $jumlahToko }} Toko Tersedia</p>
                </div>
            </div>
        </div>

        <!-- Card Produk -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-boxes fa-3x mb-3"></i>
                    <h4 class="card-title">Produk</h4>
                    <p class="card-text">{{ $jumlahProduk }} Produk Tersedia</p>
                </div>
            </div>
        </div>
    </div>
@endsection
