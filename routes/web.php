<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WithDrawController;
// use App\Models\WithDraw;
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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::resource('details', DetailsController::class)->except('edit')->middleware('auth');
Route::get('details/{id}/edit',[DetailsController::class,'edit'])->name('details.edit')->middleware('auth');
Route::resource('users', UsersController::class)->middleware('auth');
Route::resource('exchange', ExchangeController::class)->middleware('auth');
Route::get('users/exchanges/{id}', [DetailsController::class, 'exchange'])->name('exchange.exchange')->middleware('auth');
Route::resource('withdraw', WithDrawController::class)->middleware('auth');
Route::get('search',[WithDrawController::class,'search'])->name('search')->middleware('auth');
Route::post('/details/search',[DetailsController::class,'search'])->name('details.search')->middleware('auth');
Route::post('/details/search2',[DetailsController::class,'search2'])->name('details.search2')->middleware('auth');
Route::resource('branch', BranchController::class)->middleware('auth');

// categories

route::resource('categories',CategoriesController::class)->middleware('auth');
Route::get('category/{id}',[CategoriesController::class,'showCategory'])->name('showCategory')->middleware('auth');
// Route::get('categoryWithraw/{id}',[CategoriesController::class,'showCategory'])->name('showCategory')->middleware('auth');
Route::get('categoryWithrawId',[CategoriesController::class,'showCategoryWithdraw'])->name('showCategoryWithdraw')->middleware('auth');
route::get('addCategoryToUser',[DetailsController::class,'updateCategory'])->name('updateCategory')->middleware('auth');
route::get('categoryWithdraw/{id}',[CategoriesController::class,'create'])->name('categoryWithdraw')->middleware('auth');
route::post('categoryWithdraw',[CategoriesController::class,'storeWithdraw'])->name('storeWithdraw')->middleware('auth');

