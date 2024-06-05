@extends('welcome')

@section('content')
    <div class="my-4">
    <h2 class="d-flex align-items-center">
            <i class="fas fa-boxes mr-2"></i> Sudah Selesai
        </h2>
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>List Barang</th>
                    <th>Nomor Resi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($barangSudahSelesai as $barang)
            <tr>
                <td>{{ $barang->daftar_produk }}</td>
                <td>{{ $barang->nomor_resi }}</td>
                <td>{{ $barang->status }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@endsection
