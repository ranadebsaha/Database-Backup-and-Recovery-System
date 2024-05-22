<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/',[mainController::class,'view_form']);
Route::post('/',[mainController::class,'save_form']);
Route::get('/list',[mainController::class,'view_list']);
Route::get('/login',[mainController::class,'view_login']);
Route::post('/login',[mainController::class,'login']);
Route::get('/dashboard',[mainController::class,'view_dashboard']);
Route::get('/logout',[mainController::class,'logout']);
Route::get('/delete/{id}',[mainController::class,'delete']);
Route::get('/backup',[mainController::class,'backup']);
Route::get('/restore',[mainController::class,'restore']);