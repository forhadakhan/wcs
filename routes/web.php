<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\AdminAuthController;


Route::get('/', function () {
    return view('index');
});


Route::view('testing', 'test');
Route::view('addm', 'auth.member.addMember');


// No Authentication Required
Route::get('apply', [ApplyController::class, 'show']);
Route::get('login/admin', [AdminAuthController::class, 'login'])->middleware('alreadyAdminLoggedIn');
Route::post('check', [AdminAuthController::class, 'check'])->name('auth.admin.check');


// Admin Authentication Required
Route::group(['middleware' => 'authCheckAdmin'], function () {
    Route::get('applications', [AdminAuthController::class, 'applications']);
    Route::get('admins', [AdminAuthController::class, 'allAdmins']);
    Route::get('dashboard', [AdminAuthController::class, 'dashboard']);
    Route::get('profile/admin', [AdminAuthController::class, 'profile']);
    Route::get('profile/update', [AdminAuthController::class, 'updateView']);
    Route::get('admin/logout', [AdminAuthController::class, 'logout']);

    Route::post('updateAdminBySuper', [AdminAuthController::class, 'updateAdminBySuper'])->name('auth.admin.updateAdminBySuper');
});


// Super Admin Authentication Required
Route::group(['middleware' => 'authCheckSuperAdmin'], function () {
    Route::get('admins/add', [AdminAuthController::class, 'register']);
    Route::get('admins/edit', [AdminAuthController::class, 'edit']);
    Route::get('admins/edit/{id}', [AdminAuthController::class, 'makeEdit']);
    Route::get('admins/delete/{id}', [AdminAuthController::class, 'deleteAdminBySuper']);

    Route::post('record', [ApplyController::class, 'record'])->name('application');
    Route::post('updateAdmin', [AdminAuthController::class, 'updateAdmin'])->name('auth.admin.updateAdmin');
    Route::post('updateAdmin', [AdminAuthController::class, 'updateAdmin'])->name('auth.admin.updateAdmin');
    Route::post('updateAdminBySuper', [AdminAuthController::class, 'updateAdminBySuper'])->name('auth.admin.updateAdminBySuper');
    Route::post('create', [AdminAuthController::class, 'create'])->name('auth.admin.register');
    Route::post('createMember', [AdminAuthController::class, 'createMember'])->name('auth.member.add');
});
