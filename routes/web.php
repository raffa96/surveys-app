<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/survey/create', [SurveyController::class, 'create']);
Route::post('/survey/create', [SurveyController::class, 'store']);
Route::get('/survey/{survey}', [SurveyController::class, 'show']);
Route::get('/survey/{survey}/question/create', [QuestionController::class, 'create']);
Route::post('/survey/{survey}/question/create', [QuestionController::class, 'store']);
Route::delete('/survey/{survey}/question/{question}', [QuestionController::class, 'destroy']);
Route::get('/survey/take/{survey}-{slug}', [SurveyController::class, 'take']);
Route::post('/survey/take/{survey}-{slug}', [SurveyController::class, 'takeStore']);
