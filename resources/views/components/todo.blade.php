<a id="todo-item-{{ $this->id }}" href="#" @class([
    'todo-item group card card-border bg-base-100 shadow-sm transition-all duration-200 outline-none motion-safe:hover:-translate-y-0.5 hover:shadow-md focus-visible:ring-2 focus-visible:ring-primary',
    'opacity-60' => $this->done,
]) hx-post="{{ $this->action('toggle') }}" hx-target="this" hx-swap="outerHTML">
    <div class="card-body flex-row items-center gap-4 px-5 py-4">
        <input type="checkbox" @checked($this->done) tabindex="-1"
            class="checkbox checkbox-success rounded-full" />

        <h2 @class(['flex-1 text-lg font-medium', 'line-through' => $this->done])>{{ $this->title }}</h2>

        <button type="button" class="btn btn-ghost btn-circle btn-sm text-base-content/50 hover:text-error" aria-label="Remove"
            hx-delete="{{ $this->action('remove') }}" hx-target="closest .todo-item" hx-swap="delete swap:500ms"
            hx-trigger="click consume">
            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
</a>
