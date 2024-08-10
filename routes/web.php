<?php

use App\Http\Controllers\AcademicYear;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AnnouncmentController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\FeeHeadController;
use App\Http\Controllers\FeeStructureController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\Announcment;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Rote::get('student/login', [UserController::class, 'index'])->name('student.login');
// Route::post('student/authenticate', [UserController::class, 'authenticate'])->name('student.authenticate');
// Route::get('student/dashboard', [UserController::class, 'dashboard'])->name('student.dashboard');
// Route::get('student/logout', [UserController::class, 'logout'])->name('student.logout');


Route::group(['prefix' => 'student'], function () {
    ///guest
    Route::group(['middleware' => 'guest'], function () {
        //
        Route::get('login', [UserController::class, 'index'])->name('student.login');
        Route::post('authenticate', [UserController::class, 'authenticate'])->name('student.authenticate');
    });



    //auth
    Route::group(['middleware' => 'auth'], function () {
        //
        Route::get('dashboard', [UserController::class, 'dashboard'])->name('student.dashboard');
        Route::get('logout', [UserController::class, 'logout'])->name('student.logout');
        Route::get('changePassword', [UserController::class, 'changePassword'])->name('student.changePassword');
        Route::post('updatePassword', [UserController::class, 'updatePassword'])->name('student.updatePassword');
    });
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


        /// Academic Year route
        Route::get('academic_year/create', [AcademicYearController::class, 'index'])->name('academic_year.create');
        Route::post('academic_year/store', [AcademicYearController::class, 'store'])->name('academic_year.store');
        Route::get('academic_year/read', [AcademicYearController::class, 'read'])->name('academic_year.read');
        Route::get('academic_year/edit/{id}', [AcademicYearController::class, 'edit'])->name('academic_year.edit');
        Route::delete('academic_year/delete/{id}', [AcademicYearController::class, 'delete'])->name('academic_year.delete');
        Route::put('academic_year/update/{id}', [AcademicYearController::class, 'update'])->name('academic_year.update');





        //Announcements Route
        Route::get('announcement/create', [AnnouncementController::class, 'index'])->name('announcement.create');
        Route::post('announcement/store', [AnnouncementController::class, 'store'])->name('announcement.store');
        Route::get('announcement/read', [AnnouncementController::class, 'read'])->name('announcement.read');
        Route::get('announcement/edit/{id}', [AnnouncementController::class, 'edit'])->name('announcement.edit');
        Route::put('announcement/update/{id}', [AnnouncementController::class, 'update'])->name('announcement.update');
        Route::delete('announcement/delete/{id}', [AnnouncementController::class, 'delete'])->name('announcement.delete');




        //Classes Route
        Route::get('class/create', [ClassesController::class, 'index'])->name('class.create');
        Route::post('class/store', [ClassesController::class, 'store'])->name('class.store');
        Route::get('class/read', [ClassesController::class, 'read'])->name('class.read');
        Route::get('class/edit/{id}', [ClassesController::class, 'edit'])->name('class.edit');
        Route::put('class/update/{id}', [ClassesController::class, 'update'])->name('class.update');
        Route::delete('class/delete/{id}', [ClassesController::class, 'delete'])->name('class.delete');



        //Fee Head manageements
        Route::get('feehead/create', [FeeHeadController::class, 'index'])->name('feehead.create');
        Route::post('feehead/store', [FeeHeadController::class, 'store'])->name('feehead.store');
        Route::get('feehead/read', [FeeHeadController::class, 'read'])->name('feehead.read');
        Route::get('feehead/edit/{id}', [FeeHeadController::class, 'edit'])->name('feehead.edit');
        Route::put('feehead/update/{id}', [FeeHeadController::class, 'update'])->name('feehead.update');
        Route::delete('feehead/delete/{id}', [FeeHeadController::class, 'delete'])->name('feehead.delete');

        //Fee Structure Route
        Route::get('feestructure/create', [FeeStructureController::class, 'index'])->name('feestructure.create');
        Route::post('feestructure/store', [FeeStructureController::class, 'store'])->name('feestructure.store');
        Route::get('feestructure/read', [FeeStructureController::class, 'read'])->name('feestructure.read');
        Route::get('feestructure/edit/{id}', [FeeStructureController::class, 'edit'])->name('feestructure.edit');
        Route::put('feestructure/update/{id}', [FeeStructureController::class, 'update'])->name('feestructure.update');
        Route::delete('feestructure/delete/{id}', [FeeStructureController::class, 'delete'])->name('feestructure.delete');


        Route::get('student/create', [StudentController::class, 'index'])->name('student.create');
        Route::post('student/store', [StudentController::class, 'store'])->name('student.store');
        Route::get('student/read', [StudentController::class, 'read'])->name('student.read');
        Route::get('student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
        Route::put('student/update/{id}', [StudentController::class, 'update'])->name('student.update');
        Route::delete('student/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
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
