<div id="form" class="mt-14 w-full" hx-swap-oob="true">
    <form hx-post="{{ $this->action('save') }}" hx-target="#todos-list" hx-swap="afterbegin" class="join w-full shadow-sm">
        <input id="title" autofocus name="title" type="text" placeholder="What needs to be done?"
            x-model="title" autocomplete="off" @class([
                'input input-lg join-item w-full',
                'input-error' => $errors->has('title'),
            ])>
        <button type="submit" class="btn btn-lg btn-primary join-item">Add</button>
    </form>
    <div class="mt-2 flex min-h-5 items-start justify-between gap-4 text-sm">
        @error('title')
            <p class="text-error">{{ $message }}</p>
        @else
            <span></span>
        @enderror
        <span class="text-base-content/50 tabular-nums" x-cloak x-show="title.length > 0"
            :class="{ 'text-error': title.length > 255 }"><span x-text="title.length"></span>/255</span>
    </div>
</div>
