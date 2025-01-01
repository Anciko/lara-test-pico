<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\RoleController;
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

Route::get('/', [AuthController::class, 'loginPage'] )->name('login');
Route::post('/login', [AuthController::class, 'submitLogin'])->name('submit.login');


Route::resource('/admin-users', AdminUserController::class);
Route::resource('/roles', RoleController::class);
