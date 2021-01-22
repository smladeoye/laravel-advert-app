<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AdvertBannersController;
use App\Http\Controllers\AdvertsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
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

//Route::get('/', [DashboardController::class, "index"])->name("home");

Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('accounts.login');


Route::prefix('admin')
    ->middleware(['auth'])
    ->group(function () {

    Route::get('/', [DashboardController::class, "index"])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard');

    Route::prefix("accounts")->group(function () {
        Route::get('/change-password', [AccountsController::class, "changePassword"])->name("accounts.change-password");
        Route::put('/update-password', [AccountsController::class, "updatePassword"])->name("accounts.update-password");
        Route::get('/profile', [AccountsController::class, "profile"])->name("accounts.profile");
    });

    Route::prefix("users")->group(function () {
        Route::get('/', [UsersController::class, "index"])->name("users");
        Route::get('/create', [UsersController::class, "create"])->name("users.create");
        Route::get('/{id}', [UsersController::class, "show"])->name("users.view");
        Route::get('/edit/{id}', [UsersController::class, "edit"])->name("users.edit");
        Route::post('/create', [UsersController::class, "store"])->name("users.store");
        Route::put('/edit/{id}', [UsersController::class, "update"])->name("users.update");
    });

    Route::prefix("adverts")->group(function () {
        Route::get('/create', [AdvertsController::class, "create"])->name("adverts.create");
        Route::get('/{id}', [AdvertsController::class, "view"])->name("adverts.view");
        Route::get('/', [AdvertsController::class, "index"])->name("adverts");
        Route::post('/create', [AdvertsController::class, "store"])->name("adverts.store");
        Route::get('/edit/{id}', [AdvertsController::class, "edit"])->name("adverts.edit");
        Route::put('/edit/{id}', [AdvertsController::class, "update"])->name("adverts.update");
    });

    Route::prefix("banners")->group(function () {
        Route::get('/create', [BannersController::class, "create"])->name("banners.create");
        Route::get('/{id}', [BannersController::class, "show"])->name("banners.view");
        Route::get('/', [BannersController::class, "index"])->name("banners");
        Route::post('/create', [BannersController::class, "store"])->name("banners.store");
        Route::get('/edit/{id}', [BannersController::class, "edit"])->name("banners.edit");
        Route::put('/edit/{id}', [BannersController::class, "update"])->name("banners.update");
        Route::get('/download/{id}', [BannersController::class, "download"])->name("banners.download");
        Route::delete('/delete/{id}', [BannersController::class, "delete"])->name("banners.delete");
    });

    Route::prefix("advert-banners")->group(function () {
        Route::get('/create', [AdvertBannersController::class, "create"])->name("advert-banners.create");
        Route::put('/edit/{id}', [AdvertBannersController::class, "update"])->name("advert-banners.update");
        Route::get('/{id}', [AdvertBannersController::class, "show"])->name("advert-banners.view");
        Route::get('/', [AdvertBannersController::class, "index"])->name("advert-banners");
        Route::post('/create', [AdvertBannersController::class, "store"])->name("advert-banners.store");
        Route::get('/edit/{id}', [AdvertBannersController::class, "edit"])->name("advert-banners.edit");
        Route::get('/download/{id}', [AdvertBannersController::class, "downloadBanner"])->name("advert-banners.download");
    });

});

require __DIR__.'/auth.php';
