@extends('layouts.app')

@section('content')
<div>
    <h1 class="text-lg font-semibold">Riwayat Booking</h1>

    <div class="mt-6 overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">PS</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Durasi</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Total</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse ($bookings as $b)
                    <tr>
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $b->playstation->nama }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $b->durasi }} jam</td>
                        <td class="px-4 py-3 text-sm text-gray-700">Rp {{ number_format($b->total_harga) }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $b->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-sm text-gray-500">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
