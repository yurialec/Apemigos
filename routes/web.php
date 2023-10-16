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
            Route::get('/create', [RoleController::class, 'create'])->name('adm.CreateRole')->middleware('can: create_role');
            Route::get('/show/{id}', [RoleController::class, 'show'])->name('adm.ShowRole');
            Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('adm.EditRole')->middleware('can: update_role');
            Route::put('/', [RoleController::class, 'update'])->name('adm.EupdateRole')->middleware('can: update_role');
            Route::delete('/delete/{id}', [RoleController::class, 'delete'])->name('adm.DeleteRole')->middleware('can: delete_role');

            Route::group(['prefix' => '/role-permissions'], function () {
                Route::get('/{roleId}', [RolePermissionController::class, 'index'])->name('adm.IndexRolePermissions');
                Route::put('/', [RolePermissionController::class, 'updateRolePermisison'])->name('adm.updateRolePermisison');
            });
        });

        Route::group(['prefix' => '/permissions'], function () {
            Route::get('/', [PermissionController::class, 'index'])->name('adm.IndexPermission');
            Route::get('/create', [PermissionController::class, 'create'])->name('adm.CreatePermission')->middleware('can: create_permission');
            Route::post('/', [PermissionController::class, 'store'])->name('adm.StorePermission')->middleware('can: create_permission');
            Route::get('/show/{id}', [PermissionController::class, 'show'])->name('adm.ShowPermission');
            Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('adm.EditPermission')->middleware('can: update_permission');
            Route::put('/', [PermissionController::class, 'update'])->name('adm.UpdatePermission');
            Route::delete('/delete/{id}', [PermissionController::class, 'delete'])->name('adm.DeletePermission');
        });

        Route::group(['prefix' => '/users'], function () {
            Route::get('/', [UserController::class, 'index'])->name('adm.IndexUser');
            Route::get('/create', [UserController::class, 'create'])->name('adm.CreateUser')->middleware('can: create_user');
            Route::post('/', [UserController::class, 'store'])->name('adm.StoreUser')->middleware('can: create_user');
            Route::get('/show/{id}', [UserController::class, 'show'])->name('adm.ShowUser');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('adm.EditUser')->middleware('can: update_user');
            Route::put('/', [UserController::class, 'update'])->name('adm.UpdateUser')->middleware('can: update_user');
            Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('adm.DeleteUser')->middleware('can: delete_user');
        });
    });

    Route::group(['prefix' => '/site-config'], function () {
        Route::group(['prefix' => '/header'], function () {
            Route::get('/logo', [SiteController::class, 'logo'])->name('site.logo');
            Route::put('/update-logo', [SiteController::class, 'updateLogo'])->name('site.updateLogo')->middleware('can: update_logotype');
        });
        Route::group(['prefix' => '/content'], function () {
            Route::get('/', [SiteController::class, 'mainContent'])->name('site.content');
            Route::put('/update-main-content', [SiteController::class, 'updateMainContent'])->name('site.updateMainContent')->middleware('can: update_main_content');
        });
        Route::group(['prefix' => '/links-externos'], function () {
            Route::delete('/delete/{id}', [LinksExternosController::class, 'delete'])->name('site.DeleteLink')->middleware('can: delete_link_externo');
            Route::get('/', [LinksExternosController::class, 'index'])->name('site.linksExternos');
            Route::get('/novo', [LinksExternosController::class, 'create'])->name('site.createLink')->middleware('can: create_link_externo');
            Route::post('/', [LinksExternosController::class, 'store'])->name('site.StoreLink')->middleware('can: create_link_externo');
            Route::get('/show/{id}', [LinksExternosController::class, 'show'])->name('site.ShowLink')->middleware('can: show_link_externo');
            Route::get('/edit/{id}', [LinksExternosController::class, 'edit'])->name('site.EditLink')->middleware('can: update_link_externo');
            Route::put('/', [LinksExternosController::class, 'update'])->name('site.UpdateLink')->middleware('can: update_link_externo');
        });

        Route::group(['prefix' => '/carousel'], function () {
            Route::delete('/delete/{id}', [CarouselController::class, 'delete'])->name('site.DeleteCarousel')->middleware('can: delete_carousel');
            Route::get('/', [CarouselController::class, 'index'])->name('site.Carousel');
            Route::get('/novo', [CarouselController::class, 'create'])->name('site.CreateCarousel')->middleware('can: create_carousel');
            Route::post('/novo', [CarouselController::class, 'store'])->name('site.StoreCarousel')->middleware('can: create_carousel');
            Route::get('/show/{id}', [CarouselController::class, 'show'])->name('site.ShowCarousel');
            Route::get('/edit/{id}', [CarouselController::class, 'edit'])->name('site.EditCarousel')->middleware('can: update_carousel');
            Route::put('/', [CarouselController::class, 'update'])->name('site.UpdateCarousel')->middleware('can: update_carousel');
        });

        Route::group(['prefix' => '/footer'], function () {
            Route::get('/', [FooterController::class, 'index'])->name('site.indexFooter');
            Route::get('/create', [FooterController::class, 'create'])->name('site.CreateFooter')->middleware('can: create_footer');
            Route::post('/store', [FooterController::class, 'store'])->name('site.StoreFooter')->middleware('can: create_footer');
            Route::get('/edit/{id}', [FooterController::class, 'edit'])->name('site.EditFooter')->middleware('can: update_footer');
            Route::put('/update', [FooterController::class, 'update'])->name('site.UpdateFooter')->middleware('can: update_footer');
        });

        Route::group(['prefix' => '/midias-sociais'], function () {
            Route::get('/', [MidiasSociaisController::class, 'index'])->name('site.MidiasSociais');
            Route::get('/create', [MidiasSociaisController::class, 'create'])->name('site.CreateMidiasSociais')->middleware('can: create_sicial_media');
            Route::post('/store', [MidiasSociaisController::class, 'store'])->name('site.StoreMidiasSociais')->middleware('can: create_sicial_media');
            Route::get('/{id}', [MidiasSociaisController::class, 'show'])->name('site.ShowMidiasSociais')->middleware('can: show_sicial_media');
            Route::get('/edit/{id}', [MidiasSociaisController::class, 'edit'])->name('site.EditMidiasSociais')->middleware('can: update_sicial_media');
            Route::put('/update', [MidiasSociaisController::class, 'update'])->name('site.UpdateMidiasSociais')->middleware('can: update_sicial_media');
            Route::delete('/delete/{id}', [MidiasSociaisController::class, 'delete'])->name('site.DeleteMidiasSociais')->middleware('can: delete_sicial_media');
        });
    });
});


require __DIR__ . '/auth.php';
