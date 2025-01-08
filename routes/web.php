<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

// Route untuk login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Route untuk registrasi
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route untuk halaman home yang menampilkan semua event
Route::get('/home', [ProductController::class, 'index'])->name('home');

// Route untuk halaman detail produk berdasarkan ID event
Route::get('/detail_product/{id}', [ProductController::class, 'show'])->name('product.show');

// Route untuk halaman utama
Route::get('/', [ProductController::class, 'index'])->name('home');

// Route untuk pemesanan tiket
Route::post('/book_ticket/{id}', [ProductController::class, 'bookTicket'])->name('book.ticket');

// Route untuk halaman booking (jika diperlukan)
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');

// Route halaman statis
Route::get('/product', function () {
    return view('cust.product.product');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard.dashboard');
})->name('dashboard');
Route::get('/event', function () {
    return view('admin.event.event');
})->name('event');
Route::get('/ticket', function () {
    return view('admin.ticket.ticket');
})->name('ticket');
Route::get('/user', function () {
    return view('admin.user.usertable');
})->name('usertable');
Route::get('/absen', function () {
    return view('admin.absen.absen');
})->name('absen');
