<?php

use App\Http\Controllers\TodoController;
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

Route::get('/todos', [TodoController::class, 'index'])->name('todo.index');
Route::get('/todos/create', [TodoController::class, 'create']);
Route::post('/todos/create', [TodoController::class, 'store']);
Route::get('/todos/{todo}/edit', [TodoController::class, 'edit']);
Route::patch('/todos/{todo}/update', [TodoController::class, 'update'])->name('todo.update');
Route::put('/todos/{todo}/complete', [TodoController::class, 'complete'])->name('todo.complete');

Route::get('/', function () {
    return view('welcome');
});
