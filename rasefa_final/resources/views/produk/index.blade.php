@extends('app')

@section('content')
    <div class="my-4">
        <h2 class="d-flex align-items-center">
            <i class="fas fa-boxes mr-2"></i> Halaman Produk
        </h2>
        <hr>

        <!-- Tombol Tambah Produk di atas kanan -->
        <div class="mb-3 d-flex justify-content-end">
            <a href="{{ route('produk.create') }}" class="btn btn-light">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th style="width: 80px;" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produk as $index => $product)
                    <tr>
                        <td>{{ $product->id_produk }}</td>
                        <td>{{ $product->nama_produk }}</td>
                        <td>{{ $product->kategori_produk }}</td>
                        <td>{{ $product->harga_produk }}</td>
                        <td>{{ $product->stok }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('produk.edit', $product->id_produk) }}" class="btn btn-sm btn-warning"
                                    title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                &nbsp;
                                <form action="{{ route('produk.destroy', $product->id_produk) }}" method="post"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
