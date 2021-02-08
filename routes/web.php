<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\MemberAuthController;


Route::get('/', function () {
    return view('index');
});

// Dummy testing file view
Route::view('testing', 'test');


// No Authentication Required
Route::get('apply', [ApplyController::class, 'show']);
Route::post('record', [ApplyController::class, 'record'])->name('application');
Route::get('login', [MemberAuthController::class, 'login'])->middleware('alreadyAdminLoggedIn');
Route::get('login/admin', [AdminAuthController::class, 'login'])->middleware('alreadyAdminLoggedIn');
Route::post('login', [MemberAuthController::class, 'check'])->name('auth.member.check');
Route::post('login/admin', [AdminAuthController::class, 'check'])->name('auth.admin.check');


// Member Authentication Required

Route::get('member', [MemberAuthController::class, 'index']);
Route::get('member/logout', [MemberAuthController::class, 'logout']);
Route::get('member/profile', [MemberAuthController::class, 'profile']);
Route::get('member/update', [MemberAuthController::class, 'updateView']);


// Admin Authentication Required
Route::group(['middleware' => 'authCheckAdmin'], function () {
    Route::get('applications', [AdminAuthController::class, 'applications']);
    Route::get('admins', [AdminAuthController::class, 'allAdmins']);
    Route::get('members', [AdminAuthController::class, 'allMembers']);
    Route::get('dashboard', [AdminAuthController::class, 'dashboard']);
    Route::get('profile/admin', [AdminAuthController::class, 'profile']);
    Route::get('profile/update', [AdminAuthController::class, 'updateView']);
    Route::get('admin/logout', [AdminAuthController::class, 'logout']);
    Route::get('members/add', [AdminAuthController::class, 'registerMember']);

    Route::post('members/add', [AdminAuthController::class, 'createMember'])->name('auth.member.add');
    Route::post('updateAdmin', [AdminAuthController::class, 'updateAdmin'])->name('auth.admin.updateAdmin');
});


// Super Admin Authentication Required
Route::group(['middleware' => 'authCheckSuperAdmin'], function () {
    Route::get('admins/add', [AdminAuthController::class, 'register']);
    Route::get('admins/edit', [AdminAuthController::class, 'edit']);
    Route::get('admins/edit/{id}', [AdminAuthController::class, 'makeEdit']);
    Route::get('admins/delete/{id}', [AdminAuthController::class, 'deleteAdminBySuper']);

    Route::post('updateAdminBySuper', [AdminAuthController::class, 'updateAdminBySuper'])->name('auth.admin.updateAdminBySuper');
    Route::post('admins/add', [AdminAuthController::class, 'createAdmin'])->name('auth.admin.register');
});
