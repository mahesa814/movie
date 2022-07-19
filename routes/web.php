<?php

use App\Http\Controllers\PosterController;
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
Route::controller(PosterController::class)->name('poster.')->group(function(){

    Route::get('/','show_data');
    Route::post('post-film','store')->name('store');
    Route::get('poster/edit/{id}','edit');
    Route::put('poster/update/{id}','update')->name('update');
    Route::delete('poster/destroy/{id}','destroy')->name('destroy');

});

