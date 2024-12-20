<div>
    <div class="page-wrapper">

        @livewire('partial.header', [
            'title' => 'Status undangan',
        ])

        <div class="grid md:grid-cols-3 gap-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        <x-tabler-bookmark class="size-5" />
                        <span>Undangan {{ $undangan->kategori->name }}</span>
                    </h3>
                    <p class="text-sm opacity-50 line-clamp-2">
                        Undangan {{ $undangan->kategori->name }} {{ $undangan->name }} paket
                        {{ $undangan->paket->name }}
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h3 @class(['card-title', 'text-error' => $undangan->paid == false])>
                        <x-tabler-credit-card class="size-5" />
                        <span>Pembayaran {{ $undangan->paid ? 'selesai' : 'tertunda' }}</span>
                    </h3>
                    <p class="text-sm opacity-50 line-clamp-2">Status pembayaran
                        {{ $undangan->paid ? 'telah di konfirmasi' : 'belum dikonfimasi' }}
                        @if ($undangan->paid)
                            pada tanggal
                            {{ $undangan->pembayaran->confirmed_at?->format('d F Y H:i') }}
                        @else
                            silakan lakukan pembayaran.
                        @endif
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        <x-tabler-send class="size-5" />
                        <span>{{ $undangan->shared ? 'Sudah' : 'Belum' }} publish</span>
                    </h3>
                    <p class="text-sm opacity-50 line-clamp-2">Undangan anda saat ini
                        {{ $undangan->shared ? 'sudah' : 'belum' }} publish, masuk ke menu publish
                        undangan untuk mengubah status
                    </p>
                </div>
            </div>
            <div class="card bg-base-100">
                <div class="card-body">
                    <div class="flex justify-between w-full items-center">
                        <a href="{{ route('undangan.setting', $undangan->id) }}">
                            <h4 class="card-title capitalize flex items-center gap-2">
                                <x-tabler-palette class="size-5" />
                                <span>Tema {{ $undangan->tema->name }}</span>
                            </h4>
                        </a>
                        <div class="flex gap-1 bg-base-300 p-1 rounded-box" data-theme="{{ $undangan->tema->name }}">
                            @foreach (['bg-primary', 'bg-secondary', 'bg-accent', 'bg-info'] as $color)
                                <span class="size-2 rounded-box {{ $color }}"></span>
                            @endforeach
                        </div>
                    </div>
                    <p class="text-sm opacity-50 line-clamp-2">Menggunakan tema {{ $undangan->tema->name }} dan
                        ornament
                        {{ $undangan->ornament->name ?? '' }}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('undangan.preview', $undangan) }}" target="_blank">
                        <h3 class="card-title">
                            <x-tabler-zoom-in-area class="size-5" />
                            <span>Preview undangan</span>
                        </h3>
                    </a>
                    <p class="text-sm opacity-50 line-clamp-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Optio, dolore?
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="page-wrapper">

        @livewire('partial.header', [
            'title' => 'Detail undangan',
        ])

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="card h-fit">
                <div class="card-body">
                    <div class="flex justify-between items-center">
                        <h3 class="card-title">
                            <x-tabler-list class="size-5" />
                            <span>Bagan undangan</span>
                        </h3>
                        <button class="btn btn-xs btn-square" wire:click="resetBagan">
                            <x-tabler-refresh class="size-4" />
                        </button>
                    </div>
                    <p class="text-sm opacity-50 line-clamp-2">Bagan yang dicheck akan tampil pada undangan anda
                    </p>
                    <ul>
                        @if ($partials)
                            @foreach ($partials as $item => $checked)
                                <li>
                                    <div class="form-control">
                                        <label class="label cursor-pointer justify-start gap-2">
                                            <input type="checkbox" wire:model="partials.{{ $item }}"
                                                wire:change="changeBagan"
                                                class="checkbox checkbox-primary checkbox-xs" />
                                            <span class="label-text">{{ $item }}</span>
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>

            @if ($undangan->can('rsvp dan ucapan'))
                <div class="md:col-span-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="flex justify-between">
                                <div>
                                    <a href="{{ route('undangan.guest', $undangan) }}">
                                        <h3 class="card-title">
                                            <x-tabler-users class="size-5" />
                                            <span>Status RSVP tamu</span>
                                        </h3>
                                    </a>
                                    <p class="text-sm opacity-50 line-clamp-2">List kehariran tamu undangan</p>
                                </div>
                                <div class="flex flex-col items-center">
                                    <h3 class="card-title">
                                        {{ $undangan->tamus()->where('present', true)->count() }}/{{ $undangan->tamus->count() }}
                                    </h3>
                                    <p class="text-sm opacity-50 line-clamp-2">hadir</p>
                                </div>
                            </div>
                        </div>
                        <div class="table-wrapper">
                            <table class="table">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kehadiran</th>
                                </thead>
                                <tbody>
                                    @foreach ($undangan->tamus->sortByDesc('present') as $tamu)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $tamu->name }}</td>
                                            <td>
                                                <button @class(['btn btn-xs text-error', 'text-success' => $tamu->present])>
                                                    {{ $tamu->present ? 'Hadir' : 'Tidak hadir' }}
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

</div>
