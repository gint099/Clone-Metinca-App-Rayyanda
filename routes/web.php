<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageItemController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\Auth\AuthViewController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ItemApprovalController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('home.main');
});

require __DIR__ . '/auth.php';

// ============================================
// GUEST ROUTES (belum login)
// ============================================
Route::middleware('guest')->group(function () {

    // GET - Show Forms (Custom Views)
    Route::get('login', [AuthViewController::class, 'showLogin'])
        ->name('login');

    Route::get('register', [AuthViewController::class, 'showRegister'])
        ->name('register');

    Route::get('forgot-password', [AuthViewController::class, 'showForgotPassword'])
        ->name('password.request');

    Route::get('reset-password/{token}', [AuthViewController::class, 'showResetPassword'])
        ->name('password.reset');

    // POST - Handle Logic (Breeze Controllers)
    Route::post('register', [RegisteredUserController::class, 'store'])
        ->name('register.store');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->name('login.store');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.update');

    Route::prefix('home')->group(function () {

        Route::get('/', function () {
            return view('home.main');
        })->name('home.main');

        Route::get('/products', function () {
            return view('home.products');
        })->name('home.products');

        Route::get('/divisions', function () {
            return view('home.divisions');
        })->name('home.divisions');

        Route::get('/facilities', function () {
            return view('home.facilities');
        })->name('home.facilities');

        Route::get('/gallery', function () {
            return view('home.galleries');
        })->name('home.gallery');
    });
});

// ============================================
// Auth ROUTES (sudah login)
// ============================================


Route::middleware(['auth'])->group(function () {

    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

Route::middleware(['auth', 'roles:admin'])->group(function () {

    Route::get('/admin/manage-user', [ManageUserController::class, 'index'])
        ->name('admin.manageuser.index');

    Route::get('/admin/manage-user/{id}/edit', [ManageUserController::class, 'edit'])
        ->name('admin.manageuser.edit');

    Route::put('/admin/manage-user/{id}', [ManageUserController::class, 'update'])
        ->name('admin.manageuser.update');

    Route::delete('/admin/manage-user/{id}', [ManageUserController::class, 'destroy'])
        ->name('admin.manageuser.destroy');
});

Route::middleware(['auth', 'roles:quality-checker,pic'])->group(function () {

    Route::get('/checker/manage-item', [ManageItemController::class, 'index'])
        ->name('checker.manageitem.index');

    Route::get('/checker/manage-item/create', [ManageItemController::class, 'create'])
        ->name('checker.manageitem.create');

    Route::post('/checker/manage-item', [ManageItemController::class, 'store'])
        ->name('checker.manageitem.store');

    Route::get('/checker/manage-item/{item}/edit', [ManageItemController::class, 'edit'])
        ->name('checker.manageitem.edit');

    Route::put('/checker/manage-item/{item}', [ManageItemController::class, 'update'])
        ->name('checker.manageitem.update');

    Route::delete('/checker/manage-item/{item}', [ManageItemController::class, 'destroy'])
        ->name('checker.manageitem.destroy');
});

Route::middleware(['auth', 'roles:pic'])->group(function () {

    Route::get('/item-approval', [ItemApprovalController::class, 'index'])
        ->name('pic.item.index');

    Route::put('/item-approval/{item}/approve', [ItemApprovalController::class, 'approve'])
        ->name('pic.item.approve');
});
