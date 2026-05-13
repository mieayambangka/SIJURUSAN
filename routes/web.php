<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');


Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'verified', 'role:admin'])
    ->group(function () {

        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('jurusan', \App\Http\Controllers\Admin\JurusanController::class);
        Route::resource('kriteria', \App\Http\Controllers\Admin\KriteriaController::class)->except(['show']);

        Route::get('bobot', [\App\Http\Controllers\Admin\BobotController::class, 'index'])->name('bobot.index');
        Route::get('bobot/{jurusan}/edit', [\App\Http\Controllers\Admin\BobotController::class, 'edit'])->name('bobot.edit');
        Route::post('bobot/{jurusan}', [\App\Http\Controllers\Admin\BobotController::class, 'update'])->name('bobot.update');

        Route::resource('pertanyaan', \App\Http\Controllers\Admin\PertanyaanController::class);

        Route::get('siswa', [\App\Http\Controllers\Admin\SiswaController::class, 'index'])->name('siswa.index');
        Route::get('siswa/{user}', [\App\Http\Controllers\Admin\SiswaController::class, 'show'])->name('siswa.show');

        Route::get('hasil-rekomendasi', [\App\Http\Controllers\Admin\HasilRekomendasiController::class, 'index'])->name('hasil.index');
        Route::get('hasil-rekomendasi/{user}', [\App\Http\Controllers\Admin\HasilRekomendasiController::class, 'show'])->name('hasil.show');
    });

Route::prefix('student')
    ->name('student.')
    ->middleware(['auth', 'verified', 'role:student'])
    ->group(function () {

        Route::get('/dashboard', [\App\Http\Controllers\Student\DashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/nilai', [\App\Http\Controllers\Student\NilaiController::class, 'index'])->name('nilai.index');
        Route::post('/nilai', [\App\Http\Controllers\Student\NilaiController::class, 'store'])->name('nilai.store');

        Route::get('/kuisioner', [\App\Http\Controllers\Student\KuisionerController::class, 'index'])->name('kuisioner.index');
        Route::post('/kuisioner', [\App\Http\Controllers\Student\KuisionerController::class, 'store'])->name('kuisioner.store');

        Route::get('/ulang', [\App\Http\Controllers\Student\KuisionerController::class, 'reset'])->name('ulang');

        Route::get('/hasil', [\App\Http\Controllers\Student\HasilController::class, 'index'])->name('hasil.index');
    });

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('student.dashboard');
    })->middleware('auth');
});
require __DIR__ . '/auth.php';
