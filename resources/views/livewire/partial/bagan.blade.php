<ul class="sidebar menu p-4 w-80 min-h-full text-base-content space-y-6">
    <li>
        <a href="{{ route('undangan.index') }}">
            <x-tabler-arrow-left class="size-5" />
            <span>Kembali</span>
        </a>
    </li>
    <li>
        <h2 class="menu-title">Dashboard</h2>
        <ul>
            <li>
                <a href="{{ route('undangan.show', $undangan) }}" @class(['active' => Route::is('undangan.show')]) wire:navigate>
                    <x-tabler-notebook class="size-5" />
                    <span>Resume Undangan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('undangan.setting', $undangan) }}" @class(['active' => Route::is('undangan.setting')]) wire:navigate>
                    <x-tabler-palette class="size-5" />
                    <span>Tema & Audio</span>
                </a>
            </li>
            <li>
                <a>
                    <x-tabler-message class="size-5" />
                    <span>Ucapan & Doa</span>
                </a>
            </li>
            <li>
                <a>
                    <x-tabler-users class="size-5" />
                    <span>Daftar tamu</span>
                </a>
            </li>
            <li>
                <a>
                    <x-tabler-send class="size-5" />
                    <span>Publish Undangan</span>
                </a>
            </li>
        </ul>
    </li>

    <li>
        <h2 class="menu-title">Bagan undangan pernikahan</h2>
        <ul>
            <li>
                <a href="{{ route('undangan.cover', $undangan) }}" @class(['active' => Route::is('undangan.cover')]) wire:navigate>
                    <x-tabler-notebook class="size-5" />
                    <span>Sampul Cover</span>
                </a>
            </li>
            <li>
                <a href="{{ route('undangan.pengantin', $undangan) }}" @class(['active' => Route::is('undangan.pengantin')]) wire:navigate>
                    <x-tabler-users class="size-5" />
                    <span>Profile Pengantin</span>
                </a>
            </li>
            <li>
                <a href="{{ route('undangan.acara', $undangan) }}" @class(['active' => Route::is('undangan.acara')]) wire:navigate>
                    <x-tabler-clock class="size-5" />
                    <span>Akad & Resepsi</span>
                </a>
            </li>
            <li>
                <a>
                    <x-tabler-photo class="size-5" />
                    <span>Gallery Prewedding</span>
                </a>
            </li>
            <li>
                <a>
                    <x-tabler-heart class="size-5" />
                    <span>Kisah Cinta</span>
                </a>
            </li>
            <li>
                <a>
                    <x-tabler-video class="size-5" />
                    <span>Live Streaming</span>
                </a>
            </li>
            <li>
                <a>
                    <x-tabler-gift class="size-5" />
                    <span>Hadiah & Rekening</span>
                </a>
            </li>
        </ul>
    </li>
</ul>
