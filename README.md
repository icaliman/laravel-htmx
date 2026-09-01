<p align="center"><img src="https://raw.githubusercontent.com/icaliman/laravel-htmx/master/public/screenshot-todos.png" width="100%" alt="Laravel + Htmx Logo"></p>

## Todo App made with Laravel and </> htmx

This app is built using [Lamx](https://github.com/xlited/lamx): every piece of UI is an
`HtmxComponent` that holds its state, its actions and its validation, and htmx 4 does the
transport.

- [`app/View/Components`](app/View/Components) — the page (`Todos`), the form (`TodoForm::save`),
  the list, the counter and a single todo (`Todo::toggle`, `Todo::remove`).
- [`resources/views/components`](resources/views/components) — their Blade views, using
  `$this->action('...')` for the htmx URLs.
- [`app/Support/TodoStore.php`](app/Support/TodoStore.php) — the todos live in the session.
- [`routes/web.php`](routes/web.php) — a single route: `Route::get('/', Todos::class)`.

Requires PHP 8.3+ (Laravel 13).

```bash
composer setup   # install, .env, app key
php artisan serve
php artisan test
```

The `xlited/lamx` package is installed from a Composer path repository pointing at `../lamx`,
so clone https://github.com/xlited/lamx next to this repository.
