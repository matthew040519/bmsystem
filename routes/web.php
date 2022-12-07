<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrgyAdminController;

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

Route::get('/brgyadmin', [BrgyAdminController::class, 'index']);
Route::get('/purok', [BrgyAdminController::class, 'purok']);
Route::get('/puroklist', [BrgyAdminController::class, 'getPurok']);
Route::post('/insert_purok', [BrgyAdminController::class, 'insert_purok']);
Route::get('/purok-admin', [BrgyAdminController::class, 'purok_admin']);
Route::post('/insert_purok_admin', [BrgyAdminController::class, 'insert_purok_admin']);
Route::get('/purokadminlist', [BrgyAdminController::class, 'getPurokAdmin']);



