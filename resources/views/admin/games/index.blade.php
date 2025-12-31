@extends('admin.layout')

@section('content')
<div class="card shadow">
    <div class="card-header d-flex justify-content-between">
        <h4>Data Game</h4>
        <a href="{{ route('admin.games.create') }}" class="btn btn-primary">+ Tambah Game</a>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Genre</th>
                <th>Harga / Jam</th>
                <th>Aksi</th>
            </tr>

            @foreach ($games as $game)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $game->nama }}</td>
                <td>{{ $game->genre }}</td>
                <td>Rp {{ number_format($game->harga_per_jam) }}</td>
                <td>
                    <a href="{{ route('admin.games.edit',$game->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.games.destroy',$game->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
