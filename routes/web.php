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

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/master', function () {
    return view('admin.master');
});


Route::middleware(['auth:sanctum'])->group(function(){
    //Category
    Route::resource('cats', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('sizes', SizeController::class);
    Route::resource('products', ProductController::class);
});

Route::get('/{any}', function() { return view('error.err'); })->where('any', '(.*)');