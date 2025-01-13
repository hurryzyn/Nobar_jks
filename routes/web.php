<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\UserTableController;
use App\Http\Middleware\CheckRole;
use App\Models\Booking;


// Route untuk halaman home yang menampilkan semua event
Route::get('/home', [ProductController::class, 'index'])->name('home');
Route::get('/', [ProductController::class, 'index'])->name('home');

// Route untuk halaman detail produk berdasarkan ID event

// Route untuk halaman utama
Route::get('/ticket',[BookingController::class, 'index'])->name('ticket.index');


Route::get('/detail_product/{id}', [ProductController::class, 'show'])->name('product.show');
// Route::post('/checkout', [ProductController::class, 'checkout'])->name('checkout');

// Route untuk halaman booking (jika diperlukan)
Route::get('/checkout/{id}', [BookingController::class, 'checkout'])->name('checkout');
Route::post('/payment', [BookingController::class, 'payment'])->name('payment');
Route::get('/notif/{id}', [BookingController::class, 'notif'])->name('notif');

Route::get('/event', [EventController::class, 'index'])->name('event.index');
// Route::get('/detail_product/{id}', [EventController::class, 'show'])->name('event.show');
Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
Route::put('/event/{id}', [EventController::class, 'update'])->name('event.update');
Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('event.destroy');
Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('event.destroy');


// Route untuk dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// Route untuk absen
Route::get('/absen', [AbsenController::class, 'index'])->name('absen.index');
Route::post('/absen/update-attendance', [AbsenController::class, 'updateAttendance'])->name('absen.updateAttendance');

// Route untuk user table
Route::get('/user', [UserTableController::class, 'index'])->name('user.index');
Route::post('/user/store', [UserTableController::class, 'store'])->name('user.store');
Route::get('/user/{id}/edit', [UserTableController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserTableController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserTableController::class, 'destroy'])->name('user.destroy');




Route::get('login', function () {
    return view('cust.login.login');
})->name('login')->middleware('guest');

Route::get('register', function () {
    return view('cust.login.register');
})->name('register')->middleware('guest');

Route::post('register', [AuthController::class, 'register'])->name('register.post');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});
