<div class="navbar">
    <div class="navbar-start">
        <label for="drawer" class="btn btn-circle btn-ghost">
            <x-tabler-menu class="size-5" />
        </label>
    </div>
    <div class="navbar-center">
        <a href="{{ route('undangan.show', $undangan) }}" class="btn btn-ghost text-xl capitalize" wire:navigate>
            {{ $undangan->kategori->name }}
            {{ $undangan->name }}
        </a>
    </div>
    <div class="navbar-end">
        <ul class="menu menu-horizontal">
            <li>
                <a href="{{ route('undangan.preview', $undangan) }}" target="_blank">
                    <x-tabler-logout class="size-5" />
                    <span>Preview</span>
                </a>
            </li>
        </ul>
    </div>
</div>
