@extends('welcome')

@section('content')
    <div class="my-4">
        <h2 class="d-flex align-items-center">
            <i class="fas fa-boxes mr-2"></i> Perlu Dikirim
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
                @foreach($barangPerluDikirim as $barang)
                <tr>
                    <td>{{ $barang->daftar_produk }}</td>
                    <td>{{ $barang->nomor_resi }}</td>
                    <td>
                        @if($barang->status == "Belum Dikirim")
                        <form action="{{ route('kirim-barang') }}" method="POST">
                            @csrf
                            <input type="hidden" name="nomor_resi" value="{{ $barang->nomor_resi }}">
                            <button type="submit" class="btn btn-primary">Sudah Dikirim</button>
                        </form>
                        @endif

                        <!-- Tambahkan form untuk "Pesanan Batal" -->
                        @if($barang->status == "Belum Dikirim")
                        <form action="{{ route('pesanan-batal') }}" method="POST">
                            @csrf
                            <input type="hidden" name="nomor_resi" value="{{ $barang->nomor_resi }}">
                            <button type="submit" class="btn btn-danger">Pesanan Batal</button>
                        </form>
                        <form action="{{ route('edit-nomor-resi') }}" method="POST">
                            @csrf
                            <input type="hidden" name="nomor_resi" value="{{ $barang->nomor_resi }}">
                            <div class="input-group">
                                <input type="text" name="new_nomor_resi" class="form-control" placeholder="Nomor Resi Baru" required>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                            </div>
                        </form>

                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
