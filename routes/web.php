<?php

use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index');

Auth::routes(['verify' => true]);

//Auth Admin
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);
    });


//Jadwal
Route::get('/jadwal', 'JadwalController@index');
Route::post('/jadwal/store', 'JadwalController@store');
Route::patch('/jadwal/{id}', 'JadwalController@update');
Route::delete('/jadwal/{id}', 'JadwalController@destroy');


//Berita
Route::get('/berita', 'BeritaController@index');
Route::post('/berita/store', 'BeritaController@store');
Route::patch('/berita/{id}', 'BeritaController@update');
Route::delete('/berita/{id}', 'BeritaController@destroy');

//Presensi
Route::get('/presensi', 'PresensiController@index');
// Route::post('/jabatan/store', 'JabatanController@store');
// Route::patch('/jabatan/{id}', 'JabatanController@update');
// Route::delete('/jabatan/{id}', 'JabatanController@destroy');

//pembina
Route::get('/pembina', 'PembinaController@index');
Route::post('/pembina/store', 'PembinaController@store');
Route::patch('/pembina/{id}', 'PembinaController@update');
Route::delete('/pembina/{id}', 'PembinaController@destroy');

//admin
Route::get('/admin', 'AdminController@index');
Route::post('/admin/store', 'AdminController@store');
Route::patch('/admin/{id}', 'AdminController@update');
Route::delete('/admin/{id}', 'AdminController@destroy');

//siswa
Route::get('/siswa', 'SiswaController@index');
Route::post('/siswa/store', 'SiswaController@store');
Route::patch('/siswa/{id}', 'SiswaController@update');
Route::delete('/siswa/{id}', 'SiswaController@destroy');


//Auth User
Route::get('/user', [App\Http\Controllers\User\DashboardController::class, 'index'])
    ->name('user.dashboard')
    ->middleware(['auth']);

// API
Route::prefix('api')->group(function () {
    Route::get('next-kelas', [KelasController::class, 'nextKelas']);
    Route::get('all-kelas', [KelasController::class, 'allKelas']);
    Route::get('next-semester', [SemesterController::class, 'nextSemester']);
    Route::get('all-semester', [SemesterController::class,'allSemester']);
    Route::get('next-jabatan', [JabatanController::class, 'nextJabatan']);
    Route::get('all-jabatan', [JabatanController::class, 'allJabatan']);
});

Route::get('/logout', 'Auth\LoginController@logout');



