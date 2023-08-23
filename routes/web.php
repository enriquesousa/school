<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\ExamFeeController;
use App\Http\Controllers\Backend\Employee\EmployeeRegistrationController;
use App\Http\Controllers\Backend\Employee\EmployeeSalaryController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\EmployeeAttendanceController;


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

// Proteger todas las rutas con auth middleware
// Nos ayuda a proteger las rutas y si no estamos autorizados nos redirige a la ruta de login
Route::group(['middleware' => 'auth'], function () {

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

        // Student Class - Clases - CRUD
        Route::get('/student/class/view', [StudentClassController::class, 'StudentClassView'])->name('student.class.view');
        Route::get('/student/class/add', [StudentClassController::class, 'StudentClassAdd'])->name('student.class.add');
        Route::post('/store/student/class', [StudentClassController::class, 'StoreStudentClass'])->name('store.student.class');
        Route::get('/student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');
        Route::post('/update/student/class/{id}', [StudentClassController::class, 'UpdateStudentClass'])->name('update.student.class');
        Route::get('/delete/student/class/{id}', [StudentClassController::class, 'DeleteStudentClass'])->name('student.class.delete');

        // Student Year - Año - CRUD
        Route::get('/student/year/view', [StudentYearController::class, 'StudentYearView'])->name('student.year.view');
        Route::get('/student/year/add', [StudentYearController::class, 'StudentYearAdd'])->name('student.year.add');
        Route::post('/store/student/year', [StudentYearController::class, 'StudentStoreYear'])->name('store.student.year');
        Route::get('/student/year/edit/{id}', [StudentYearController::class, 'StudentYearEdit'])->name('student.year.edit');
        Route::post('/update/student/year/{id}', [StudentYearController::class, 'UpdateStudentYear'])->name('update.student.year');
        Route::get('/delete/student/year/{id}', [StudentYearController::class, 'DeleteStudentYear'])->name('student.year.delete');

        // Student Group - Materias - CRUD
        Route::get('/student/group/view', [StudentGroupController::class, 'StudentGroupView'])->name('student.group.view');
        Route::get('/student/group/add', [StudentGroupController::class, 'StudentGroupAdd'])->name('student.group.add');
        Route::post('/store/student/group', [StudentGroupController::class, 'StudentStoreGroup'])->name('store.student.group');
        Route::get('/student/group/edit/{id}', [StudentGroupController::class, 'StudentGroupEdit'])->name('student.group.edit');
        Route::post('/update/student/group/{id}', [StudentGroupController::class, 'UpdateStudentGroup'])->name('update.student.group');
        Route::get('/delete/student/group/{id}', [StudentGroupController::class, 'DeleteStudentGroup'])->name('student.group.delete');

        // Student Shift - Horario (Turno) - CRUD
        Route::get('/student/shift/view', [StudentShiftController::class, 'StudentShiftView'])->name('student.shift.view');
        Route::get('/student/shift/add', [StudentShiftController::class, 'StudentShiftAdd'])->name('student.shift.add');
        Route::post('/store/student/shift', [StudentShiftController::class, 'StoreStudentShift'])->name('store.student.shift');
        Route::get('/student/shift/edit/{id}', [StudentShiftController::class, 'StudentShiftEdit'])->name('student.shift.edit');
        Route::post('/update/student/shift/{id}', [StudentShiftController::class, 'UpdateStudentShift'])->name('update.student.shift');
        Route::get('/delete/student/shift/{id}', [StudentShiftController::class, 'DeleteStudentShift'])->name('student.shift.delete');

        // Fee Category - Categoría de Cobro - CRUD
        Route::get('/fee/category/view', [FeeCategoryController::class, 'FeeCategoryView'])->name('fee.category.view');
        Route::get('/fee/category/add', [FeeCategoryController::class, 'FeeCategoryAdd'])->name('fee.category.add');
        Route::post('/store/fee/category', [FeeCategoryController::class, 'StoreFeeCategory'])->name('store.fee.category');
        Route::get('/fee/category/edit/{id}', [FeeCategoryController::class, 'FeeCategoryEdit'])->name('fee.category.edit');
        Route::post('/update/fee/category/{id}', [FeeCategoryController::class, 'UpdateFeeCategory'])->name('update.fee.category');
        Route::get('/delete/fee/category/{id}', [FeeCategoryController::class, 'DeleteFeeCategory'])->name('fee.category.delete');

        // Fee Category Amount - monto de Cobro - CRUD
        Route::get('/fee/amount/view', [FeeAmountController::class, 'FeeAmountView'])->name('fee.amount.view');
        Route::get('/fee/amount/add', [FeeAmountController::class, 'FeeAmountAdd'])->name('fee.amount.add');
        Route::post('/store/fee/amount', [FeeAmountController::class, 'StoreFeeAmount'])->name('store.fee.amount');
        Route::get('/fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'EditFeeAmount'])->name('fee.amount.edit');
        Route::post('/update/fee/amount/{fee_category_id}', [FeeAmountController::class, 'UpdateFeeAmount'])->name('update.fee.amount');
        Route::get('/fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'FeeAmountDetails'])->name('fee.amount.details');

        // Exam Type - Tipo de Examen - CRUD
        Route::get('/exam/type/view', [ExamTypeController::class, 'ExamTypeView'])->name('exam.type.view');
        Route::get('/exam/type/add', [ExamTypeController::class, 'ExamTypeAdd'])->name('exam.type.add');
        Route::post('/store/exam/type', [ExamTypeController::class, 'StoreExamType'])->name('store.exam.type');
        Route::get('/exam/type/edit/{id}', [ExamTypeController::class, 'ExamTypeEdit'])->name('exam.type.edit');
        Route::post('/update/exam/type/{id}', [ExamTypeController::class, 'UpdateExamType'])->name('update.exam.type');
        Route::get('/delete/exam/type/{id}', [ExamTypeController::class, 'DeleteExamType'])->name('exam.type.delete');

        // School Subject - Cursos - CRUD
        Route::get('/school/subject/view', [SchoolSubjectController::class, 'SchoolSubjectView'])->name('school.subject.view');
        Route::get('/school/subject/add', [SchoolSubjectController::class, 'SchoolSubjectAdd'])->name('school.subject.add');
        Route::post('/store/school/subject', [SchoolSubjectController::class, 'StoreSchoolSubject'])->name('store.school.subject');
        Route::get('/school/subject/edit/{id}', [SchoolSubjectController::class, 'SchoolSubjectEdit'])->name('school.subject.edit');
        Route::post('/update/school/subject/{id}', [SchoolSubjectController::class, 'UpdateSchoolSubject'])->name('update.school.subject');
        Route::get('/delete/school/subject/{id}', [SchoolSubjectController::class, 'DeleteSchoolSubject'])->name('school.subject.delete');

        // Assign Subject - Asignar Materias - CRUD
        Route::get('/assign/subject/view', [AssignSubjectController::class, 'AssignSubjectView'])->name('assign.subject.view');
        Route::get('/assign/subject/add', [AssignSubjectController::class, 'AssignSubjectAdd'])->name('assign.subject.add');
        Route::post('/store/assign/subject', [AssignSubjectController::class, 'StoreAssignSubject'])->name('store.assign.subject');
        Route::get('/assign/subject/edit/{class_id}', [AssignSubjectController::class, 'EditAssignSubject'])->name('assign.subject.edit');
        Route::post('/update/assign/subject/{class_id}', [AssignSubjectController::class, 'UpdateAssignSubject'])->name('update.assign.subject');
        Route::get('/assign/subject/details/{class_id}', [AssignSubjectController::class, 'DetailsAssignSubject'])->name('assign.subject.details');

        // Designation - Designación - CRUD
        Route::get('/designation/view', [DesignationController::class, 'DesignationView'])->name('designation.view');
        Route::get('/designation/add', [DesignationController::class, 'DesignationAdd'])->name('designation.add');
        Route::post('/store/designation', [DesignationController::class, 'DesignationStore'])->name('designation.store');
        Route::get('/designation/edit/{id}', [DesignationController::class, 'DesignationEdit'])->name('designation.edit');
        Route::post('/update/designation/{id}', [DesignationController::class, 'DesignationUpdate'])->name('designation.update');
        Route::get('/delete/designation/{id}', [DesignationController::class, 'DesignationDelete'])->name('designation.delete');

    });

    // Admin Registro de Estudiantes
    Route::prefix('students')->group(function () {

        // Student Registration - Registro de Estudiante
        Route::get('/registration/view', [StudentRegController::class, 'StudentRegistrationView'])->name('student.registration.view');
        Route::get('/registration/add', [StudentRegController::class, 'StudentRegistrationAdd'])->name('student.registration.add');
        Route::post('/registration/store', [StudentRegController::class, 'StudentRegistrationStore'])->name('store.student.registration');
        Route::get('/year/class/wise', [StudentRegController::class, 'StudentSearchYearClassWise'])->name('student.year.class.wise');
        Route::get('/registration/edit/{student_id}', [StudentRegController::class, 'StudentRegistrationEdit'])->name('student.registration.edit');
        Route::post('/update/registration/{student_id}', [StudentRegController::class, 'StudentRegistrationUpdate'])->name('update.student.registration');
        Route::get('/registration/promotion/{student_id}', [StudentRegController::class, 'StudentRegistrationPromotion'])->name('student.registration.promotion');
        Route::post('/promotion/registration/update/{student_id}', [StudentRegController::class, 'StudentRegistrationPromotionUpdate'])->name('promotion.student.registration.update');
        Route::get('/registration/details/{student_id}', [StudentRegController::class, 'StudentRegistrationDetails'])->name('student.registration.details');

        // Student Role Generate - Generar Rol para Estudiante
        Route::get('/roll/generate/view', [StudentRollController::class, 'StudentRollView'])->name('roll.generate.view');
        Route::get('/reg/getstudents', [StudentRollController::class, 'GetStudents'])->name('student.registration.getstudents');
        Route::post('/roll/generate/store', [StudentRollController::class, 'StudentRollStore'])->name('roll.generate.store');

        // Registration Fee - Cargo Inscripción
        Route::get('/reg/fee/view', [RegistrationFeeController::class, 'RegistrationFeeView'])->name('registration.fee.view');
        Route::get('/reg/fee/classwisedata', [RegistrationFeeController::class, 'RegistrationFeeClassData'])->name('student.registration.fee.classwise.get');
        Route::get('/reg/fee/payslip', [RegistrationFeeController::class, 'RegistrationFeePayslip'])->name('student.registration.fee.payslip');

        // Monthly Fee - Cargo Mensual
        Route::get('/monthly/fee/view', [MonthlyFeeController::class, 'MonthlyFeeView'])->name('monthly.fee.view');
        Route::get('/monthly/fee/classwisedata', [MonthlyFeeController::class, 'MonthlyFeeClassData'])->name('student.monthly.fee.classwise.get');
        Route::get('/monthly/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePayslip'])->name('student.monthly.fee.payslip');

        // Exam Fee - Cargo Examen
        Route::get('/exam/fee/view', [ExamFeeController::class, 'ExamFeeView'])->name('exam.fee.view');
        Route::get('/exam/fee/classwisedata', [ExamFeeController::class, 'ExamFeeClassData'])->name('student.exam.fee.classwise.get');
        Route::get('/exam/fee/payslip', [ExamFeeController::class, 'ExamFeePayslip'])->name('student.exam.fee.payslip');

    });

    // Employees CRUD - Empleados
    Route::prefix('employees')->group(function () {

        // Employee Registration - Registro de Empleados
        Route::get('/registration/view', [EmployeeRegistrationController::class, 'EmployeeRegistrationView'])->name('employee.registration.view');
        Route::get('/registration/add', [EmployeeRegistrationController::class, 'EmployeeRegistrationAdd'])->name('employee.registration.add');
        Route::post('/registration/store', [EmployeeRegistrationController::class, 'EmployeeRegistrationStore'])->name('store.employee.registration');
        Route::get('/registration/edit/{id}', [EmployeeRegistrationController::class, 'EmployeeRegistrationEdit'])->name('employee.registration.edit');
        Route::post('/registration/update/{id}', [EmployeeRegistrationController::class, 'EmployeeRegistrationUpdate'])->name('update.employee.registration');
        Route::get('/registration/details/{id}', [EmployeeRegistrationController::class, 'EmployeeRegistrationDetails'])->name('employee.registration.details');

        // Employee Salary - Salario de Empleados
        Route::get('/salary/view', [EmployeeSalaryController::class, 'EmployeeSalaryView'])->name('employee.salary.view');
        Route::get('/salary/increment/{id}', [EmployeeSalaryController::class, 'EmployeeSalaryIncrement'])->name('employee.salary.increment');
        Route::post('/salary/update/increment/store/{id}', [EmployeeSalaryController::class, 'EmployeeSalaryUpdateIncrementStore'])->name('update.increment.store');
        Route::get('/salary/details/{id}', [EmployeeSalaryController::class, 'EmployeeSalaryDetails'])->name('employee.salary.details');

        // Employee Leave - Ausencias de Empleado
        Route::get('/ausencias/view', [EmployeeLeaveController::class, 'EmployeeLeaveView'])->name('employee.leave.view');
        Route::get('/ausencias/add', [EmployeeLeaveController::class, 'EmployeeLeaveAdd'])->name('employee.leave.add');
        Route::post('/ausencias/store', [EmployeeLeaveController::class, 'EmployeeLeaveStore'])->name('store.employee.leave');
        Route::get('/ausencias/edit/{id}', [EmployeeLeaveController::class, 'EmployeeLeaveEdit'])->name('employee.leave.edit');
        Route::post('/ausencias/update/{id}', [EmployeeLeaveController::class, 'EmployeeLeaveUpdate'])->name('update.employee.leave');
        Route::get('/ausencias/delete/{id}', [EmployeeLeaveController::class, 'EmployeeLeaveDelete'])->name('employee.leave.delete');

        // Employee Attendance - Model: EmployeeAttendance - Asistencia de Empleado
        Route::get('/attendance/view', [EmployeeAttendanceController::class, 'EmployeeAttendanceView'])->name('employee.attendance.view');
        Route::get('/attendance/add', [EmployeeAttendanceController::class, 'EmployeeAttendanceAdd'])->name('employee.attendance.add');
        Route::post('/attendance/store', [EmployeeAttendanceController::class, 'EmployeeAttendanceStore'])->name('store.employee.attendance');
        Route::get('/attendance/edit/{date}', [EmployeeAttendanceController::class, 'EmployeeAttendanceEdit'])->name('employee.attendance.edit');


    });


}); // End Middleware Auth



