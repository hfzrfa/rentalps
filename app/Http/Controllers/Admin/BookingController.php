<?php
// Admin approve dan menyelesaikan booking
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Playstation;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    // LIST BOOKING
    public function index()
    {
        $bookings = Booking::with(['user', 'playstation'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    // APPROVE
    public function approve(Booking $booking)
    {
        if ($booking->status !== 'pending') {
            return back()->with('error', 'Booking tidak bisa disetujui dari status ini.');
        }

        $booking->update(['status' => 'approved']);

        return back()->with('success', 'Booking disetujui');
    }

    // SELESAI
    public function finish(Booking $booking)
    {
        if ($booking->status !== 'approved') {
            return back()->with('error', 'Booking tidak bisa diselesaikan dari status ini.');
        }

        DB::transaction(function () use ($booking) {
            $booking->update(['status' => 'finished']);

            $booking->playstation()
                ->lockForUpdate()
                ->update(['status' => 'tersedia']);
        });

        return back()->with('success', 'Booking selesai');
    }

    // LAPORAN
    public function report()
    {
        return redirect()->route('admin.reports.bookings');
    }
}
