<div id="todos" class="mt-8">
    <x-todo-counter />

    <div id="todos-list" class="grid grid-cols-1 gap-3 lg:gap-4">
        @foreach ($todos as $todo)
            <x-todo :id="$todo['id']" :title="$todo['title']" :done="$todo['done'] ?? false" />
        @endforeach
    </div>
</div>
