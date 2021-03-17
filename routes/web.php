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
Auth::routes();

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/product/add', [App\Http\Controllers\MainController::class, 'productAdd'])->name('productForm');

Route::get('/product/remove/{id?}', [App\Http\Controllers\MainController::class, 'productRemove'])->name('productRemove');
Route::get('/product/edit/{id?}', [App\Http\Controllers\MainController::class, 'productEdit'])->name('edit');
Route::post('/product/edit/', [App\Http\Controllers\MainController::class, 'productUpdate'])->name('productUpdate');



Route::post('/product/submit', [App\Http\Controllers\MainController::class, 'submit'])->name('productSubmit');

Route::get('/categories/add', 'App\Http\Controllers\MainController@categoriesAdd')->name('categoriesAdd');
Route::get('/categories/edit/{id?}', [App\Http\Controllers\MainController::class, 'categoriesEdit'])->name('categoriesEdit');
Route::post('/categories/edit/', [App\Http\Controllers\MainController::class, 'categoriesUpdate'])->name('categoriesUpdate');
Route::get('/categories/remove/{id?}', 'App\Http\Controllers\MainController@categoriesRemove')->name('categoriesRemove');
Route::post('/categories/submit', 'App\Http\Controllers\MainController@categoriesSubmit')->name('categoriesSubmit');


Route::get('/', 'App\Http\Controllers\MainController@index')->name('home');
Route::get('/categories', 'App\Http\Controllers\MainController@categories')->name('categories');
Route::get('/{category}', 'App\Http\Controllers\MainController@category')->name('category');
Route::get('/{category}/{product?}', 'App\Http\Controllers\MainController@product')->name('product'); //? если параментр не обязательный





