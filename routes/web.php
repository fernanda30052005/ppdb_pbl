<?php

use App\Models\KategoriBooking;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\BeritaController;
use App\Http\Controllers\Frontend\GaleriController;
use App\Http\Controllers\Backend\admin\UmkmController;
use App\Http\Controllers\Backend\admin\UserController;
use App\Http\Controllers\Backend\admin\AdminController;
use App\Http\Controllers\Backend\admin\SlideController;
use App\Http\Controllers\Backend\admin\OutletController;
use App\Http\Controllers\Backend\umkm\KulinerController;
use App\Http\Controllers\Backend\admin\BookingController;
use App\Http\Controllers\Backend\admin\KategoriBookingController;
use App\Http\Controllers\Backend\admin\KategoriKulinerController;
use App\Http\Controllers\Backend\umkm\OutletController as UmkmOutletController;
use App\Http\Controllers\Backend\admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Backend\admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Backend\umkm\DashboardController as UmkmDashboardController;
use App\Http\Controllers\Backend\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Backend\admin\LaporanController;
use App\Http\Controllers\BookingController as ControllersBookingController;
use App\Http\Controllers\Frontend\KulinerController as FrontendKulinerController;
use App\Http\Controllers\Frontend\OutletController as FrontendOutletController;
use App\Http\Controllers\PendaftaranController;

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});

/* -------------------------------------------------------------------------- */
/*                               Auth Routes                                 */
/* -------------------------------------------------------------------------- */

Route::resource('/dashboard', DashboardController::class);
Route::resource('/login', LoginController::class)->only('create', 'index', 'store');
Route::resource('/register', RegisterController::class);

/* -------------------------------------------------------------------------- */
/*                               Frontend Routes                              */
/* -------------------------------------------------------------------------- */
Route::resource('/about', AboutController::class);
Route::resource('/berita', BeritaController::class);
Route::resource('/galeri', GaleriController::class);
Route::resource('/kuliner', FrontendKulinerController::class);
Route::resource('/outlet', FrontendOutletController::class);


Route::get('/contact', function () {
    return view('pages.frontend.contact');
});
Route::resource('/booking', ControllersBookingController::class); // Kat
Route::resource('/pendaftaran', PendaftaranController::class); // Kat
Route::get('/user-bookings', [ControllersBookingController::class, 'getUserBookings'])->name('user.bookings');



/* -------------------------------------------------------------------------- */
/*                               Backend Routes                               */
/* -------------------------------------------------------------------------- */

Route::group(['prefix' => '/admin', 'as' => 'admin.', ], function () {
    Route::resource('/dashboard', AdminDashboardController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/umkm', UmkmController::class);
    Route::resource('/admin', AdminController::class);
    Route::resource('/outlet', OutletController::class);
    Route::resource('/kategori_kuliner', KategoriKulinerController::class);
    Route::resource('/berita', AdminBeritaController::class);
    Route::resource('/galeri', AdminGaleriController::class);
    Route::resource('/slide', SlideController::class);
    // booking mulai
    Route::resource('/booking', BookingController::class);
    Route::get('/booking-all', [BookingController::class, 'index_all']);
    Route::post('/booking/terima/{id}', [BookingController::class, 'terima'])->name('booking.terima');
    Route::post('/booking/tolak/{id}', [BookingController::class, 'tolak'])->name('booking.tolak');
    // booking selesai
    Route::resource('/laporan', LaporanController::class);
    Route::get('/generate-pdf', [LaporanController::class, 'generatePDF'])->name('generatePDF');
    Route::get('/generate-pdf-week', [LaporanController::class, 'generatePDFWeek'])->name('generatePDFWeek');

 // web.php
// web.php



    // booking selesai

    Route::resource('/kategori_booking', KategoriBookingController::class);
});

Route::group(['prefix' => '/umkm', 'as' => 'umkm.', ], function () {
    Route::resource('/dashboard', UmkmDashboardController::class);
    Route::resource('/kuliner', KulinerController::class);
    Route::resource('/outlet', UmkmOutletController::class);
});