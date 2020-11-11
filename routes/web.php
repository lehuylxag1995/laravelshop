<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

if (App::environment('production')) {
    URL::forceScheme('https');
}

// Back-End
Route::prefix('admin')->name('server.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('category', CategoryController::class)->except('show');
    Route::resource('menu', MenuController::class)->except('show');
});


// Front-End
