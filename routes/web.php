<?php

use App\Http\Controllers\AcademicYear;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('login', [AdminController::class, 'index'])->name('admin.login');
        Route::get('register', [AdminController::class, 'register'])->name('admin.register');
        Route::post('login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
    });
    Route::group(['middleware' => 'admin.auth'], function () {
        //
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('form', [AdminController::class, 'form'])->name('admin.form');
        Route::get('table', [AdminController::class, 'table'])->name('admin.table');
        Route::get('academic-year/create', [AcademicYearController::class, 'index'])->name('academic-year.create');
        Route::post('academic-year/store', [AcademicYearController::class, 'store'])->name('academic-year.store');
    });
});



//below routes are all before authentication/for guest so its placed in admin.auth
// Route::get('admin/login', [AdminController::class, 'index'])->name('admin.login');
// Route::get('admin/register', [AdminController::class, 'register'])->name('admin.register');
// Route::post('admin/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
// Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');




//below routes are all after authentication so its placed in admin.auth
// Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// Route::get('admin/form', [AdminController::class, 'form'])->name('admin.form');
// Route::get('admin/table', [AdminController::class, 'table'])->name('admin.table');
