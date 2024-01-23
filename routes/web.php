<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\GuestTicketsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/tickets/{category_id}', [TicketsController::class, 'index'])->name('tickets.index');
    Route::post('/send_tickets', [TicketsController::class, 'store'])->name('send_tickets.store');

});

Route::middleware('guest')->group(function () {
    Route::get('/guest_tickets/{ticket_id}', [GuestTicketsController::class, 'show'])->name('guesttickets.show');
    Route::post('/send_tickets', [TicketsController::class, 'update'])->name('send_tickets.update');
});



require __DIR__.'/auth.php';
