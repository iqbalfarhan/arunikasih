<div class="navbar">
    <div class="navbar-start">
        <label for="drawer" class="btn btn-circle btn-ghost">
            <x-tabler-menu class="size-5" />
        </label>
    </div>
    <div class="navbar-center">
        <a href="{{ route('undangan.show', $undangan) }}" class="btn btn-ghost text-xl capitalize truncate" wire:navigate>
            <span class="hidden lg:block">{{ $undangan->kategori->name }} {{ $undangan->name }}</span>
        </a>
    </div>
    <div class="navbar-end">
        <ul class="menu menu-horizontal">
            <li>
                <a href="{{ route('undangan.preview', $undangan) }}" target="_blank">
                    <x-tabler-device-mobile class="size-5 hidden md:block" />
                    <span>Preview</span>
                </a>
            </li>
        </ul>
    </div>
</div>
