<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;

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
Route::get('/',[AuthController::class,'index'])->name('login.view');
Route::get('/reg',[AuthController::class,'regView'])->name('reg.view');


Route::post('/reg-store',[AuthController::class,'regAction'])->name('reg.action');
Route::post('/login-action',[AuthController::class,'loginAction'])->name('login.action');



Route::group(['middleware'=>['verifyUserLogin']],function (){

    Route::get('/dashboard',[AuthController::class,'dashboardView'])->name('dashboard.view');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/quiz-list',[QuizController::class,'index'])->name('list.quiz');
    Route::get('/give-quiz/{id}',[QuizController::class,'joinQuiz'])->name('join.quiz');

    Route::post('/store-answer',[AnswerController::class,'store'])->name('store.answer');

    Route::get('/results',[ResultController::class,'index'])->name('results');

    Route::group(['middleware'=>['verifyAdmin']],function(){

        Route::get('/add-quiz',[QuizController::class,'addQuiz'])->name('add.quiz');



        Route::get('/add-question/{id}',[QuestionController::class,'addQuestion'])->name('add.question');

        Route::post('/store-quiz',[QuizController::class,'storeQuiz'])->name('store.quiz');

        Route::post('/store-question',[QuestionController::class,'storeQuestion'])->name('store.question');

    Route::get('/admin-dashboard',[AuthController::class,'adminDashboardView'])->name('admin.dashboard');

    });

});
