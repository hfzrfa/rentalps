<?php
// Perhitungan otomatis total harga booking
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Playstation;

class BookingController extends Controller
{
    // FORM BOOKING
    public function create()
    {
        $playstations = Playstation::where('status', 'tersedia')->get();
        return view('bookings.create', compact('playstations'));
    }

    // SIMPAN BOOKING
    public function store(Request $request)
    {
        $request->validate([
            'playstation_id' => 'required|exists:playstations,id',
            'durasi' => 'required|integer|min:1',
        ]);

        $result = DB::transaction(function () use ($request) {
            $ps = Playstation::query()
                ->whereKey($request->playstation_id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($ps->status !== 'tersedia') {
                return ['ok' => false];
            }

            $total = $ps->harga_per_jam * (int) $request->durasi;

            Booking::create([
                'user_id' => Auth::id(),
                'playstation_id' => $ps->id,
                'durasi' => (int) $request->durasi,
                'total_harga' => $total,
                'status' => 'pending',
            ]);

            $ps->update(['status' => 'disewa']);

            return ['ok' => true];
        });

        if (!$result['ok']) {
            return back()
                ->withErrors(['playstation_id' => 'PlayStation sedang tidak tersedia.'])
                ->withInput();
        }

        return redirect()->route('bookings.history')
            ->with('success', 'Booking berhasil dibuat');
    }

    // RIWAYAT USER
    public function history()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->with('playstation')
            ->get();

        return view('bookings.history', compact('bookings'));
    }
}
