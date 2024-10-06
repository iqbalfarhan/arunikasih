<div class="card max-w-sm border-0 shadow-xl">
    <form class="card-body" wire:submit="register">
        <div class="card-title">Register</div>
        <div class="py-4 space-y-1">
            <label @class([
                'input input-bordered flex items-center gap-2',
                'input-error' => $errors->first('name'),
            ])>
                <x-tabler-user class="size-5" />
                <input type="text" class="grow" placeholder="Nama lengkap" wire:model="name" autocomplete="name" />
            </label>
            <label @class([
                'input input-bordered flex items-center gap-2',
                'input-error' => $errors->first('email'),
            ])>
                <x-tabler-at class="size-5" />
                <input type="email" class="grow" placeholder="Username" wire:model="email" autocomplete="email" />
            </label>
            <label @class([
                'input input-bordered flex items-center gap-2',
                'input-error' => $errors->first('password'),
            ])>
                <x-tabler-key class="size-5" />
                <input type="password" class="grow" placeholder="Password" wire:model="password" />
            </label>
        </div>
        <div class="card-actions">
            <button class="btn btn-primary">
                <x-tabler-login class="size-5" />
                <span>Register</span>
            </button>
        </div>
    </form>
</div>
