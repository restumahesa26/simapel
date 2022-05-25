<?php

use App\Http\Controllers\Admin\IzinPenelitianController as AdminIzinPenelitianController;
use App\Http\Controllers\Admin\KartuBimbinganController as AdminKartuBimbinganController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\SeminarProposalController as AdminSeminarProposalController;
use App\Http\Controllers\Admin\UjianSkripsiController as AdminUjianSkripsiController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Mahasiswa\IzinPenelitianController;
use App\Http\Controllers\Mahasiswa\KartuBimbinganController;
use App\Http\Controllers\Mahasiswa\SeminarProposalController;
use App\Http\Controllers\Mahasiswa\UjianSkripsiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.home.home');
})->name('home');

Route::middleware(['auth'])
    ->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::get('/profile', [DashboardController::class, 'edit_profile'])->name('profile.edit');

        Route::put('/profile/update', [DashboardController::class, 'update_profile'])->name('profile.update');

        Route::prefix('mahasiswa')
            ->group(function() {

                Route::resource('ujian-skripsi', UjianSkripsiController::class);

                Route::get('/izin-penelitian', [IzinPenelitianController::class, 'index'])->name('izin-penelitian.index');

                Route::put('/izin-penelitian/store', [IzinPenelitianController::class, 'store'])->name('izin-penelitian.store');

                Route::get('/izin-penelitian/cetak-surat', [IzinPenelitianController::class, 'cetak_surat'])->name('izin-penelitian.cetak_surat');

                Route::get('/kartu-bimbingan', [KartuBimbinganController::class, 'index'])->name('kartu-bimbingan.index');

                Route::put('/kartu-bimbingan/store', [KartuBimbinganController::class, 'store'])->name('kartu-bimbingan.store');

                Route::get('/kartu-bimbingan/cetak-surat/{pembimbing}', [KartuBimbinganController::class, 'cetak_surat'])->name('kartu-bimbingan.cetak_surat');

                Route::get('/seminar-proposal', [SeminarProposalController::class, 'index'])->name('seminar-proposal.index');

                Route::put('/seminar-proposal/store', [SeminarProposalController::class, 'store'])->name('seminar-proposal.store');
            });

        Route::prefix('admin')
            ->middleware(['admin'])
            ->group(function() {

                Route::resource('data-mahasiswa', MahasiswaController::class);

                Route::get('/ujian-skripsi', [AdminUjianSkripsiController::class, 'index'])->name('admin.ujian-skripsi.index');

                Route::get('/ujian-skripsi/{id}/show', [AdminUjianSkripsiController::class, 'show'])->name('admin.ujian-skripsi.show');

                Route::patch('/ujian-skripsi/{id}/terima', [AdminUjianSkripsiController::class, 'terima'])->name('admin.ujian-skripsi.terima');

                Route::patch('/ujian-skripsi/{id}/tolak', [AdminUjianSkripsiController::class, 'tolak'])->name('admin.ujian-skripsi.tolak');

                Route::delete('/ujian-skripsi/{id}/hapus', [AdminUjianSkripsiController::class, 'delete'])->name('admin.ujian-skripsi.delete');

                Route::patch('/ujian-skripsi/{id}/set-pembimbing', [AdminUjianSkripsiController::class, 'set_pembimbing'])->name('admin.ujian-skripsi.set-pembimbing');

                Route::patch('/ujian-skripsi/{id}/set-jadwal-sidang', [AdminUjianSkripsiController::class, 'set_jadwal_sidang'])->name('admin.ujian-skripsi.set-jadwal-sidang');

                Route::get('/ujian-skripsi/cetak-undangan-manaqasyah', [AdminUjianSkripsiController::class, 'cetak_undangan'])->name('admin.ujian-skripsi.cetak-undangan');

                Route::get('/ujian-skripsi/cetak-lampiran-undangan-manaqasyah', [AdminUjianSkripsiController::class, 'lampiran_undangan'])->name('admin.ujian-skripsi.cetak-lampiran-undangan');

                Route::get('/ujian-skripsi/cetak-berita-acara', [AdminUjianSkripsiController::class, 'cetak_berita_acara'])->name('admin.ujian-skripsi.cetak-berita-acara');

                Route::get('/izin-penelitian', [AdminIzinPenelitianController::class, 'index'])->name('admin.izin-penelitian.index');

                Route::get('/izin-penelitian/{id}/show', [AdminIzinPenelitianController::class, 'show'])->name('admin.izin-penelitian.show');

                Route::patch('/izin-penelitian/{id}/terima', [AdminIzinPenelitianController::class, 'terima'])->name('admin.izin-penelitian.terima');

                Route::patch('/izin-penelitian/{id}/tolak', [AdminIzinPenelitianController::class, 'tolak'])->name('admin.izin-penelitian.tolak');

                Route::delete('/izin-penelitian/{id}/hapus', [AdminIzinPenelitianController::class, 'tolak'])->name('admin.izin-penelitian.delete');

                Route::get('/kartu-bimbingan', [AdminKartuBimbinganController::class, 'index'])->name('admin.kartu-bimbingan.index');

                Route::get('/kartu-bimbingan/{id}/show', [AdminKartuBimbinganController::class, 'show'])->name('admin.kartu-bimbingan.show');

                Route::patch('/kartu-bimbingan/{id}/terima', [AdminKartuBimbinganController::class, 'terima'])->name('admin.kartu-bimbingan.terima');

                Route::patch('/kartu-bimbingan/{id}/tolak', [AdminKartuBimbinganController::class, 'tolak'])->name('admin.kartu-bimbingan.tolak');

                Route::delete('/kartu-bimbingan/{id}/hapus', [AdminIzinPenelitianController::class, 'tolak'])->name('admin.kartu-bimbingan.delete');

                Route::get('/seminar-proposal', [AdminSeminarProposalController::class, 'index'])->name('admin.seminar-proposal.index');

                Route::get('/seminar-proposal/{id}/show', [AdminSeminarProposalController::class, 'show'])->name('admin.seminar-proposal.show');

                Route::put('/seminar-proposal/{id}/terima', [AdminSeminarProposalController::class, 'terima'])->name('admin.seminar-proposal.terima');

                Route::put('/seminar-proposal/{id}/tolak', [AdminSeminarProposalController::class, 'tolak'])->name('admin.seminar-proposal.tolak');

                Route::delete('/seminar-proposal/{id}/hapus', [AdminSeminarProposalController::class, 'tolak'])->name('admin.seminar-proposal.delete');

                Route::get('/seminar-proposal/cetak-sk-pembimbing', [AdminSeminarProposalController::class, 'cetak_sk'])->name('admin.seminar-proposal.cetak-sk-pembimbing');

                Route::get('/seminar-proposal/cetak-jadwal-seminar-proposal', [AdminSeminarProposalController::class, 'cetak_jadwal'])->name('admin.seminar-proposal.cetak-jadwal-seminar-proposal');

                Route::get('/seminar-proposal/cetak-undangan-seminar-proposal', [AdminSeminarProposalController::class, 'cetak_undangan'])->name('admin.seminar-proposal.cetak-undangan-seminar-proposal');

            });

    });

require __DIR__.'/auth.php';
