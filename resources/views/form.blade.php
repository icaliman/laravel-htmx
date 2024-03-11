@fragment('form')
    <div id="form" class="mt-16 flex flex-col gap-4 justify-center" hx-swap-oob="true">
        <form hx-post="/store" hx-target="#todos" hx-swap="afterbegin" class="join" {{-- hx-on::after-request=" if(event.detail.successful) this.reset()" --}}>
            <div>
                <input id="title" autofocus name="title" type="text" placeholder="Todo..." value="{{ $title ?? '' }}"
                    @class([
                        'input input-bordered join-item w-full max-w-xs',
                        'input-error' => $errors->has('title'),
                    ])>
                @if ($errors->has('title'))
                    <div class="text-error mt-2">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <button type="submit" class="btn bg-white join-item">Submit</button>
        </form>
    </div>
@endfragment
