<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/',[mainController::class,'view_form']);
Route::post('/',[mainController::class,'save_form']);
Route::get('/list',[mainController::class,'view_list']);