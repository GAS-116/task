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
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){
    // Main
    Route::group(['namespace' => 'Main'], function (){
        Route::get('/', 'IndexController');
    });

    // Users
    Route::group(['namespace' => 'User', 'prefix' => 'users'], function (){
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');
    });

    // Posts
    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function (){
        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/create', 'CreateController')->name('admin.post.create');
        Route::post('/', 'StoreController')->name('admin.post.store');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/{post}', 'DeleteController')->name('admin.post.delete');
    });
});

Auth::routes(['verify' => true]);
