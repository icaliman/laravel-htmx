<div id="form" class="mt-14 w-full" hx-swap-oob="true">
    <form hx-post="{{ $this->action('save') }}" hx-target="#todos-list" hx-swap="afterbegin" class="join w-full shadow-sm">
        <input id="title" autofocus name="title" type="text" placeholder="What needs to be done?"
            value="{{ old('title') }}" autocomplete="off" @class([
                'input input-lg join-item w-full',
                'input-error' => $errors->has('title'),
            ])>
        <button type="submit" class="btn btn-lg btn-primary join-item">Add</button>
    </form>
    @error('title')
        <p class="mt-2 text-sm text-error">{{ $message }}</p>
    @enderror
</div>
