<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;

Route::get('/', [HomeController::class, 'index'])->name('dashboard');

Route::resource('users', UserController::class)->names('admin.users');

Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profiles.index');
Route::put('/profile', [ProfileController::class, 'update'])->name('admin.profiles.update');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('permissions', PermissionController::class)->names('admin.permissions');
