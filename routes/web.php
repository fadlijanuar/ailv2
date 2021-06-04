<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DokumenController;
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
Route::post('/admin/user', [UserController::class, 'add'])->name('addUser');
Route::put('/admin/user', [UserController::class, 'edit'])->name('editUser');
Route::delete('/admin/user/{id}', [UserController::class, 'delete']);

// Router Unit
Route::get('/admin/unit', [UnitController::class, 'index'])->name('unit');
Route::post('/admin/unit/add', [UnitController::class, 'add'])->name('addUnit');
Route::get('/admin/unit/add/unitlevel3', [UnitController::class, 'showFromAddUnitLevel3']);
Route::post('/admin/unit/add/unitlevel3', [UnitController::class, 'addUnitLevel3'])->name('addUnitLevel3');
Route::get('/admin/unit/add/unitlevel2', [UnitController::class, 'showFromAddUnitLevel2']);
Route::post('/admin/unit/add/unitlevel2', [UnitController::class, 'addUnitLevel2'])->name('addUnitLevel2');
Route::get('/admin/unit/add/kantorinduk', [UnitController::class, 'showFromAddUnitKantorInduk']);
Route::post('/admin/unit/add/kantorinduk', [UnitController::class, 'addKantorInduk'])->name('addKantorInduk');
Route::get('/admin/unit/add', [UnitController::class, 'showFromAddUnit']);
Route::delete('/admin/unit/{id}', [UnitController::class, 'delete']);
Route::put('/admin/unit/edit', [UnitController::class, 'update'])->name('editUnit');
Route::get('/admin/unit/edit/{id}', [UnitController::class, 'showFormEdit']);

// Router Pelanggan
Route::get('/admin/customer', [CustomerController::class, 'index'])->name('customer');
Route::get('/admin/customer/add', [CustomerController::class, 'showAddForm']);
Route::post('/admin/customer/add', [CustomerController::class, 'add'])->name('addCustomer');
Route::get('/admin/customer/edit/{id}', [CustomerController::class, 'showEditForm']);
Route::post('/admin/customer/edit', [CustomerController::class, 'edit'])->name('editCustomer');
Route::delete('/admin/customer/delete/{id}', [CustomerController::class, 'delete']);

// Router Dokumen Pelanggan
Route::get('/admin/dokumen_pelanggan', 'App\Http\Controllers\DokumenController@index')->name('dokumen_pelanggan');
Route::get('/admin/dokumen_pelanggan/add', [DokumenController::class, 'create']);
Route::post('/admin/dokumen_pelanggan/add', [DokumenController::class, 'store'])->name('add_dokumen_pelanggan');
// TODO: Lanjut ke edit delete
