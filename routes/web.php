<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

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
    return view('login');
});

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/admindashboard', [AdminController::class, 'index']);
Route::get('/barangay', [AdminController::class, 'barangay']);
Route::get('/barangaylist', [AdminController::class, 'getBarangay']);
Route::post('/insert_barangay', [AdminController::class, 'insert_barangay']);
Route::post('/insert_barangay_admin', [AdminController::class, 'insert_barangay_admin']);
Route::get('/barangay-admin', [AdminController::class, 'barangay_admin']);
Route::get('/barangayadminlist', [AdminController::class, 'getBarangayAdmin']);
Route::get('/logout', [LoginController::class, 'logout']);


