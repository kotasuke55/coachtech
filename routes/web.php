<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/',[ContactController::class,'index']);
Route::post('/',[ContactController::class,'post']);
Route::post('/confirm',[ContactController::class,'regist']);
Route::get('/management',[ContactController::class,'management']);
Route::post('/management/delete',[ContactController::class,'remove']);
