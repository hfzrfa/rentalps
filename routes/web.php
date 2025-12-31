<?php
// Routing authentication dan role-based redirect
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\PlaystationController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('login');
})->name('home');

Route::get('/dashboard', function () {
    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('bookings.create');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/history', [BookingController::class, 'history'])->name('bookings.history');
});

Route::middleware(['auth', 'isAdmin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/bookings', [AdminBookingController::class, 'index'])
            ->name('bookings.index');

        Route::post('/bookings/{booking}/approve', [AdminBookingController::class, 'approve'])
            ->name('bookings.approve');

        Route::post('/bookings/{booking}/finish', [AdminBookingController::class, 'finish'])
            ->name('bookings.finish');

        Route::get('/reports', [AdminBookingController::class, 'report'])
            ->name('reports');

        Route::get('/reports/bookings', [ReportController::class, 'bookings'])
            ->name('reports.bookings');

        Route::get('/playstations', [PlaystationController::class, 'index'])
            ->name('playstations.index');

        Route::get('/playstations/create', [PlaystationController::class, 'create'])
            ->name('playstations.create');

        Route::post('/playstations', [PlaystationController::class, 'store'])
            ->name('playstations.store');

        Route::get('/playstations/{playstation}/edit', [PlaystationController::class, 'edit'])
            ->name('playstations.edit');

        Route::put('/playstations/{playstation}', [PlaystationController::class, 'update'])
            ->name('playstations.update');

        Route::delete('/playstations/{playstation}', [PlaystationController::class, 'destroy'])
            ->name('playstations.destroy');
    });

require __DIR__ . '/auth.php';
