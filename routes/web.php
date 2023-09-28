<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\SiteController;
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

Route::get('/', [SiteController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::group(['prefix' => '/admin'], function () {
        Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');
    });

    Route::group(['prefix' => '/site-config'], function () {
        Route::group(['prefix' => '/header'], function () {
            Route::get('/logo', [SiteController::class, 'logo'])->name('site.logo');
            Route::put('/update-logo', [SiteController::class, 'updateLogo'])->name('site.updateLogo');
        });
    });
});


require __DIR__ . '/auth.php';
