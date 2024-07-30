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

        Route::get('academic_year/create', [AcademicYearController::class, 'index'])->name('academic_year.create');

        Route::post('academic_year/store', [AcademicYearController::class, 'store'])->name('academic_year.store');

        Route::get('academic_year/read', [AcademicYearController::class, 'read'])->name('academic_year.read');

        Route::get('academic_year/edit/{id}', [AcademicYearController::class, 'edit'])->name('academic_year.edit');

        Route::delete('academic_year/delete/{id}', [AcademicYearController::class, 'delete'])->name('academic_year.delete');

        Route::post('academic_year/update/{id}', [AcademicYearController::class, 'update'])->name('academic_year.update');
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
