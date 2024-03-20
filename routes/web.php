<?php

use App\Http\Controllers\CatalogCategoryController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CatalogGalleryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserCatalogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('catalog', [UserCatalogController::class, 'index'])->name('user.catalog.index');
Route::get('catalog/{id}', [UserCatalogController::class, 'show'])->name('user.catalog.show');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('catalog', CatalogController::class);
    Route::get('catalog/{id}/detail', [CatalogController::class, 'detail'])->name('catalog.detail');
    Route::get('catalog/{id}/gallery', [CatalogController::class, 'gallery'])->name('catalog.gallery');
    Route::resource('catalog-gallery', CatalogGalleryController::class);
    Route::resource('catalog-category', CatalogCategoryController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
