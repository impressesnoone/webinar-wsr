<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();
Route::group(['namespace' => 'App\Http\Controllers'], function(){
    Route::get('/', 'MainController')->name('main');
    Route::get('/{id}', 'MainShowController')->name('main.show');
    Route::post('/', 'MainFilterController')->name('main.filter');
});



Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::group(['namespace' => 'Product', 'prefix' => 'products'], function () {
        Route::get('/', 'IndexController')->name('admin.product.index');
        Route::get('/create', 'CreateController')->name('admin.product.create');
        Route::post('/', 'StoreController')->name('admin.product.store');
        Route::get('/{id}', 'ShowController')->name('admin.product.show');
        Route::get('/edit/{id}', 'EditController')->name('admin.product.edit');
        Route::patch('/{id}', 'UpdateController')->name('admin.product.update');
        Route::delete('/{id}', 'DestroyController')->name('admin.product.destroy');
    });

    Route::group(['namespace' => 'Order', 'prefix' => 'orders'], function () {
        Route::get('/', 'IndexController')->name('admin.order.index');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::delete('/{id}', 'DestroyController')->name('admin.category.destroy');
    });

});


