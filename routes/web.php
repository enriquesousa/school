<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;



Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');


/*****************
* Users All Routes
******************/

// User CRUD
Route::prefix('users')->group(function(){
    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('user.add');
    Route::post('/store', [UserController::class, 'UserStore'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');
});

// User Profile y Cambiar Contraseña
Route::prefix('profile')->group(function () {

    Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    // Route::get('/advance/form', [ProfileController::class, 'ProfileAdvanceForm'])->name('profile.advance.form');
    Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
    Route::post('/update/password', [ProfileController::class, 'PasswordUpdate'])->name('profile.update.password');

});

// Setups - Configuraciones
Route::prefix('setups')->group(function () {

    // Materias - Student Class - CRUD
    Route::get('/student/class/view', [StudentClassController::class, 'StudentClassView'])->name('student.class.view');
    Route::get('/student/class/add', [StudentClassController::class, 'StudentClassAdd'])->name('student.class.add');
    Route::post('/store/student/class', [StudentClassController::class, 'StoreStudentClass'])->name('store.student.class');
    Route::get('/student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');
    Route::post('/update/student/class/{id}', [StudentClassController::class, 'UpdateStudentClass'])->name('update.student.class');
    Route::get('/delete/student/class/{id}', [StudentClassController::class, 'DeleteStudentClass'])->name('student.class.delete');

    // Año - Student Year - CRUD
    Route::get('/student/year/view', [StudentYearController::class, 'StudentYearView'])->name('student.year.view');
    Route::get('/student/year/add', [StudentYearController::class, 'StudentYearAdd'])->name('student.year.add');
    Route::post('/store/student/year', [StudentYearController::class, 'StudentStoreYear'])->name('store.student.year');
    Route::get('/student/year/edit/{id}', [StudentYearController::class, 'StudentYearEdit'])->name('student.year.edit');
    Route::post('/update/student/year/{id}', [StudentYearController::class, 'UpdateStudentYear'])->name('update.student.year');
    Route::get('/delete/student/year/{id}', [StudentYearController::class, 'DeleteStudentYear'])->name('student.year.delete');

     // Grupo - Student Group - CRUD
     Route::get('/student/group/view', [StudentGroupController::class, 'StudentGroupView'])->name('student.group.view');
     Route::get('/student/group/add', [StudentGroupController::class, 'StudentGroupAdd'])->name('student.group.add');
     Route::post('/store/student/group', [StudentGroupController::class, 'StudentStoreGroup'])->name('store.student.group');
     Route::get('/student/group/edit/{id}', [StudentGroupController::class, 'StudentGroupEdit'])->name('student.group.edit');
     Route::post('/update/student/group/{id}', [StudentGroupController::class, 'UpdateStudentGroup'])->name('update.student.group');
     Route::get('/delete/student/group/{id}', [StudentGroupController::class, 'DeleteStudentGroup'])->name('student.group.delete');


});






