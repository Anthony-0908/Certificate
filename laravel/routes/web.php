<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\UserController;
use App\Models\certificates;
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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('lesson', LessonsController::class);
Route::resource('certificate',CertificateController::class);
// User Controller
Route::resource('user', UserController::class);
Route::put('users/{id}/update', [UserController::class , 'update'])->name('user.update');
Route::get('/download-pdf', [CertificateController::class , 'generatePDF'])->name('download-pdf');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
