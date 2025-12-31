@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-lg font-semibold">Tambah PlayStation</h1>
        <p class="mt-1 text-sm text-gray-600">Tambahkan unit PS baru.</p>
    </div>

    <form method="POST" action="{{ route('admin.playstations.store') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700" for="nama">Nama</label>
            <input id="nama" type="text" name="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700" for="harga_per_jam">Harga per Jam</label>
            <input id="harga_per_jam" type="number" name="harga_per_jam" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700">Simpan</button>
            <a href="{{ route('admin.playstations.index') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900">Kembali</a>
        </div>
    </form>
</div>
@endsection
