<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AttemptController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();
Route::controller(HomeController::class)->group(function (){
    Route::get('/courses', 'courses');
});
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resources([
        'theme'=>ThemeController::class,
        'course'=>CourseController::class,
        'module'=>ModuleController::class,
        'quiz'=>QuizController::class,
        'question'=>QuestionController::class,
        'answer'=>AnswerController::class,
        'attempt'=>AttemptController::class,
        'enroll'=>EnrollController::class,
    ]);
});