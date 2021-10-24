<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\catController;
use App\Http\Controllers\Api\ExamController;
use App\Http\Controllers\Api\SkillController as ApiSkillController;
use App\Http\Controllers\SkillController as ControllersSkillController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/categories',[catController::class,'index']);
Route::get('/categories/show/{cat}',[catController::class,'show']);
Route::get('/skills',[ApiSkillController::class,'index']);
Route::get('/skills/show/{id}',[ApiSkillController::class,'show']);
Route::get('/exams/show/{id}',[ExamController::class,'show']);

// Route::get('exams/start/{id}',[ExamControlller::class,'start']);
// Route::post('/',[ExamController::class,'submit']);

Route::post('/register',[AuthController::class,'register']);


Route::middleware('auth:sanctum')->group(function(){


    Route::post('/exams/start/{id}',[ExamController::class,'start']);
    Route::post('/exams/submit/{id}',[ExamController::class,'submit']);
    Route::get('/exams/showQuestions/{id}',[ExamController::class,'showQuestions']);


});



