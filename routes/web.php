<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\CarouselController;
use App\Http\Controllers\Site\LinksExternosController;
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
        Route::group(['prefix' => '/content'], function () {
            Route::get('/', [SiteController::class, 'mainContent'])->name('site.content');
            Route::put('/update-main-content', [SiteController::class, 'updateMainContent'])->name('site.updateMainContent');
        });
        Route::group(['prefix' => '/links-externos'], function () {
            Route::delete('/delete/{id}', [LinksExternosController::class, 'delete'])->name('site.DeleteLink');
            Route::get('/', [LinksExternosController::class, 'index'])->name('site.linksExternos');
            Route::get('/novo', [LinksExternosController::class, 'create'])->name('site.createLink');
            Route::post('/', [LinksExternosController::class, 'store'])->name('site.StoreLink');
            Route::get('/show/{id}', [LinksExternosController::class, 'show'])->name('site.ShowLink');
            Route::get('/edit/{id}', [LinksExternosController::class, 'edit'])->name('site.EditLink');
            Route::put('/', [LinksExternosController::class, 'update'])->name('site.UpdateLink');
        });

        Route::group(['prefix' => '/carousel'], function () {
            Route::delete('/delete/{id}', [CarouselController::class, 'delete'])->name('site.DeleteCarousel');
            Route::get('/', [CarouselController::class, 'index'])->name('site.Carousel');
            Route::get('/novo', [CarouselController::class, 'create'])->name('site.CreateCarousel');
            Route::post('/novo', [CarouselController::class, 'store'])->name('site.StoreCarousel');
            Route::get('/show/{id}', [CarouselController::class, 'show'])->name('site.ShowCarousel');
            Route::get('/edit/{id}', [CarouselController::class, 'edit'])->name('site.EditCarousel');
            Route::put('/', [CarouselController::class, 'update'])->name('site.UpdateCarousel');
        });
    });
});


require __DIR__ . '/auth.php';
