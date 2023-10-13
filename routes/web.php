<?php

use App\Http\Controllers\Adm\AdmController;
use App\Http\Controllers\Adm\PermissionController;
use App\Http\Controllers\Adm\RoleController;
use App\Http\Controllers\Adm\RolePermissionController;
use App\Http\Controllers\Adm\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\CarouselController;
use App\Http\Controllers\Site\FooterController;
use App\Http\Controllers\Site\LinksExternosController;
use App\Http\Controllers\Site\MidiasSociaisController;
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

    Route::group(['prefix' => '/adm'], function () {
        Route::get('/', [AdmController::class, 'index'])->name('adm.index');

        Route::group(['prefix' => '/roles'], function () {
            Route::get('/', [RoleController::class, 'index'])->name('adm.IndexRole');
            Route::get('/create', [RoleController::class, 'create'])->name('adm.CreateRole');
            Route::post('/', [RoleController::class, 'store'])->name('adm.StoreRole');
            Route::get('/show/{id}', [RoleController::class, 'show'])->name('adm.ShowRole');
            Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('adm.EditRole');
            Route::put('/', [RoleController::class, 'update'])->name('adm.EupdateRole');
            Route::delete('/delete/{id}', [RoleController::class, 'delete'])->name('adm.DeleteRole');

            Route::group(['prefix' => '/role-permissions'], function () {
                Route::get('/{roleId}', [RolePermissionController::class, 'index'])->name('adm.IndexRolePermissions');
                Route::put('/', [RolePermissionController::class, 'updateRolePermisison'])->name('adm.updateRolePermisison');
            });
        });

        Route::group(['prefix' => '/permissions'], function () {
            Route::get('/', [PermissionController::class, 'index'])->name('adm.IndexPermission');
            Route::get('/create', [PermissionController::class, 'create'])->name('adm.CreatePermission');
            Route::post('/', [PermissionController::class, 'store'])->name('adm.StorePermission');
            Route::get('/show/{id}', [PermissionController::class, 'show'])->name('adm.ShowPermission');
            Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('adm.EditPermission');
            Route::put('/', [PermissionController::class, 'update'])->name('adm.UpdatePermission');
            Route::delete('/delete/{id}', [PermissionController::class, 'delete'])->name('adm.DeletePermission');
        });

        Route::group(['prefix' => '/users'], function () {
            Route::get('/', [UserController::class, 'index'])->name('adm.IndexUser');
            Route::get('/create', [UserController::class, 'create'])->name('adm.CreateUser');
            Route::post('/', [UserController::class, 'store'])->name('adm.StoreUser');
            Route::get('/show/{id}', [UserController::class, 'show'])->name('adm.ShowUser');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('adm.EditUser');
            Route::put('/', [UserController::class, 'update'])->name('adm.UpdateUser');
            Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('adm.DeleteUser');
        });
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

        Route::group(['prefix' => '/footer'], function () {
            Route::get('/', [FooterController::class, 'index'])->name('site.indexFooter');
            Route::get('/create', [FooterController::class, 'create'])->name('site.CreateFooter');
            Route::post('/store', [FooterController::class, 'store'])->name('site.StoreFooter');
            Route::get('/edit/{id}', [FooterController::class, 'edit'])->name('site.EditFooter');
            Route::put('/update', [FooterController::class, 'update'])->name('site.UpdateFooter');
        });

        Route::group(['prefix' => '/midias-sociais'], function () {
            Route::get('/', [MidiasSociaisController::class, 'index'])->name('site.MidiasSociais');
            Route::get('/create', [MidiasSociaisController::class, 'create'])->name('site.CreateMidiasSociais');
            Route::post('/store', [MidiasSociaisController::class, 'store'])->name('site.StoreMidiasSociais');
            Route::get('/{id}', [MidiasSociaisController::class, 'show'])->name('site.ShowMidiasSociais');
            Route::get('/edit/{id}', [MidiasSociaisController::class, 'edit'])->name('site.EditMidiasSociais');
            Route::put('/update', [MidiasSociaisController::class, 'update'])->name('site.UpdateMidiasSociais');
            Route::delete('/delete/{id}', [MidiasSociaisController::class, 'delete'])->name('site.DeleteMidiasSociais');
        });
    });
});


require __DIR__ . '/auth.php';
