<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermisionToRouteController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermissionToRoleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home.page');

Route::middleware('guest')->group(function(){
    Route::get('/login', [HomeController::class, 'login'])->name('login.page');
    Route::post('/login-post', [HomeController::class, 'loginPost'])->name('login.post');
});



Route::middleware('admin')->group(function(){
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::resource('user',UserController::class);
    Route::resource('role',RoleController::class);
    Route::resource('permission',PermissionController::class);
    Route::resource('permission_to_role',PermissionToRoleController::class);
    Route::resource('permission_to_route', PermisionToRouteController::class);
});
