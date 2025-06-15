<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AttemptController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Auth::routes();
Route::controller(HomeController::class)->group(function (){
    Route::get('/courses', 'courses');
    Route::get('/dashboard', 'index')->middleware('auth');
    Route::get('/courses/{course}','courses_view');
    Route::get('/course/study/{slug}','courses_study')->middleware('auth');
    Route::get('/my-courses', 'mycourses')->middleware('auth');
});
Route::resources([
    'support'=>SupportController::class
]);
Route::middleware('auth')->group(function () {
    Route::resources([
        'theme'=>ThemeController::class,
        'course'=>CourseController::class,
        'module'=>ModuleController::class,
        'quiz'=>QuizController::class,
        'question'=>QuestionController::class,
        'answer'=>AnswerController::class,
        'attempt'=>AttemptController::class,
        'enroll'=>EnrollController::class,
        'user'=>UserController::class,
    ]);
    Route::get('/learners',function(){
        return view('dashboard.user.index',['title'=>'Learners']);
    });
    Route::get('/tutors', function () {
        return view('dashboard.user.index',['title'=>'Tutors']);
    });
});