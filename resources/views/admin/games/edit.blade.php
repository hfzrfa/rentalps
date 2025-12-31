@extends('admin.layout')

@section('content')
<div class="card shadow">
    <div class="card-header"><h4>Edit Game</h4></div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.games.update',$game->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Game</label>
                <input type="text" name="nama" value="{{ $game->nama }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Genre</label>
                <input type="text" name="genre" value="{{ $game->genre }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Harga per Jam</label>
                <input type="number" name="harga_per_jam" value="{{ $game->harga_per_jam }}" class="form-control">
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.games.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
