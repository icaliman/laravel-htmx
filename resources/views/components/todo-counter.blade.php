<div id="todo-counter" class="mt-10 mb-3 text-center text-sm text-base-content/60" hx-swap-oob="true">
    @if ($count > 0)
        <span class="text-lg font-semibold text-base-content">{{ $count }}</span>
        <span>/ {{ $done }} done</span>
    @else
        <span>No tasks yet</span>
    @endif
</div>
