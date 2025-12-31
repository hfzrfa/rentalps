@extends('layouts.app')

@section('content')
<div class="space-y-4">
    <div>
        <h1 class="text-lg font-semibold">Laporan Pendapatan</h1>
        <p class="mt-1 text-sm text-gray-600">Ringkasan pendapatan dari booking.</p>
    </div>

    <div class="rounded-md bg-gray-50 p-4">
        <p class="text-sm text-gray-600">Total Pendapatan</p>
        <p class="mt-1 text-2xl font-semibold text-gray-900">Rp {{ number_format($total) }}</p>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">User</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">PS</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Total</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse ($bookings as $b)
                    <tr>
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $b->user->name }}</td>
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $b->playstation->nama }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">Rp {{ number_format($b->total_harga) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-6 text-sm text-gray-500">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
