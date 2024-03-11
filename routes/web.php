<?php

use App\Http\Requests\HtmxRequest;
use App\View\Components\Todo;
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

Route::post('/store', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'title' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return TodoForm::make(['errors' => $validator->errors()]);
    }

    $todos = $request->session()->get('todos-list', []);
    $data = $validator->validated();
    $data['id'] = count($todos) + 1;
    $todos = collect($todos)->prepend($data);
    $request->session()->put('todos-list', $todos);

    return TodoForm::make() . Todo::make($data);
});

Route::post('/toggle/{todo}', function (Request $request, int $todo) {
    $todos = $request->session()->get('todos-list', []);
    $todoItem = collect($todos)->firstWhere('id', $todo);
    $todoItem['done'] = !isset($todoItem['done']) || !$todoItem['done'];
    $todos = collect($todos)->where('id', '!=', $todo);

    if ($todoItem['done']) {
        $todos = $todos->push($todoItem);
    } else {
        $todos = $todos->prepend($todoItem);
    }

    $request->session()->put('todos-list', $todos);

    return Todo::make($todoItem);
});


Route::post('/validate', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'title' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return TodoForm::make([
            'title' => $request->get('title'),
            'errors' => $validator->errors()
        ]);
    }

    return TodoForm::make([
        'title' => $request->get('title'),
    ]);
});
