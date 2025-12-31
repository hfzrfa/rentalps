<?php
// Dashboard ringkasan data admin
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooking = Booking::count();
        $pending = Booking::where('status','pending')->count();
        $approved = Booking::where('status','approved')->count();
        $finished = Booking::where('status','finished')->count();

        $totalPendapatan = Booking::where('status','finished')
            ->sum('total_harga');

        return view('admin.dashboard', compact(
            'totalBooking',
            'pending',
            'approved',
            'finished',
            'totalPendapatan'
        ));
    }
}
