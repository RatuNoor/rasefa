@extends('app')

@section('content')
    <div class="my-4">
        <h2 class="d-flex align-items-center">
            <i class="fas fa-store mr-2"></i> Edit Toko
        </h2>
        <hr>

        <form action="{{ route('toko.update', $toko->id_toko) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="nama_toko">Nama Toko</label>
                <input type="text" name="nama_toko" id="nama_toko" class="form-control" value="{{ $toko->nama_toko }}"
                    required>
            </div>

            <div class="form-group mb-3">
                <label for="alamat_toko">Alamat Toko</label>
                <textarea name="alamat_toko" id="alamat_toko" class="form-control" rows="4" required>{{ $toko->alamat_toko }}</textarea>
            </div>

            <button type="submit" class="btn btn-light">Update Toko</button>
        </form>
    </div>
@endsection
