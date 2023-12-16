<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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
    Route::get('/', 'index')->name('homepage');
    Route::get('/about', 'AboutUs');
    Route::get('/cont', 'contactus');
    Route::get('/deparment/computer','Deparment_ce');
    Route::get('/deparment/graphics','Deparment_gd');
    Route::post('/subscribe', 'addsubscribe');
    Route::post('/contactinfo', 'contact_info');
    Route::post('/requestquote', 'addrequestquote')->name('requestq');

});


//all middleware controller
Route::group(['middleware'=>['web', 'checkAdmin']], function(){
    Route::controller(TeacherController::class)->group(function (){
        Route::get('/admin/dashboard',  'index')->name('dashboard');
        Route::get('/admin/allteacherinfo',  'allteacherifno')->name('info');
        Route::post('/admin/addnewteacher',  'addnewteacer')->name('addnew');
        Route::get('/admin/add', 'showform')->name('show');
        Route::get('admin/edit/{id}',  'edit')->name('teachersedit');
        Route::post('/admin/update-profile',  'update')->name('update');
        Route::get('/admin/destory/{id}',  'destroy')->name('deleteprofile');

        //subscribe info
        Route::get('/subscribe',  'allsubscribe')->name('user.sub.info');
        Route::get('/deletesubscribe/{email}',  'subscribedestroy');
        //contrct info
        Route::get('/contactinfo',  'allcontactinfo')->name('user.contact.info');
        Route::get('/deletecontactinfo/{email}', 'contactinfodelete');

        //request Quote info
        Route::get('/admin/requestinfo',  'requestinfo')->name('req.info');
        Route::get('/admin/requestq/destroy/{id}', 'requestinfodelete')->name('destroy.req');

        //student
    Route::controller(StudentController::class)->group(function(){
        Route::get('/admin/student-info',  'index')->name('studentinfo');
        Route::get('/admin/student-form',  'studentform')->name('student.form');
        Route::post('/admin/add-student', 'addnewstudent')->name('add.new.student');
        Route::get('/admin/student-edit/{id}', 'editstudent')->name('edit.student');
        Route::post('/admin/student/update-profile/{id}', 'updateprofile')->name('students.update');
        Route::get('/admin/student/destroy/{id}',  'destroy')->name('destroy');
        });
    });

});

//login and logout
Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'loginform')->name('login.form');
    Route::post('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('log.out');

});


