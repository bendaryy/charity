<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WithDrawController;
use App\Models\WithDraw;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('details', DetailsController::class)->middleware('auth');
Route::resource('users', UsersController::class)->middleware('auth');
Route::resource('exchange', ExchangeController::class)->middleware('auth');
Route::get('users/exchanges/{id}', [DetailsController::class, 'exchange'])->name('exchange.index')->middleware('auth');
Route::resource('withdraw', WithDrawController::class)->middleware('auth');
Route::post('search',[WithDrawController::class,'search'])->name('search');
Route::resource('branch', BranchController::class)->middleware('auth');

