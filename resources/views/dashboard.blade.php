@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
@endsection

@section('content')
<div class="space-y-6">
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-lg border border-gray-200 bg-white p-4">
            <p class="text-sm text-gray-600">Total Booking</p>
            <p class="mt-1 text-2xl font-semibold text-gray-900">{{ $totalBooking ?? '-' }}</p>
        </div>
        <div class="rounded-lg border border-gray-200 bg-white p-4">
            <p class="text-sm text-gray-600">Pending</p>
            <p class="mt-1 text-2xl font-semibold text-gray-900">{{ $pending ?? '-' }}</p>
        </div>
        <div class="rounded-lg border border-gray-200 bg-white p-4">
            <p class="text-sm text-gray-600">Approved</p>
            <p class="mt-1 text-2xl font-semibold text-gray-900">{{ $approved ?? '-' }}</p>
        </div>
        <div class="rounded-lg border border-gray-200 bg-white p-4">
            <p class="text-sm text-gray-600">Finished</p>
            <p class="mt-1 text-2xl font-semibold text-gray-900">{{ $finished ?? '-' }}</p>
        </div>
    </div>

    <div class="rounded-lg border border-gray-200 bg-white p-4">
        <p class="text-sm text-gray-600">Total Pendapatan</p>
        <p class="mt-1 text-2xl font-semibold text-gray-900">Rp {{ isset($totalPendapatan) ? number_format($totalPendapatan) : '-' }}</p>
    </div>

    <div class="flex flex-wrap gap-3">
        <a href="{{ route('admin.bookings.index') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700">Kelola Booking</a>
        <a href="{{ route('admin.playstations.index') }}" class="inline-flex items-center rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Kelola PlayStation</a>
        <a href="{{ route('admin.reports.bookings') }}" class="inline-flex items-center rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Laporan</a>
    </div>
</div>
@endsection
