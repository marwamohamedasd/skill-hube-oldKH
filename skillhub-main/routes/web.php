<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\langController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\admin\adminCatController;
use App\Http\Controllers\admin\adminExamController;
use App\Http\Controllers\admin\adminsController;
use App\Http\Controllers\admin\adminSkillController;
use App\Http\Controllers\admin\studentController;
use App\Http\Controllers\web\profile;
use App\Http\Controllers\web\profileController;

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

Route::middleware('lang')->group(function(){

    Route::get('/', [HomeController::class, 'index']);
    Route::get('categories/show/{id}',[CatController::class,'show']);
    Route::get('skills/show/{id}',[SkillController::class,'showSkills']);
    // Route::get('register',[SkillController::class,'showSkills']);
    Route::get('exam/show/{id}',[ExamController::class,'show']);
    Route::get('exams/questions/{id}',[ExamController::class,'questions']);
    Route::get('/contact',[ContactController::class,'index']);
    Route::get('/profile',[profile::class,'index']);
    Route::post('contact/message/send',[ContactController::class,'send']);
    Route::get('/profile',[profileController::class,'index'])->middleware(['auth','verified','student']);

});

Route::post('exams/start/{id}',[ExamController::class,'start']);
Route::post('exams/submit/{id}',[ExamController::class,'submit'])->middleware(['auth','verified','student']);

Route::get('lang/set/{lang}',[langController::class,'set']);

// dashbod route


Route::prefix('dashboard')->middleware(['auth','verified','can-enter-dashboard'])->group(function(){

Route::get('/',[AdminHomeController::class,'index']);

route::get('/categories',[adminCatController::class,'index']);
route::post('/categories/store',[adminCatController::class,'store']);
route::get('/categories/delete/{id}',[adminCatController::class,'delete']);
route::post('/categories/update',[adminCatController::class,'update']);
route::get('/categories/toggle/{id}',[adminCatController::class,'toggle']);


// skill admin controller

route::get('/skills',[adminSkillController::class,'index']);
route::post('/skills/store',[adminSkillController::class,'store']);
route::get('/skills/delete/{id}',[adminSkillController::class,'delete']);
route::post('/skills/update',[adminSkillController::class,'update']);
route::get('/skills/toggle/{id}',[adminSkillController::class,'toggle']);


// exam routes

route::get('/exams',[adminExamController::class,'index']);
route::get('exams/show/{exam}',[adminExamController::class,'show']);

route::get('exams/create',[adminExamController::class,'create']);
route::post('/exams/store',[adminExamController::class,'store']);

route::get('exams/create-questions/{exam}',[adminExamController::class,'createQuestions']);
route::post('exams/store-questions/{exam}',[adminExamController::class,'storeQuestions']);
route::get('exams/show-questions/{exam}/questions',[adminExamController::class,'showQuestions']);
route::get('/exams/edit-questions/{exam}/{question}',[adminExamController::class,'editQuestion']);
route::get('/exams/delete-questions/{exam}/{question}',[adminExamController::class,'deleteQuestion']);
route::post('/exams/update-questions/{exam}/{question}',[adminExamController::class,'updateQuestion']);


//student routes

Route::get('/students',[studentController::class,'index']);
Route::get('/students/show-scores/{id}',[studentController::class,'showScroes']);
Route::get('/students/open-exam/{studentId}/{examId}',[studentController::class,'openExam']);
Route::get('/students/close-exam/{studentId}/{examId}',[studentController::class,'closeExam']);

//admins routes



Route::middleware(['superadmin'])->group(function () {

    Route::get('/admins',[adminsController::class,'index']);
    Route::get('/admins/create',[adminsController::class,'create']);
    Route::post('/admins/store',[adminsController::class,'store']);
    Route::get('/admins/prompt/{user}',[adminsController::class,'prompt']);
    Route::get('/admins/deompt/{user}',[adminsController::class,'deompt']);
    Route::get('/admins/delete/{user}',[adminsController::class,'delete']);


});


Route::get('/messages',[MessageController::class,'index']);
Route::get('/messages/show/{message}',[MessageController::class,'show']);
Route::post('/admins/messages/response/{message}',[MessageController::class,'response']);


});
