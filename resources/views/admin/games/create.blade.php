@extends('admin.layout')

@section('content')
<div class="card shadow">
    <div class="card-header"><h4>Tambah Game</h4></div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.games.store') }}">
            @csrf

            <div class="mb-3">
                <label>Nama Game</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Genre</label>
                <input type="text" name="genre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Harga per Jam</label>
                <input type="number" name="harga_per_jam" class="form-control" required>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.games.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
