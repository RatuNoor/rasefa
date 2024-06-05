@extends('app')

@section('content')
    <div class="my-4">
        <h2 class="d-flex align-items-center">
            <i class="fas fa-store mr-2"></i> Halaman Toko
        </h2>
        <hr>

        <!-- Tombol Tambah Toko di atas kanan -->
        <div class="mb-3 d-flex justify-content-end">
            <a href="{{ route('toko.create') }}" class="btn btn-light">
                <i class="fas fa-plus"></i> Tambah Toko
            </a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Toko</th>
                    <th>Alamat Toko</th>
                    <th style="width: 80px;" clas="text-center">Aksi</th> <!-- Menyesuaikan lebar kolom -->
                </tr>
            </thead>
            <tbody>
                @forelse ($tokos as $index => $toko)
                    <tr>
                        <td>{{ $toko->id_toko }}</td>
                        <td>{{ $toko->nama_toko }}</td>
                        <td>{{ $toko->alamat_toko }}</td>
                        <td class="text-center">
                            <div class="btn-group">

                                <a href="{{ route('toko.edit', $toko->id_toko) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                &nbsp;
                                <form action="{{ route('toko.destroy', $toko->id_toko) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus toko ini?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data toko.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
