<a id="todo-item-{{ $id }}" href="#" @class([
    'todo-item scale-100 px-6 py-4 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500',
    'opacity-50 line-through' => $done,
    'transition-all h-0 py-0' => $deleted,
]) hx-post="/toggle/{{ $id }}"
    hx-target="this" hx-swap="outerHTML">
    <div class="w-full flex justify-between">
        <h2 class="flex items-center gap-2 text-xl font-semibold text-gray-900 dark:text-white">
            <input type="checkbox" @if ($done) checked="checked" @endif
                class="checkbox checkbox-lg checkbox-success border-base-300 rounded-full p-2" />

            {{ $title }}
        </h2>
        <button class="btn btn-xs btn-ghost btn-circle" hx-delete="/todos/{{ $id }}"
            hx-swap="outerHTML swap:500ms" hx-trigger="click consume">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
    </div>
</a>
