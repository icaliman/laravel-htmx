<div id="form" class="mt-16 flex flex-col gap-4 justify-center" hx-swap-oob="true">
    <form hx-post="{{ $this->action('save') }}" hx-target="#todos-list" hx-swap="afterbegin" class="relative">
        <input id="title" autofocus name="title" type="text" placeholder="What needs to be done?"
            value="{{ old('title') }}" @class([
                'input input-bordered w-full lg:w-96 pr-24',
                'input-error' => $errors->has('title'),
            ])>
        @error('title')
            <div class="text-error mt-2">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-sm bg-white top-2 absolute right-2">Submit</button>
    </form>
</div>
