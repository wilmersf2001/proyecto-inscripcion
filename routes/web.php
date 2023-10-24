<?php

use App\Http\Controllers\ApplicantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayController;

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
Route::get('/welcome', function () {
	return view('welcome');
});

Route::get('/subir', function () {
	return view('upload-file');
});

Route::get('/', PayController::class)->name('start');
Route::post('/registro-postulante', [PayController::class, "validatePayment"])->name('pay.validatePayment');
Route::post('/store-applicant', [ApplicantController::class, "store"])->name('applicant.store');
Route::post('/upload-file', [ApplicantController::class, "uploadFile"])->name('applicant.uploadFile');
Route::get('/mensaje', [ApplicantController::class, "ending"])->name('applicant.ending');