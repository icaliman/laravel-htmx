<div id="todos" class="w-full">
    <x-todo-counter />

    <div id="todos-list" class="flex flex-col gap-3">
        @foreach ($todos as $todo)
            <x-todo :id="$todo['id']" :title="$todo['title']" :done="$todo['done'] ?? false" />
        @endforeach
    </div>
</div>
