<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\RolePermissionController;

Route::middleware(['auth'])->group(function () {
    Route::get('/roles', [RolePermissionController::class, 'index'])->name('role-permission.index');
    Route::get('/role/create', [RolePermissionController::class, 'create'])->name('role-permission.create');
    Route::post('/role/store', [RolePermissionController::class, 'store'])->name('role-permission.store');
});
