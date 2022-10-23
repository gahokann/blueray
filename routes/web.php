<?php

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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'searchLot'])->name('searchLot');


Auth::routes();



Route::name('profile.')->prefix('profile')->group(function(){
    Route::get('index', [App\Http\Controllers\ProfileController::class, 'index'])->name("index")->middleware('auth');
    Route::get('user/other/{id}', [App\Http\Controllers\ProfileController::class, 'showUserOther'])->name("showUserOther");
    Route::get('settings', [App\Http\Controllers\ProfileController::class, 'settings'])->name("settings")->middleware('auth');
    Route::get('lots', [App\Http\Controllers\ProfileController::class, 'showLots'])->name("showLots")->middleware('auth');
    Route::get('order', [App\Http\Controllers\ProfileController::class, 'showOrder'])->name("showOrder")->middleware('auth');
    Route::put('settings/changePassword', [App\Http\Controllers\ProfileController::class, 'changePassword'])->name("changePassword")->middleware('auth');
    Route::post('settings/changeImage', [App\Http\Controllers\ProfileController::class, 'changeImage'])->name("changeImage")->middleware('auth');
    Route::post('lots/create', [App\Http\Controllers\LotController::class, 'lotCreate'])->name("lotCreate")->middleware('auth');
});

Route::name('lot.')->prefix('lot')->group(function(){
    Route::get('index/{id}', [App\Http\Controllers\LotController::class, 'show'])->name("show");
    Route::get('orderForm/{id}', [App\Http\Controllers\LotController::class, 'orderForm'])->name("orderForm")->middleware('auth');
    Route::post('orderCreate/{id}', [App\Http\Controllers\LotController::class, 'orderCreate'])->name("orderCreate")->middleware('auth');
    Route::get('destroy/{id}', [App\Http\Controllers\LotController::class, 'destroy'])->name("destroy")->middleware('auth');

    Route::get('order/form/change/{id}', [App\Http\Controllers\LotController::class, 'orderFormChange'])->name("orderFormChange")->middleware('auth');
    Route::post('order/change/status/{id}', [App\Http\Controllers\LotController::class, 'orderChangeStatus'])->name("orderChangeStatus")->middleware('auth');
});

Route::get('/logout', function () {
    Session::flush();
    Auth::logout();
    return redirect('/');
})->middleware('auth');
