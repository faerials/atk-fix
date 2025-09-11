<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminATKController;
use App\Http\Controllers\ATKController;

    Route::get('/', [ATKController::class, 'index'])
    ->middleware('role.redirect')
    ->name('atk.index');

    Route::get('/kategori/{kategori}', [ATKController::class, 'filter'])->name('atk.filter');

    

    Route::get('/search', [ATKController::class, 'search'])->name('atk.search');

    Route::get('/{id}', [ATKController::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('atk.show');

    
    Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/index', [AdminATKController::class, 'index'])->name('index');
    Route::get('/{id}', [AdminATKController::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('atk.show');
    Route::get('/create', [AdminATKController::class, 'create'])->name('create');
    Route::post('/store', [AdminATKController::class, 'store'])->name('store');
     Route::get('admin/kategori/{kategori}', [AdminATKController::class, 'filter'])->name('filter');
    Route::get('/{id}/edit', [AdminATKController::class, 'edit'])->name('edit');
    Route::put('/{id}', [AdminATKController::class, 'update'])->name('update');
    Route::delete('/{id}', [AdminATKController::class, 'destroy'])->name('destroy');
    Route::get('/search', [AdminATKController::class, 'search'])->name('search');
    });

    require __DIR__.'/auth.php';
