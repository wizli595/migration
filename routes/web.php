<?php

use App\Http\Controllers\MigrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('user.index');
});

Route::group(['prefix' => '/user', 'as' => 'user.'], function () {
    Route::get('/', [MigrationController::class, 'index'])->name('index');
    Route::get('/create', [MigrationController::class, 'create'])->name('create');
    Route::post('/create', [MigrationController::class, 'addUser'])->name('addUser');
    Route::get('/edit/{id}', [MigrationController::class, 'edit'])->name('edit');
    Route::put('/edit/{id}', [MigrationController::class, 'update'])->name('update');
    Route::delete('/{id}', [MigrationController::class, 'delete'])->name('delete');
});
