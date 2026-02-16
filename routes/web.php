<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\OrangtuaController;
use App\Http\Controllers\ParentController;

/*
|--------------------------------------------------------------------------
| REDIRECT AWAL
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('dashboard');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (LOGIN, LOGOUT, DLL)
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| DASHBOARD (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

});

/*
|--------------------------------------------------------------------------
| ADMIN & GURU AREA
| (sementara disamakan untuk kebutuhan pengembangan & pengujian sistem)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin,guru'])->group(function () {

    /*
    |-----------------------------
    | DATA SISWA
    |-----------------------------
    */
    Route::resource('siswa', SiswaController::class);

    /*
    |-----------------------------
    | DATA NILAI (KHUSUS HAPUS PER SISWA)
    |-----------------------------
    */
    Route::delete('nilai/siswa/{siswa}', [NilaiController::class, 'destroyBySiswa'])
        ->name('nilai.destroy.siswa');

    /*
    |-----------------------------
    | DATA NILAI (RESOURCE)
    |-----------------------------
    */
    Route::resource('nilai', NilaiController::class);

    /*
    |-----------------------------
    | DATA MATA PELAJARAN
    |-----------------------------
    */
    Route::resource('mapel', MapelController::class);

});

/*
|--------------------------------------------------------------------------
| ORANG TUA (PUBLIC / TANPA LOGIN)
|--------------------------------------------------------------------------
*/
Route::prefix('orangtua')->group(function () {

    /*
    |-----------------------------
    | HALAMAN AWAL ORANG TUA
    |-----------------------------
    */
    Route::get('/', [OrangtuaController::class, 'index'])
        ->name('orangtua.index');

    /*
    |-----------------------------
    | CARI DATA SISWA
    |-----------------------------
    */
    Route::get('/cari', [OrangtuaController::class, 'cari'])
        ->name('orangtua.cari');

    /*
    |-----------------------------
    | FEEDBACK ORANG TUA (TOKEN)
    |-----------------------------
    */
    Route::post('/{token}/feedback', [ParentController::class, 'storeFeedback'])
        ->name('orangtua.feedback');

});
