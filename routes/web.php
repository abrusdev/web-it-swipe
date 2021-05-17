<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/admin/login', LoginController::class)
    ->only(['index', 'store'])
    ->name('index','login');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/logout', [LoginController::class, 'logout'])
        ->name('logout');

    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('/posts/create', PostController::class)
        ->only(['index', 'store'])
        ->name('index', 'posts.create');
});
