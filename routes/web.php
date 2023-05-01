<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;
// use App\Http\Controllers\Auth\RegisterController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', [TodoListController::class,'index'])->name('home');
Route::post('/todo', [TodoListController::class,'store'])->name('store');
Route::delete('/todo/{todolist:id}', [TodoListController::class,'destroy'])->name('destroy');
Route::post('/todo/iscompleted/{todolist:id}',[TodoListController::class,'iscompleted']);
Route::post('/todo/notcompleted/{todolist:id}',[TodoListController::class,'notcompleted']);
Route::get('/exportToDos', [TodoListController::class,'exportToDos'])->name('exportToDos');
Route::post('/importToDos', [TodoListController::class,'importToDos'])->name('importToDos');

// Route::put('/todo-list/{id}/status', [TodoListController::class,'updateStatus'])->name('updateStatus');



