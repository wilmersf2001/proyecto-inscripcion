<?php

use App\Http\Controllers\ApplicantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayController;
use App\Http\Controllers\FichaInscripcionController;
use App\Http\Controllers\PhotoController;

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
// Registro de postulante
Route::get('/', PayController::class)->name('start');
Route::post('/registro-postulante', [PayController::class, "validatePayment"])->name('pay.validatePayment');
Route::post('/store-applicant', [ApplicantController::class, "store"])->name('applicant.store');
Route::get('/mensaje', [ApplicantController::class, "ending"])->name('applicant.ending');
// Ficha de inscripción
Route::get('/ficha-inscripcion', FichaInscripcionController::class)->name('pdf.startPdfQuery');
Route::post('/ficha-inscripcion', [FichaInscripcionController::class, "validatePdf"])->name('pdf.validatePdf');
Route::post('/rectificar-foto', [FichaInscripcionController::class, "storeRectifiedPhotos"])->name('photo.storeRectifiedPhotos');

Route::any('/{any}', function () {
	return view('page-not-found');
})->where('any', '.*');
