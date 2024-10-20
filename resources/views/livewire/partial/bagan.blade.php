<ul class="sidebar menu p-4 w-80 min-h-full text-base-content space-y-6">
    @role('user')
        <li>
            <a href="{{ route('undangan.mine') }}">
                <x-tabler-arrow-left class="size-5" />
                <span>Undangan saya</span>
            </a>
        </li>
    @else
        <li>
            <a href="{{ route('undangan.index') }}">
                <x-tabler-arrow-left class="size-5" />
                <span>Kembali</span>
            </a>
        </li>
    @endrole
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
                    <span>Tema Tampilan</span>
                </a>
            </li>
            @if (in_array('rsvp dan ucapan', $bagans))
                <li>
                    <a href="{{ route('undangan.guest', $undangan) }}" @class(['active' => Route::is('undangan.guest')]) wire:navigate>
                        <x-tabler-users class="size-5" />
                        <span>Daftar tamu</span>
                    </a>
                </li>
            @endif
            <li>
                <a href="{{ route('undangan.publish', $undangan) }}" @class(['active' => Route::is('undangan.publish')]) wire:navigate>
                    <x-tabler-send class="size-5" />
                    <span>Publish Undangan</span>
                </a>
            </li>
        </ul>
    </li>

    <li>
        <h2 class="menu-title">Bagan Undangan</h2>
        @if ($undangan->kategori->name == 'pernikahan')
            <ul>
                @if (in_array('cover undangan', $bagans))
                    <li>
                        <a href="{{ route('undangan.cover', $undangan) }}" @class(['active' => Route::is('undangan.cover')]) wire:navigate>
                            <x-tabler-notebook class="size-5" />
                            <span>Sampul Cover</span>
                        </a>
                    </li>
                @endif
                @if (in_array('data pengantin', $bagans))
                    <li>
                        <a href="{{ route('undangan.pengantin', $undangan) }}" @class(['active' => Route::is('undangan.pengantin')])
                            wire:navigate>
                            <x-tabler-users class="size-5" />
                            <span>Profile Pengantin</span>
                        </a>
                    </li>
                @endif
                @if (in_array('detail acara', $bagans))
                    <li>
                        <a href="{{ route('undangan.acara', $undangan) }}" @class(['active' => Route::is('undangan.acara')]) wire:navigate>
                            <x-tabler-clock class="size-5" />
                            <span>Akad & Resepsi</span>
                        </a>
                    </li>
                @endif
                @if (in_array('photo prewedding', $bagans))
                    <li>
                        <a href="{{ route('undangan.media', $undangan) }}" @class(['active' => Route::is('undangan.media')]) wire:navigate>
                            <x-tabler-photo class="size-5" />
                            <span>Gallery Prewedding</span>
                        </a>
                    </li>
                @endif
                @if (in_array('kisah cinta', $bagans))
                    <li>
                        <a href="{{ route('undangan.story', $undangan) }}" @class(['active' => Route::is('undangan.story')]) wire:navigate>
                            <x-tabler-heart class="size-5" />
                            <span>Kisah Cinta</span>
                        </a>
                    </li>
                @endif
                @if (in_array('live streaming', $bagans))
                    <li>
                        <a href="{{ route('undangan.livestreaming', $undangan) }}" @class(['active' => Route::is('undangan.livestreaming')])
                            wire:navigate>
                            <x-tabler-video class="size-5" />
                            <span>Live Streaming</span>
                        </a>
                    </li>
                @endif
                @if (in_array('hadiah dan rekening', $bagans))
                    <li>
                        <a href="{{ route('undangan.rekening', $undangan) }}" @class(['active' => Route::is('undangan.rekening')])
                            wire:navigate>
                            <x-tabler-gift class="size-5" />
                            <span>Hadiah & Rekening</span>
                        </a>
                    </li>
                @endif
            </ul>
        @elseif ($undangan->kategori->name == 'aqiqah')
            <ul>
                @if (in_array('cover undangan', $bagans))
                    <li>
                        <a href="{{ route('undangan.cover', $undangan) }}" @class(['active' => Route::is('undangan.cover')]) wire:navigate>
                            <x-tabler-notebook class="size-5" />
                            <span>Sampul Cover</span>
                        </a>
                    </li>
                @endif
                @if (in_array('data anak', $bagans))
                    <li>
                        <a href="{{ route('undangan.anak', $undangan) }}" @class(['active' => Route::is('undangan.anak')]) wire:navigate>
                            <x-tabler-user class="size-5" />
                            <span>Data anak</span>
                        </a>
                    </li>
                @endif
                @if (in_array('detail acara', $bagans))
                    <li>
                        <a href="{{ route('undangan.acara', $undangan) }}" @class(['active' => Route::is('undangan.acara')]) wire:navigate>
                            <x-tabler-clock class="size-5" />
                            <span>Waktu & tempat</span>
                        </a>
                    </li>
                @endif
            </ul>
        @endif
    </li>
</ul>
