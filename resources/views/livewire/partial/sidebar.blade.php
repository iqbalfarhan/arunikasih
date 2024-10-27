<ul class="sidebar menu p-4 w-80 min-h-full text-base-content space-y-6">
    <li>
        <h2 class="menu-title">Dashboard</h2>
        <ul>
            @can('home')
                <li>
                    <a href="{{ route('home') }}" @class(['active' => Route::is('home')]) wire:navigate>
                        <x-tabler-home class="size-5" />
                        <span>Dashboard</span>
                    </a>
                </li>
            @endcan
            @can('undangan.mine')
                <li>
                    <a href="{{ route('undangan.mine') }}" @class([
                        'active' => Route::is([
                            'undangan.index',
                            'undangan.create',
                            'undangan.show',
                            'undangan.raw',
                            'undangan.mine',
                        ]),
                    ]) wire:navigate>
                        <x-tabler-bookmark class="size-5" />
                        <span>Undangan Saya</span>
                    </a>
                </li>
            @endcan
            @can('pembayaran.mine')
                <li>
                    <a href="{{ route('pembayaran.mine') }}" @class([
                        'active' => Route::is(['pembayaran.mine', 'pembayaran.show']),
                    ]) wire:navigate>
                        <x-tabler-credit-card class="size-5" />
                        <span>Pembayaran</span>
                    </a>
                </li>
            @endcan
            @can('notif.index')
                <li>
                    <a href="{{ route('notif.index') }}" @class([
                        'active' => Route::is('notif.index'),
                    ]) wire:navigate>
                        <x-tabler-bell class="size-5" />
                        <span>Notifikasi</span>
                        @livewire('partial.notif-badge')
                    </a>
                </li>
            @endcan
            @can('rating.mine')
                <li>
                    <a href="{{ route('rating.mine') }}" @class(['active' => Route::is('rating.mine')]) wire:navigate>
                        <x-tabler-message class="size-5" />
                        <span>Penilaian & Saran</span>
                    </a>
                </li>
            @endcan
            @can('pembayaran.index')
                <li>
                    <a href="{{ route('pembayaran.index') }}" @class([
                        'active' => Route::is(['pembayaran.index', 'pembayaran.show']),
                    ]) wire:navigate>
                        <x-tabler-credit-card class="size-5" />
                        <span>Pembayaran</span>
                    </a>
                </li>
            @endcan
            @can('rating.index')
                <li>
                    <a href="{{ route('rating.index') }}" @class(['active' => Route::is('rating.index')]) wire:navigate>
                        <x-tabler-message class="size-5" />
                        <span>Testimoni Client</span>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
    @can('datamaster')
        <li>
            <h2 class="menu-title">Data master</h2>
            <ul>
                @can('kategori.index')
                    <li>
                        <a href="{{ route('kategori.index') }}" @class(['active' => Route::is('kategori.index')]) wire:navigate>
                            <x-tabler-tags class="size-5" />
                            <span>Kategori Undangan</span>
                        </a>
                    </li>
                @endcan
                @can('fitur.index')
                    <li>
                        <a href="{{ route('fitur.index') }}" @class(['active' => Route::is('fitur.index')]) wire:navigate>
                            <x-tabler-list class="size-5" />
                            <span>Daftar Fitur</span>
                        </a>
                    </li>
                @endcan
                @can('paket.index')
                    <li>
                        <a href="{{ route('paket.index') }}" @class(['active' => Route::is('paket.index')]) wire:navigate>
                            <x-tabler-credit-card class="size-5" />
                            <span>Paket & Harga</span>
                        </a>
                    </li>
                @endcan
                @canany(['music.index', 'ayat.index', 'bank.index', 'sosmed.index'])
                    <li>
                        <a href="{{ route('masters.index') }}" @class(['active' => Route::is('masters.index')]) wire:navigate>
                            <x-tabler-settings class="size-5" />
                            <span>List Data Master</span>
                        </a>
                    </li>
                @endcanany
                @can('tema.index')
                    <li>
                        <a href="{{ route('tema.index') }}" @class(['active' => Route::is('tema.index')]) wire:navigate>
                            <x-tabler-palette class="size-5" />
                            <span>Styling & Tema</span>
                        </a>
                    </li>
                @endcan
                @can('ornamen.index')
                    <li>
                        <a href="{{ route('ornamen.index') }}" @class(['active' => Route::is('ornamen.index')]) wire:navigate>
                            <x-tabler-leaf class="size-5" />
                            <span>Ornament Hias</span>
                        </a>
                    </li>
                @endcan
                @can('user.index')
                    <li>
                        <a href="{{ route('user.index') }}" @class(['active' => Route::is('user.index')]) wire:navigate>
                            <x-tabler-users class="size-5" />
                            <span>User Management</span>
                        </a>
                    </li>
                @endcan
                @can('permission.index')
                    <li>
                        <a href="{{ route('permission.index') }}" @class(['active' => Route::is('permission.index')]) wire:navigate>
                            <x-tabler-key class="size-5" />
                            <span>Role & Permission</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </li>
    @endcan
    <li>
        <h2 class="menu-title">Lainnya</h2>
        <ul>
            @can('database')
                <li>
                    <a href="/adminer">
                        <x-tabler-database class="size-5" />
                        <span>Adminer Database</span>
                    </a>
                </li>
            @endcan
            @can('about')
                <li>
                    <a href="{{ route('about') }}" @class(['active' => Route::is('about')]) wire:navigate>
                        <x-tabler-file class="size-5" />
                        <span>Tentang Arunikasih</span>
                    </a>
                </li>
            @endcan
            @can('profile')
                <li>
                    <a href="{{ route('profile') }}" @class(['active' => Route::is('profile')]) wire:navigate>
                        <x-tabler-user-circle class="size-5" />
                        <span>Edit Profile</span>
                    </a>
                </li>
            @endcan
            <li>
                <button wire:click="$dispatch('logout')">
                    <x-tabler-logout class="size-5" />
                    <span>Keluar Aplikasi</span>
                </button>
            </li>
        </ul>
    </li>
</ul>
