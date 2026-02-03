<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboardController;
use App\Http\Controllers\SuperAdmin\InvitationController as SuperAdminInvitationController;
use App\Http\Controllers\SuperAdmin\ShortUrlController as SuperAdminShortUrlController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\InvitationController as AdminInvitationController;
use App\Http\Controllers\Admin\ShortUrlController as AdminShortUrlController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;
use App\Http\Controllers\Member\ShortUrlController as MemberShortUrlController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        $user = auth()->user();

        if ($user->hasRole('SuperAdmin')) {
            return redirect('/superadmin/dashboard');
        }

        if ($user->hasRole('Admin')) {
            return redirect('/admin/dashboard');
        }

        if ($user->hasRole('Member')) {
            return redirect('/member/dashboard');
        }

        abort(403);
    });

    Route::middleware('role:SuperAdmin')->prefix('superadmin')->group(function () {
        Route::get('/dashboard', [SuperAdminDashboardController::class, 'index']);
        Route::get('/invite-admin', [SuperAdminInvitationController::class, 'create']);
        Route::post('/invite-admin', [SuperAdminInvitationController::class, 'store']);
        Route::get('/short-urls', [SuperAdminShortUrlController::class, 'index']);
    });

    Route::middleware('role:Admin')->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index']);
        Route::get('/invite-user', [AdminInvitationController::class, 'create']);
        Route::post('/invite-user', [AdminInvitationController::class, 'store']);
        Route::get('/short-urls', [AdminShortUrlController::class, 'index']);
        Route::get('/short-urls/create', [AdminShortUrlController::class, 'create']);
        Route::post('/short-urls', [AdminShortUrlController::class, 'store']);
    });

    Route::middleware('role:Member')->prefix('member')->group(function () {
        Route::get('/dashboard', [MemberDashboardController::class, 'index']);
        Route::get('/short-urls', [MemberShortUrlController::class, 'index']);
        Route::get('/short-urls/create', [MemberShortUrlController::class, 'create']);
        Route::post('/short-urls', [MemberShortUrlController::class, 'store']);
    });

});
