<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\student_management_controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\user_controller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AssignClassTeacherController;
use App\Http\Controllers\ClassTimetableController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExaminationController;

/* 
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//frontend
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

//Backend
Route::get('/login', [student_management_controller::class, 'login'])->name('login');
Route::post('/login', [student_management_controller::class, 'AuthLogin'])->name('login.post');

// Route::get('/login', [student_management_controller::class, 'login']); 
// Route::post('login', [student_management_controller::class, 'AuthLogin']); 
Route::get('logout', [student_management_controller::class, 'logout']); 
Route::get('forgot-password', [student_management_controller::class, 'forgotpassword']);
Route::post('forgot-password', [student_management_controller::class, 'postforgotpassword']);
Route::get('reset/{token}', [student_management_controller::class, 'reset']);

Route::post('reset/{token}', [student_management_controller::class, 'PostReset']);

    //Admin
    Route::group(['middleware' => 'admin'], function() {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
 
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']); 
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);

    //Teacher url
    Route::get('admin/teacher/list', [TeacherController::class, 'list']);
    Route::get('admin/teacher/add', [TeacherController::class, 'add']);
    Route::post('admin/teacher/add', [TeacherController::class, 'insert']);
    Route::get('admin/teacher/edit/{id}', [TeacherController::class, 'edit']);
    Route::post('admin/teacher/edit/{id}', [TeacherController::class, 'update']);
    Route::get('admin/teacher/delete/{id}', [TeacherController::class, 'delete']);

    //Student url 
     Route::get('admin/student/list', [StudentController::class, 'list']);
     Route::get('admin/student/add', [StudentController::class, 'add']);
     Route::post('admin/student/add', [StudentController::class, 'insert']);
     Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);
     Route::post('admin/student/edit/{id}', [StudentController::class, 'update']);
     Route::get('admin/student/delete/{id}', [StudentController::class, 'delete']);

    // Parents url
    Route::get('admin/parents/list', [ParentsController::class, 'list']);
    Route::get('admin/parents/add', [ParentsController::class, 'add']);
    Route::post('admin/parents/add', [ParentsController::class, 'insert']);
    Route::get('admin/parents/edit/{id}', [ParentsController::class, 'edit']);
    Route::post('admin/parents/edit/{id}', [ParentsController::class, 'update']);  
    Route::get('admin/parents/delete/{id}', [ParentsController::class, 'delete']);
    Route::get('admin/parents/my_student/{id}', [ParentsController::class, 'myStudent']);
    Route::get('admin/parents/assign_student_parent/{student_id}/{parent_id}', [ParentsController::class, 'AssignStudentParent']);
    Route::get('admin/parents/assign_student_parent_delete/{student_id}', [ParentsController::class, 'AssignStudentParentDelete']);

    //Class url
    Route::get('admin/class/list', [ClassController::class, 'list']);
    Route::get('admin/class/add', [ClassController::class, 'add']);
    Route::post('admin/class/add', [ClassController::class, 'insert']);
    Route::get('admin/class/edit/{id}', [ClassController::class, 'edit']);
    Route::post('admin/class/edit/{id}', [ClassController::class, 'update']);
    Route::get('admin/class/delete/{id}', [ClassController::class, 'delete']);

    //Subject url
    Route::get('admin/subject/list', [SubjectController::class, 'list']);
    Route::get('admin/subject/add', [SubjectController::class, 'add']);
    Route::post('admin/subject/add', [SubjectController::class, 'insert']);
    Route::get('admin/subject/edit/{id}', [SubjectController::class, 'edit']);
    Route::post('admin/subject/edit/{id}', [SubjectController::class, 'update']);
    Route::get('admin/subject/delete/{id}', [SubjectController::class, 'delete']);  

    //Assign-subject url
    Route::get('admin/assigned-subject/list', [ClassSubjectController::class, 'list']);
    Route::get('admin/assigned-subject/add', [ClassSubjectController::class, 'add']);
    Route::post('admin/assigned-subject/add', [ClassSubjectController::class, 'insert']);
    Route::get('admin/assigned-subject/edit/{id}', [ClassSubjectController::class, 'edit']);
    Route::post('admin/assigned-subject/edit/{id}', [ClassSubjectController::class, 'update']);
    Route::get('admin/assigned-subject/delete/{id}', [ClassSubjectController::class, 'delete']);
    Route::get('admin/assigned-subject/edit_single/{id}', [ClassSubjectController::class, 'edit_single']);
    Route::post('admin/assigned-subject/edit_single/{id}', [ClassSubjectController::class, 'update_single']);

    //Timetable url
    Route::get('admin/class_timetable/list', [ClassTimetableController::class, 'list']);
    Route::post('admin/class_timetable/get_subject', [ClassTimetableController::class, 'get_subject']);
    Route::post('admin/class_timetable/insert', [ClassTimetableController::class, 'insert']);

    //Assign-class-teacher url
    Route::get('admin/assigned_class_teacher/list', [AssignClassTeacherController::class, 'list']);
    Route::get('admin/assigned_class_teacher/add', [AssignClassTeacherController::class, 'add']);
    Route::post('admin/assigned_class_teacher/add', [AssignClassTeacherController::class, 'insert']);
    Route::get('admin/assigned_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'edit']);
    Route::post('admin/assigned_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'update']);
    Route::get('admin/assigned_class_teacher/edit_single/{id}', [AssignClassTeacherController::class, 'edit_single']);
    Route::post('admin/assigned_class_teacher/edit_single/{id}', [AssignClassTeacherController::class, 'update_single']);
    Route::get('admin/assigned_class_teacher/delete/{id}', [AssignClassTeacherController::class, 'delete']);


    //Examination url
    Route::get('admin/examination/exam/list', [ExaminationController::class, 'exam_list']);
    Route::get('admin/examination/exam/add', [ExaminationController::class, 'exam_add']);
    Route::post('admin/examination/exam/add', [ExaminationController::class, 'exam_insert']);
    Route::get('admin/examination/exam/edit/{id}', [ExaminationController::class, 'exam_edit']);
    Route::post('admin/examination/exam/edit/{id}', [ExaminationController::class, 'exam_update']);  
    Route::get('admin/examination/exam/delete/{id}', [ExaminationController::class, 'exam_delete']);

    //Examination schedule url
    Route::get('admin/examination/exam_schedule', [ExaminationController::class, 'exam_schedule']);
    Route::post('admin/examination/exam_schedule_insert', [ExaminationController::class, 'exam_schedule_insert']);
   
    //Account
    Route::get('admin/account', [user_controller::class, 'myAccount']);
    Route::post('admin/account', [user_controller::class, 'updateMyAccountAdmin']);
  
    //Change password
    Route::get('admin/change_password', [user_controller::class, 'change_password']);
    Route::post('admin/change_password', [user_controller::class, 'update_change_password']);

}); 

//Teacher
Route::group(['middleware' => 'teacher'], function() {
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);
 
    //Account
    Route::get('teacher/account', [user_controller::class, 'MyAccount']);
    Route::post('teacher/account', [user_controller::class, 'updateMyAccountTeacher']);

    //My Class & Subject
    Route::get('teacher/my_class_subject', [AssignClassTeacherController::class, 'myClassSubject']);

    //My Student
    Route::get('teacher/my_student', [StudentController::class, 'MyStudent']);

    //My Class Timetable
    Route::get('teacher/my_class_subject/class_timetable/{class_id}/{subject_id}', [ClassTimetableController::class, 'MyTimetableTeacher']);

    //Change password 
    Route::get('teacher/change_password', [user_controller::class, 'change_password']);
    Route::post('teacher/change_password', [user_controller::class, 'update_change_password']);
});

//Parents
Route::group(['middleware' => 'parents'], function() {
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);

    //Account
    Route::get('parent/my_account', [user_controller::class, 'myAccount']);
    Route::post('parent/my_account', [user_controller::class, 'updateMyAccountParents']);

    //My Student
    Route::get('parent/my_student', [ParentsController::class, 'myStudentParents']);

    //My Subject
    Route::get('parent/my_student/subject/{student_id}', [SubjectController::class, 'ParentStudentSubject']);
    //My Class Timetable
    Route::get('parent/my_student/subject/class_timetable/{class_id}/{subject_id}/{student_id}', [ClassTimetableController::class, 'MyTimetableParents']);

    //Change password
    Route::get('parent/change_password', [user_controller::class, 'change_password']);
    Route::post('parent/change_password', [user_controller::class, 'update_change_password']);
});

//Student
Route::group(['middleware' => 'student'], function() {
    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);

    //My Subject
    Route::get('student/my_subject', [SubjectController::class, 'MySubject']);

    //My Timetable
    Route::get('student/my_timetable', [ClassTimetableController::class, 'MyTimetable']);

    // Exam Timetable
    Route::get('student/my_exam_timetable', [ExaminationController::class, 'MyExamTimetable']);


    //Account
    Route::get('admin/student/account', [user_controller::class, 'myAccount']);
    Route::post('admin/student/account', [user_controller::class, 'updateMyAccountStudent']);

    //Change password student
    Route::get('student/change_password', [user_controller::class, 'change_password']);
    Route::post('student/change_password', [user_controller::class, 'update_change_password']);
});


