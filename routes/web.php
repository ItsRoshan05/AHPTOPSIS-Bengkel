<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecommendationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PairwiseComparisonMatrixController;
use App\Http\Controllers\DecisionMatrixController;
use App\Http\Controllers\UserController;

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

// Public routes

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::view('/testing','testing');


// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/recommendations', [RecommendationController::class, 'index']);
    Route::resource('pairwise-comparison-matrices', PairwiseComparisonMatrixController::class);
    Route::resource('decision-matrices', DecisionMatrixController::class);
    Route::resource('users', UserController::class);
    Route::get('/dashboard', [DecisionMatrixController::class, 'dashboard'])->name('dashboard');
    Route::get('/', [DecisionMatrixController::class, 'dashboard'])->name('dashboard');
});
