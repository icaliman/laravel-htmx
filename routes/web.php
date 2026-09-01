<?php

use App\View\Components\Todos;
use Illuminate\Support\Facades\Route;

// The page is a component; every interaction is an action on a component,
// dispatched by Lamx through /lamx/{component}/{action}.
Route::get('/', Todos::class);
