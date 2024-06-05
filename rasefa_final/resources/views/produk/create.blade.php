@extends('app')

@section('content')
    <div class="my-4">
        <h2 class="d-flex align-items-center">
            <i class="fas fa-boxes mr-2"></i> Tambah Produk
        </h2>
        <hr>

        <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="id_toko">Nama Toko</label>
                <select name="id_toko" id="id_toko" class="form-control" required>
                    <option value="">-- Pilih Toko --</option>
                    @foreach ($tokos as $toko)
                        <option value="{{ $toko->id_toko }}">{{ $toko->nama_toko }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" name="nama_produk" id="nama_produk" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="kategori_produk">Kategori</label>
                <input type="text" name="kategori_produk" id="kategori_produk" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="harga_produk">Harga Produk</label>
                <input type="number" name="harga_produk" id="harga_produk" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="stok">Stok</label>
                <input type="number" name="stok" id="stok" class="form-control" min="1" required>
            </div>

            <div class="form-group mb-3">
                <label for="gambar_produk">Media (Gambar atau Video MP4)</label>
                <input type="file" name="gambar_produk" id="gambar_produk" class="form-control" accept=".png, .jpg, .jpeg, .mp4"
                    required>
            </div>

            <button type="submit" class="btn btn-light">Tambahkan Produk</button>
        </form>
    </div>
@endsection
