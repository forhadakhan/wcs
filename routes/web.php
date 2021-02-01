<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthentication;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Console\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;


Route::get('/', function () {
    return view('index');
});

Route::view('test', 'test');


// No Authentication Required
Route::get('apply', [ApplyController::class, 'show']);
Route::post('record', [ApplyController::class, 'record'])->name('application');
Route::get('login/admin', [AdminAuthController::class, 'login'])->middleware('alreadyAdminLoggedIn');


// Admin Authentication Required
Route::get('applications', [AdminAuthController::class, 'applications'])->middleware('isAdminLoggedIn');
Route::get('admins', [AdminAuthController::class, 'allAdmins'])->middleware('isAdminLoggedIn');

Route::get('admins/add', [AdminAuthController::class, 'register'])->middleware('isAdminLoggedIn');
Route::get('admins/edit', [AdminAuthController::class, 'edit'])->middleware('isAdminLoggedIn');
Route::get('admins/edit/{id}', [AdminAuthController::class, 'makeEdit'])->middleware('isAdminLoggedIn');
Route::post('updateAdminBySuper', [AdminAuthController::class, 'updateAdminBySuper'])->name('auth.admin.updateAdminBySuper');
Route::get('admins/delete/{id}', [AdminAuthController::class, 'deleteAdminBySuper'])->middleware('isAdminLoggedIn');

Route::post('create', [AdminAuthController::class, 'create'])->name('auth.admin.register');
Route::post('check', [AdminAuthController::class, 'check'])->name('auth.admin.check');
Route::get('dashboard', [AdminAuthController::class, 'dashboard'])->middleware('isAdminLoggedIn');
Route::get('profile/admin', [AdminAuthController::class, 'profile'])->middleware('isAdminLoggedIn');
Route::get('profile/update', [AdminAuthController::class, 'updateView'])->middleware('isAdminLoggedIn');Route::post('updateAdminBySuper', [AdminAuthController::class, 'updateAdminBySuper'])->name('auth.admin.updateAdminBySuper');
Route::post('updateAdmin', [AdminAuthController::class, 'updateAdmin'])->name('auth.admin.updateAdmin');
Route::get('admin/logout', [AdminAuthController::class, 'logout'])->middleware('isAdminLoggedIn');
