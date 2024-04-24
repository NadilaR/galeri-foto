<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [FotoController::class, 'index']);
Route::get('/foto/{slug}', [FotoController::class, 'show'])->name('foto.show');

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::post('/dashboard', [DashboardController::class, 'store']);
Route::get('/dashboard/create', [DashboardController::class, 'create']);
Route::post('/dashboard/{id}', [DashboardController::class, 'delete']);
Route::get('/dashboard/edit/{slug}', [DashboardController::class, 'edit']);
Route::post('/dashboard/edit/{id}', [DashboardController::class, 'update']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/like/{id}', [LikeController::class, 'like']);
Route::get('/likee/{id}', [LikeController::class, 'likee']);
