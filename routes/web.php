<?php

use App\Http\Controllers\Admin\AdminController;
// use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\bukuController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\ListKategoriController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\testController;
use App\Http\Controllers\UlasanController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route landing page
Route::get('/', function () {
    return view('landing');
})->name('index');
Route::get('/peminjam', function () {
    return view('peminjam.index');
});
Route::get('/check-login', function () {
    return auth()->user();
});
// Route::get('/notifikasi/download/{id}', [NotifikasiController::class, 'download'])->name('notifikasi.download');
Route::post('/peminjaman/ajukan', [PeminjamanController::class, 'ajukan'])->name('peminjaman.ajukan');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', function () {
        return view('admin.pages.admin-dashboard');
    })->name('admin.dashboard');
    Route::get('/list-kategori', [ListKategoriController::class, 'index'])->name('list-kategori.index');
    Route::resource('buku', bukuController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('petugas', PetugasController::class);
});

Route::prefix('petugas')->middleware(['auth', 'petugas'])->group(function () {
    Route::prefix('location')->group(function () {
        Route::get('/get-provincies', [PeminjamController::class, 'getProvincies']);
        Route::get('/get-kabupaten/{provinsiId}', [PeminjamController::class, 'getKabupatenByProvincies']);
        Route::get('/get-kecamatan/{kabupatenId}', [PeminjamController::class, 'getKecamatanByKabupaten']);
    });
    Route::get('/', function () {
        return view('petugas.pages.petugas-dashboard');
    })->name('petugas.dashboard');
    Route::resource('denda', DendaController::class);
    Route::resource('ulasan', UlasanController::class);
    Route::delete('/ulasan/{ulasan}', [UlasanController::class, 'destroy'])->name('ulasan.destroy');

    Route::resource('peminjam', PeminjamController::class);

    Route::resource('peminjaman', PeminjamanController::class);
    Route::post('/peminjaman/konfirmasi/{id}', [PeminjamanController::class, 'konfirmasi'])->name('peminjaman.konfirmasi');
    // Route::post('/peminjaman/kembalikan/{id}', [PeminjamanController::class, 'kembalikan'])->name('peminjaman.kembalikan');


    Route::get('notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi.index');
    Route::post('notifikasi/{id}/kirim-ke-peminjam', [NotifikasiController::class, 'kirimKePeminjam'])->name('notifikasi.kirim');
    Route::delete('/notifikasi/hapus/{id}', [NotifikasiController::class, 'hapus'])->name('notifikasi.hapus');
});

Route::prefix(('peminjam'))->middleware('auth', 'peminjam')->group(function () {
    Route::get('/koleksi', [KoleksiController::class, 'index'])->name('koleksi.index');
    Route::post('/koleksi/store', [KoleksiController::class, 'store'])->name('koleksi.store');
    Route::post('/koleksi/{id_koleksi_buku}/add-buku', [KoleksiController::class, 'addBuku'])->name('koleksi.addBuku');
    Route::delete('/koleksi/{id_koleksi_buku}/remove-buku/{id}', [KoleksiController::class, 'removeBuku'])->name('koleksi.removeBuku');
    Route::delete('/koleksi/{id}', [KoleksiController::class, 'destroy'])->name('koleksi.destroy');
});

require __DIR__ . '/auth.php';


Route::get('/cari-buku', [bukuController::class, 'cari'])->name('buku.cari');
Route::get('/detailbuku/{id}', [bukuController::class, 'detail'])->name('buku.detail');
Route::post('/detailbuku/{id}/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');
Route::get('/notifikasi/{id}/download-bukti', [NotifikasiController::class, 'downloadBukti'])->name('notifikasi.download');
