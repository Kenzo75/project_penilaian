<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NilaiController;
use App\Models\Nilai;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


route::get('/siswa', [SiswaController::class, 'index'])->middleware('auth');
route::get('/siswa/create', [SiswaController::class, 'create'])->middleware('auth');
route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->middleware('auth');
route::post('/siswa', [SiswaController::class, 'store'])->middleware('auth');
route::put('/siswa/{id}', [SiswaController::class, 'update'])->middleware('auth');
route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->middleware('auth');


route::get('/nilai', [NilaiController::class, 'index'])->middleware('auth');
route::post('/nilai', [NilaiController::class, 'store'])->middleware('auth');
