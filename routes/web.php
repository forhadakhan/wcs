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
Route::get('login', [MemberAuthController::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('login/admin', [AdminAuthController::class, 'login'])->middleware('alreadyLoggedIn');
Route::post('login', [MemberAuthController::class, 'check'])->name('auth.member.check');
Route::post('login/admin', [AdminAuthController::class, 'check'])->name('auth.admin.check');


// Member Authentication Required
Route::group(['middleware' => 'authCheckMember'], function () {
    Route::get('member', [MemberAuthController::class, 'index']);
    Route::get('member/logout', [MemberAuthController::class, 'logout']);
    Route::get('member/profile', [MemberAuthController::class, 'profile']);
    Route::get('member/update', [MemberAuthController::class, 'updateView']);

    Route::post('updateMember', [MemberAuthController::class, 'updateMember'])->name('auth.member.updateMember');
    Route::post('updateMemberSecurity', [MemberAuthController::class, 'updateMemberSecurity'])->name('auth.member.updateMemberSecurity');
});


// Admin Authentication Required
Route::group(['middleware' => 'authCheckAdmin'], function () {
    Route::get('a/staff', [AdminAuthController::class, 'allAdmins']);
    Route::get('a/admins/blocked', [AdminAuthController::class, 'blockedAdmins']);
    Route::get('a/admin/logout', [AdminAuthController::class, 'logout']);
    Route::get('a/applications', [AdminAuthController::class, 'applications']);
    Route::get('a/applications/checked', [AdminAuthController::class, 'applicationChecked']);
    Route::get('a/application/checked/{id}', [AdminAuthController::class, 'applicationCheck']);
    Route::get('a/application/uncheck/{id}', [AdminAuthController::class, 'applicationUncheck']);
    Route::get('a/application/delete/{id}', [AdminAuthController::class, 'applicationDelete']);
    Route::get('a/dashboard', [AdminAuthController::class, 'dashboard']);
    Route::get('a/members', [AdminAuthController::class, 'allMembers']);
    Route::get('a/member/add', [AdminAuthController::class, 'registerMember']);
    Route::get('a/member/view/{id}', [AdminAuthController::class, 'memberView']);
    Route::get('a/member/block/{id}', [AdminAuthController::class, 'memberBlock']);
    Route::get('a/member/unblock/{id}', [AdminAuthController::class, 'memberUnblock']);
    Route::get('a/member/delete/{id}', [AdminAuthController::class, 'memberDelete']);
    Route::get('a/profile', [AdminAuthController::class, 'profile']);
    Route::get('a/profile/update', [AdminAuthController::class, 'updateView']);

    Route::post('a/member/add', [AdminAuthController::class, 'createMember'])->name('auth.member.add');
    Route::post('updateAdmin', [AdminAuthController::class, 'updateAdmin'])->name('auth.admin.updateAdmin');
    Route::post('updateAdminSecurity', [AdminAuthController::class, 'updateAdminSecurity'])->name('auth.admin.updateAdminSecurity');
});


// Super Admin Authentication Required
Route::group(['middleware' => 'authCheckSuperAdmin'], function () {
    Route::get('a/admins', [AdminAuthController::class, 'activeAdmins']);
    Route::get('a/admin/add', [AdminAuthController::class, 'register']);
    Route::get('a/admin/edit', [AdminAuthController::class, 'edit']);
    Route::get('a/admin/edit/{id}', [AdminAuthController::class, 'makeEdit']);
    Route::get('a/admin/delete/{id}', [AdminAuthController::class, 'deleteAdminBySuper']);
    Route::get('a/admin/block/{id}', [AdminAuthController::class, 'adminBlock']);
    Route::get('a/admin/unblock/{id}', [AdminAuthController::class, 'adminUnblock']);

    Route::post('updateAdminBySuper', [AdminAuthController::class, 'updateAdminBySuper'])->name('auth.admin.updateAdminBySuper');
    Route::post('updateAdminSecurityBySuper', [AdminAuthController::class, 'updateAdminSecurityBySuper'])->name('auth.admin.updateAdminSecurityBySuper');
    Route::post('a/admin/add', [AdminAuthController::class, 'createAdmin'])->name('auth.admin.register');
});
