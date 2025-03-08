<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/', [HomeController::class, 'index'])
        ->name('dashboard');

    // Users
    Route::resource('users', UserController::class)
        ->names('admin.users');

    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('admin.profiles.index');
    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('admin.profiles.update');

    // Roles & Permissions
    Route::resource('roles', RoleController::class)
        ->names('admin.roles');
    Route::resource('permissions', PermissionController::class)
        ->names('admin.permissions');
});
