<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

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

Route::redirect('/', '/home');

Route::get('/home', function () {
    return view('index');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->group( function () {

    Route::middleware('active')->prefix('dashboard')->group(function() {

        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');

    });
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
