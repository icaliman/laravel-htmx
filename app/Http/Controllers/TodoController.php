<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\View\Components\Todo;
use App\View\Components\TodoCounter;
use App\View\Components\TodoForm;
use App\View\Components\Todos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Todos::make()->renderPage();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request)
    {
        $todos = $request->session()->get('todos-list', []);
        $data = $request->validated();
        $data['id'] = count($todos) + 1;
        $todos = collect($todos)->prepend($data);
        $request->session()->put('todos-list', $todos);

        // Update only the components that need to be updated: forn, counter and current todo
        return join([
            TodoForm::make(),
            TodoCounter::make(['todos' => $todos]),
            Todo::make($data),
        ]);
    }

    /**
     * Not used. For demonstration purposes only.
     *
     * Store a newly created resource in storage.
     */
    public function storeWithValidator(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            // Update only the form component with the errors
            return TodoForm::make(['errors' => $validator->errors()]);
        }

        $todos = $request->session()->get('todos-list', []);
        $data = $validator->validated();
        $data['id'] = count($todos) + 1;
        $todos = collect($todos)->prepend($data);
        $request->session()->put('todos-list', $todos);

        // Update only the components that need to be updated: forn, counter and current todo
        return join([
            TodoForm::make(),
            TodoCounter::make(['todos' => $todos]),
            Todo::make($data),
        ]);
    }

    /**
     * Toggle todo status.
     */
    public function toggle(Request $request, int $id)
    {
        $todos = $request->session()->get('todos-list', []);

        $todos = collect($todos)->map(function ($item) use ($id) {
            if ($item['id'] === $id) {
                $item['done'] = !isset($item['done']) || !$item['done'];
            }

            return $item;
        });


        $request->session()->put('todos-list', $todos);

        return join([
            Todo::make($todos->firstWhere('id', $id)),
            TodoCounter::make(['todos' => $todos]),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, int $id)
    {
        $todos = $request->session()->get('todos-list', []);

        $todos = collect($todos)->where('id', '!=', $id);

        $request->session()->put('todos-list', $todos);

        return join([
            TodoCounter::make(['todos' => $todos]),
        ]);
    }

    /**
     * Not used. For demonstration purposes only.
     *
     * Validate the form.
     */
    public function validateForm(Request $request)
    {
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
    }
}
