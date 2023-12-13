<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/about', 'AboutUs');
    Route::get('/cont', 'contactus');
    Route::post('/subscribe', 'addsubscribe');
    Route::post('/contactinfo', 'contact_info');
    Route::post('/requestquote', 'addrequestquote')->name('requestq');

});



// ***ADMIN***
Route::get('adminlogin',[AdminController::class, 'admin_login']);
Route::get('dashboard', [AdminController::class, 'show_dashboard']);
Route::post('admin-dashboard',[AdminController::class, 'dashboard']);
Route::get('logout', [AdminController::class, 'logout']);

//Teacher
Route::get('/admin/dashboard', [TeacherController::class, 'index'])->name('dashboard');
Route::get('/admin/allteacherinfo', [TeacherController::class, 'allteacherifno'])->name('info');
Route::post('/admin/addnewteacher', [TeacherController::class, 'addnewteacer'])->name('addnew');
Route::get('/admin/add',[TeacherController::class, 'showform'])->name('show');
Route::get('admin/edit/{id}', [TeacherController::class, 'edit'])->name('teachersedit');
Route::post('/admin/update-profile', [TeacherController::class, 'update'])->name('update');
Route::get('/admin/destory/{id}', [TeacherController::class, 'destroy'])->name('deleteprofile');

// ***Subscribe MX**
Route::get('/subscribe', [TeacherController::class, 'allsubscribe']);
Route::get('/deletesubscribe/{email}', [TeacherController::class, 'subscribedestroy']);

// ***Contact Info**
Route::get('/contactinfo', [TeacherController::class, 'allcontactinfo']);
Route::get('/deletecontactinfo/{email}', [TeacherController::class, 'contactinfodelete']);

// ***Request A Quote Mx***


//controller Students
Route::get('/admin/student-info', [StudentController::class, 'index'])->name('studentinfo');
Route::get('/admin/student-form', [StudentController::class, 'studentform'])->name('student.form');
Route::post('/admin/add-student', [StudentController::class, 'addnewstudent'])->name('add.new.student');
Route::get('/admin/student-edit/{id}', [StudentController::class, 'editstudent'])->name('edit.student');
Route::post('/admin/student/update-profile/{id}', [StudentController::class, 'updateprofile'])->name('students.update');
Route::get('/admin/student/destroy/{id}', [StudentController::class, 'destroy'])->name('destroy');

