<div id="todo-counter" class="text-gray-400 mt-4 mb-2 text-center" hx-swap-oob="true">
    @if ($count > 0)
        <span class="text-lg font-bold">{{ $count }}</span>
        <span class="text-sm">/</span>
        <span class="text-sm">{{ $done }} done</span>
    @else
        <span class="text-sm">No tasks</span>
    @endif
</div>
