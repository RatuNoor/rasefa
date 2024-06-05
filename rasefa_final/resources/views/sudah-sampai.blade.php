@extends('welcome')

@section('content')
    <div class="my-4">
    <h2 class="d-flex align-items-center">
            <i class="fas fa-boxes mr-2"></i> Sudah Sampai
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
            @foreach($barangSudahSampai as $barang)
            <tr>
                <td>{{ $barang->daftar_produk }}</td>
                <td>{{ $barang->nomor_resi }}</td>
                <td>
                    @if($barang->status == 'Sudah Sampai')
                    <form action="{{ route('konfirmasi-barang')}}" method="POST">
                        @csrf
                        <input type="hidden" name="nomor_resi" value="{{ $barang->nomor_resi }}">
                        <input type="submit" value="Sudah Dikonfimasi">
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@endsection
