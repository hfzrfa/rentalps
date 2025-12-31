@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Laporan Booking</h2>
@endsection

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-lg font-semibold">Laporan Booking Selesai</h1>
        <p class="mt-1 text-sm text-gray-600">Filter berdasarkan rentang tanggal.</p>
    </div>

    <form method="GET" class="grid grid-cols-1 gap-4 sm:grid-cols-3">
        <div>
            <label class="block text-sm font-medium text-gray-700" for="from">Dari</label>
            <input id="from" type="date" name="from" value="{{ request('from') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700" for="to">Sampai</label>
            <input id="to" type="date" name="to" value="{{ request('to') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <div class="flex items-end gap-3">
            <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700">Filter</button>
            <a href="{{ route('admin.reports.bookings') }}" class="inline-flex items-center rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Reset</a>
        </div>
    </form>

    <div class="rounded-md bg-green-50 p-4 text-green-700">
        <div class="flex flex-col gap-1 sm:flex-row sm:items-baseline sm:justify-between">
            <p class="text-sm">Total Booking Berhasil</p>
            <p class="text-sm font-semibold">{{ number_format($totalBookings ?? $bookings->count()) }} booking</p>
        </div>
        <p class="mt-2 text-sm">Total Pendapatan</p>
        <p class="mt-1 text-2xl font-semibold">Rp {{ number_format($total) }}</p>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">No</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">User</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">PlayStation</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Durasi</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Total</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse ($bookings as $b)
                    <tr>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $b->user->name ?? '-' }}</td>
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $b->playstation->nama ?? '-' }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $b->durasi }} jam</td>
                        <td class="px-4 py-3 text-sm text-gray-700">Rp {{ number_format($b->total_harga) }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $b->created_at->format('d-m-Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-sm text-gray-500">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
