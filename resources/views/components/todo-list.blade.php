<div id="todos" class="mt-8" hx-swap-oob="true">
    <x-todo-counter :todos="$todos" />

    <div id="todos-list" class="grid grid-cols-1 gap-3 lg:gap-4">
        @foreach ($todos as $todo)
            <x-todo :id="$todo['id']" :title="$todo['title']" :done="$todo['done'] ?? false" />
        @endforeach
    </div>
</div>
