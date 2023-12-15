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

/* Front */
Route::group(['namespace' => 'Main'], function () {
    Route::get('/', 'IndexController');
});

/* Admin */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){
    // Main
    Route::group(['namespace' => 'Main'], function (){
        Route::get('/', 'IndexController');
    });

    // Users
    Route::group(['namespace' => 'User', 'prefix' => 'users'], function (){
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        /*Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');*/
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
