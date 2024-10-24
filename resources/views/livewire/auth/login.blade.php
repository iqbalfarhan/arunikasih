<div class="card max-w-sm border-0">
    <form class="card-body" wire:submit="login">
        <div class="card-title">Masuk ke arunikasih</div>
        <div class="py-4 space-y-1">
            <label @class([
                'input input-bordered flex items-center gap-2',
                'input-error' => $errors->first('email'),
            ])>
                <x-tabler-at class="size-5" />
                <input type="email" class="grow border-0" placeholder="Username" wire:model="email"
                    autocomplete="email" />
            </label>
            <label @class([
                'input input-bordered flex items-center gap-2',
                'input-error' => $errors->first('password'),
            ])>
                <x-tabler-key class="size-5" />
                <input type="password" class="grow border-0" placeholder="Password" wire:model="password" />
            </label>
        </div>
        <div class="card-actions">
            <button class="btn btn-primary">
                <x-tabler-login class="size-5" />
                <span>Login</span>
            </button>
        </div>
        <div class="divider my-6 text-xs opacity-50">Login dengan cara lain</div>
        <div class="card-actions">
            <button class="btn btn-block">
                <img src="{{ url('images/g-logo.png') }}" alt="" class="size-5">
                <span>Login dengan google</span>
            </button>
        </div>
    </form>
</div>
