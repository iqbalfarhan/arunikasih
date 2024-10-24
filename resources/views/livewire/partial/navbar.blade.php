<div class="navbar">
    <div class="navbar-start">
        <label for="drawer" class="btn btn-circle btn-ghost md:hidden">
            <x-tabler-menu class="size-5" />
        </label>
    </div>
    <div class="navbar-center">
        <a href="{{ route('home') }}" class="btn btn-ghost text-xl" wire:navigate>
            <span>{{ config('app.name') }}</span>
        </a>
    </div>
    <div class="navbar-end">
        <button class="btn btn-ghost btn-circle">
            <x-tabler-bell class="size-5" />
        </button>
        <a href="{{ route('profile') }}" class="btn btn-ghost btn-circle avatar" wire:navigate>
            <div class="w-10 rounded-full">
                <img alt="Tailwind CSS Navbar component" src="{{ $user->image }}" />
            </div>
        </a>
    </div>
</div>
