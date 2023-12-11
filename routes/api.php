<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\StudentsController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
         //select all books
    Route::get('/books',[BooksController::class,'books']);
        //select books by id
    Route::get('/books/{id}',[BooksController::class,'book']);

     //select all students
    Route::get('/students',[StudentsController::class,'students']);
    //select students by id
    Route::get('/students/{id}',[StudentsController::class,'student']);
   

 Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
     return $request->user();
     Route::post('/stores',[BooksController::class,'post']);
    Route::put('/update',[BooksController::class,'update']);
    Route::delete('/books/{id}',[BooksController::class,'delete']);

     //store or post the students info
     Route::post('/store',[StudentsController::class,'store']);
     //update the students data
     Route::put('/update',[StudentsController::class,'update']);
     //delete the data of students
    Route::delete('/students/{id}',[BooksController::class,'destroy']);
  

 });

//to login
Route::post('/login',[AuthController::class,'login']);