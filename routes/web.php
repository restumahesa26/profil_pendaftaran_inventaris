<?php

use App\Http\Controllers\Admin\DataBarangController;
use App\Http\Controllers\Admin\DataInventarisController;
use App\Http\Controllers\Admin\DataRuanganController;
use App\Http\Controllers\Admin\FotoKegiatanController;
use App\Http\Controllers\Admin\GuruStafController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PembayaranController as AdminPembayaranController;
use App\Http\Controllers\Admin\PendaftaranController as AdminPendaftaranController;
use App\Http\Controllers\Admin\PeriodeController;
use App\Http\Controllers\Admin\StrukturOrganisasiController;
use App\Http\Controllers\Admin\VisiMisiTujuanController;
use App\Http\Controllers\Admin\WaliMuridController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileController2;
use App\Http\Controllers\WaliMurid\PembayaranController;
use App\Http\Controllers\WaliMurid\PendaftaranController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController2::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController2::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')
    ->middleware('admin')
    ->group(function() {
        Route::resource('periode', PeriodeController::class);
        Route::resource('wali-murid', WaliMuridController::class);
        Route::resource('data-ruangan', DataRuanganController::class);
        Route::resource('data-barang', DataBarangController::class);
        Route::resource('visi-misi-tujuan', VisiMisiTujuanController::class);
        Route::resource('struktur-organisasi', StrukturOrganisasiController::class);
        Route::resource('guru-staf', GuruStafController::class);
        Route::resource('foto-kegiatan', FotoKegiatanController::class);
        Route::get('/data-inventaris/laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::get('/data-inventaris/laporan/pdf', [LaporanController::class, 'pdf'])->name('laporan.pdf');
        Route::get('/data-inventaris/detail/{id}', [DataInventarisController::class, 'detail'])->name('data-inventaris.detail');
        Route::resource('data-inventaris', DataInventarisController::class);
        Route::get('/pendaftaran', [AdminPendaftaranController::class, 'index'])->name('admin-pendaftaran.index');
        Route::get('/pendaftaran/show/{id}', [AdminPendaftaranController::class, 'show'])->name('admin-pendaftaran.show');
        Route::put('/pendaftaran/update-data-anak/{id}', [AdminPendaftaranController::class, 'update_data_anak'])->name('admin-pendaftaran.update-data-anak');
        Route::put('/pendaftaran/update-data-ayah/{id}', [AdminPendaftaranController::class, 'update_data_ayah'])->name('admin-pendaftaran.update-data-ayah');
        Route::put('/pendaftaran/update-data-ibu/{id}', [AdminPendaftaranController::class, 'update_data_ibu'])->name('admin-pendaftaran.update-data-ibu');
        Route::put('/pendaftaran/update-data-tambahan/{id}', [AdminPendaftaranController::class, 'update_data_tambahan'])->name('admin-pendaftaran.update-data-tambahan');
        Route::get('/pendaftaran/verifikasi/{id}', [AdminPendaftaranController::class, 'verifikasi'])->name('admin-pendaftaran.verifikasi');
        Route::patch('/pendaftaran/store-jadwal-tes/{id}', [AdminPendaftaranController::class, 'store_jadwal_tes'])->name('admin-pendaftaran.store-jadwal-tes');
        Route::patch('/pendaftaran/store-hasil-tes/{id}', [AdminPendaftaranController::class, 'store_hasil_tes'])->name('admin-pendaftaran.store-hasil-tes');
        Route::delete('/pendaftaran/delete/{id}', [AdminPendaftaranController::class, 'delete'])->name('admin-pendaftaran.delete');
        Route::get('/pembayaran', [AdminPembayaranController::class, 'index'])->name('admin-pembayaran.index');
        Route::get('/pembayaran/verifikasi/{id}', [AdminPembayaranController::class, 'verifikasi'])->name('admin-pembayaran.verifikasi');
        Route::get('/pembayaran/tolak/{id}', [AdminPembayaranController::class, 'tolak'])->name('admin-pembayaran.tolak');
    });

    Route::middleware('wali-murid')
    ->group(function() {
        Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
        Route::get('/pendaftaran/create', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
        Route::get('/pendaftaran/data-anak/{id}', [PendaftaranController::class, 'data_anak'])->name('pendaftaran.data-anak');
        Route::post('/pendaftaran/data-anak/store/{id}', [PendaftaranController::class, 'store_data_anak'])->name('pendaftaran.data-anak.store');
        Route::get('/pendaftaran/data-ayah/{id}', [PendaftaranController::class, 'data_ayah'])->name('pendaftaran.data-ayah');
        Route::post('/pendaftaran/data-ayah/store/{id}', [PendaftaranController::class, 'store_data_ayah'])->name('pendaftaran.data-ayah.store');
        Route::get('/pendaftaran/data-ibu/{id}', [PendaftaranController::class, 'data_ibu'])->name('pendaftaran.data-ibu');
        Route::post('/pendaftaran/data-ibu/store/{id}', [PendaftaranController::class, 'store_data_ibu'])->name('pendaftaran.data-ibu.store');
        Route::get('/pendaftaran/data-tambahan/{id}', [PendaftaranController::class, 'data_tambahan'])->name('pendaftaran.data-tambahan');
        Route::post('/pendaftaran/data-tambahan/store/{id}', [PendaftaranController::class, 'store_data_tambahan'])->name('pendaftaran.data-tambahan.store');
        Route::get('/pendaftaran/berkas/{id}', [PendaftaranController::class, 'berkas'])->name('pendaftaran.berkas');
        Route::post('/pendaftaran/berkas/store/{id}', [PendaftaranController::class, 'store_berkas'])->name('pendaftaran.berkas.store');

        Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
        Route::post('/pembayaran/store/{id}', [PembayaranController::class, 'store'])->name('pembayaran.store');
        Route::put('/pembayaran/update/{id}', [PembayaranController::class, 'update'])->name('pembayaran.update');
    });
});

require __DIR__.'/auth.php';
