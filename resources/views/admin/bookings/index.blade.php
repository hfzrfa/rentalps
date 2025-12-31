@extends('layouts.app')

@section('content')
<div class="space-y-4">
    <div>
        <h1 class="text-lg font-semibold">Data Booking</h1>
        <p class="mt-1 text-sm text-gray-600">Approve booking pending, atau finish booking yang sudah approved.</p>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">User</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">PlayStation</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Durasi</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Total</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Status</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse ($bookings as $b)
                    <tr>
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $b->user->name }}</td>
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $b->playstation->nama }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $b->durasi }} jam</td>
                        <td class="px-4 py-3 text-sm text-gray-700">Rp {{ number_format($b->total_harga) }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $b->status }}</td>
                        <td class="px-4 py-3 text-sm">
                            @if ($b->status === 'pending')
                                <form action="{{ route('admin.bookings.approve', $b) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-1.5 text-xs font-semibold text-white shadow-sm hover:bg-indigo-700">Approve</button>
                                </form>
                            @elseif ($b->status === 'approved')
                                <form action="{{ route('admin.bookings.finish', $b) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="inline-flex items-center rounded-md bg-white px-3 py-1.5 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Selesai</button>
                                </form>
                            @else
                                <span class="text-xs text-gray-500">-</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-sm text-gray-500">Belum ada data booking.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
