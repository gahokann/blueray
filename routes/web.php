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


Auth::routes();



Route::name('profile.')->prefix('profile')->group(function(){
    Route::get('index', [App\Http\Controllers\ProfileController::class, 'index'])->name("index")->middleware('auth');
    Route::get('settings', [App\Http\Controllers\ProfileController::class, 'settings'])->name("settings")->middleware('auth');
    Route::put('settings/changePassword', [App\Http\Controllers\ProfileController::class, 'changePassword'])->name("changePassword")->middleware('auth');
    Route::post('settings/changeImage', [App\Http\Controllers\ProfileController::class, 'changeImage'])->name("changeImage")->middleware('auth');
});

Route::name('lot.')->prefix('lot')->group(function(){
    Route::get('index/{id}', [App\Http\Controllers\LotController::class, 'show'])->name("show")->middleware('auth');
});

Route::get('/logout', function () {
    Session::flush();
    Auth::logout();
    return redirect('/');
})->middleware('auth');
