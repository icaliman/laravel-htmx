<?php

use App\Http\Controllers\TodoController;
use App\Http\Requests\TodoRequest;
use App\View\Components\Todo;
use App\View\Components\TodoCounter;
use App\View\Components\TodoForm;
use App\View\Components\TodoList;
use App\View\Components\Todos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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

Route::get('/', Todos::class);
Route::post('/toggle/{todo}', [TodoController::class, 'toggle']);
Route::resource('/todos', TodoController::class)->only(['index', 'store', 'destroy']);

Route::post('/validate', [TodoController::class, 'validateForm']);
