<div id="todos" class="mt-8 grid grid-cols-1 gap-3 lg:gap-4" hx-swap-oob="true">
    @foreach ($todos as $todo)
        <x-todo :title="$todo['title']" />
    @endforeach
</div>
