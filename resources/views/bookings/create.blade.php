@extends('layouts.app')

@section('content')
<div>
    <h1 class="text-lg font-semibold">Booking PlayStation</h1>
    <p class="mt-1 text-sm text-gray-600">Pilih PS, isi durasi, lalu submit booking.</p>

    <form method="POST" action="{{ route('bookings.store') }}" class="mt-6 space-y-4">
        @csrf

        <div>
            <label for="ps" class="block text-sm font-medium text-gray-700">PlayStation</label>
            <select name="playstation_id" id="ps" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                <option value="">-- Pilih PlayStation --</option>
                @foreach ($playstations as $ps)
                    <option value="{{ $ps->id }}" data-harga="{{ $ps->harga_per_jam }}">
                        {{ $ps->nama }} (Rp {{ number_format($ps->harga_per_jam) }}/jam)
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="durasi" class="block text-sm font-medium text-gray-700">Durasi (Jam)</label>
            <input type="number" id="durasi" name="durasi" min="1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        </div>

        <div>
            <label for="total" class="block text-sm font-medium text-gray-700">Total Harga</label>
            <input type="text" id="total" class="mt-1 block w-full rounded-md border-gray-300 bg-gray-50 shadow-sm" readonly>
            <p class="mt-1 text-xs text-gray-500">Total dihitung otomatis (harga per jam × durasi).</p>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Booking</button>
            <a href="{{ route('bookings.history') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900">Lihat riwayat</a>
        </div>
    </form>
</div>

<script>
const ps = document.getElementById('ps');
const durasi = document.getElementById('durasi');
const total = document.getElementById('total');

function hitung() {
    const harga = ps.options[ps.selectedIndex]?.dataset.harga || 0;
    const durasiValue = Number(durasi.value || 0);
    const hargaValue = Number(harga || 0);
    total.value = (hargaValue * durasiValue).toLocaleString('id-ID');
}

ps.addEventListener('change', hitung);
durasi.addEventListener('input', hitung);
</script>
@endsection
