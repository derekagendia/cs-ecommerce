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

Route::get('/callback',[\App\Http\Controllers\PaymentCallBackController::class,'callback'])->name('callback');
Route::post('/search-products',[\App\Http\Controllers\SearchController::class,'searchProduct'])->name('search.products');
Route::post('/search-filters',[\App\Http\Controllers\SearchController::class,'filterSearch'])->name('search.filters');

Route::middleware(['auth:sanctum', 'verified'])->group( function () {

    Route::post('/pay',[\App\Http\Controllers\PaymentController::class,'sendPayment'])->name('pay');
    Route::post('/check',[\App\Http\Controllers\PaymentController::class,'isGoodPrice'])->name('check-price');
    Route::post('/check-status',[\App\Http\Controllers\PaymentController::class,'checkStatus'])->name('check-status');

    Route::middleware('active')->prefix('dashboard')->group(function() {

        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/products',\App\Http\Livewire\Product::class)->name('products.show');
        Route::get('/orders',\App\Http\Livewire\OrderTable::class)->name('orders.show');
        Route::get('/clients',\App\Http\Livewire\ShopClient::class)->name('client.show');

    });
});

Route::get('/account-created', [\App\Http\Controllers\HomeController::class, 'pub'])->name('account-created');
Route::get('/product-details/{slug}',[\App\Http\Controllers\ProductController::class, 'details'])->name('products.details');
Route::get('/products-receive/{token}',[\App\Http\Controllers\ReceiveController::class,'receive'])->name('products.received');
Route::get('/products-list',[\App\Http\Controllers\ReceiveController::class,'product'])->name('products.list');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
