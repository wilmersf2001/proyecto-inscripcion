<?php

use App\Http\Controllers\ApplicantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayController;
use App\Http\Controllers\RedirectController;

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

Route::get('/', function () {
    return view('validate-payment');
});
Route::post('/pay', [PayController::class, "validatePayment"])->name('pay.validatePayment');
Route::get('/registro-postulante', [ApplicantController::class, 'redirectRegisterApplicant'])->name('applicant.redirectRegisterApplicant');
Route::post('/store-applicant', [ApplicantController::class, "store"])->name('applicant.store');