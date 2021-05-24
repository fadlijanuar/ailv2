<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Router Auth
Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('admin', [AdminController::class, 'index'])->name('dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

// Router User
Route::get('/admin/user', [UserController::class, 'index'])->name('user');
Route::post('/admin/user', [UserController::class, 'add']);

// Router Unit
Route::get('/admin/unit', [UnitController::class, 'index'])->name('unit');
