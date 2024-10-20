<div class="page-wrapper">

    @livewire('partial.header', [
        'title' => 'Status undangan',
    ])

    <div class="grid md:grid-cols-3 gap-4">
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
                    <span>Status publish</span>
                </h3>
                <p class="text-sm opacity-50 line-clamp-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Nihil, molestias?
                </p>
            </div>
        </div>
        <div class="card" data-theme="{{ $undangan->tema->name }}">
            <div class="card-body">
                <div class="flex justify-between w-full items-center">
                    <a href="{{ route('undangan.setting', $undangan->id) }}">
                        <h4 class="text-primary card-title capitalize flex items-center gap-2">
                            <x-tabler-palette class="size-5" />
                            <span>Tema {{ $undangan->tema->name }}</span>
                        </h4>
                    </a>
                    <div class="flex gap-1 bg-base-200 p-1 rounded-box">
                        @foreach (['bg-primary', 'bg-secondary', 'bg-accent', 'bg-info'] as $color)
                            <span class="size-3 rounded-box {{ $color }}"></span>
                        @endforeach
                    </div>
                </div>
                <p class="text-sm opacity-50 line-clamp-2">Menggunakan tema {{ $undangan->tema->name }} dan ornament
                    {{ $undangan->ornament->name ?? '' }}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <a href="{{ route('undangan.preview', $undangan) }}" target="_blank">
                    <h3 class="card-title">
                        <x-tabler-device-mobile class="size-5" />
                        <span>Preview undangan</span>
                    </h3>
                </a>
                <p class="text-sm opacity-50 line-clamp-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Optio, dolore?
                </p>
            </div>
        </div>
    </div>

    @livewire('partial.header', [
        'title' => 'Detail undangan',
    ])

    <div class="grid md:grid-cols-3 gap-4">
        <div class="card h-fit">
            <div class="card-body">
                <h3 class="card-title">
                    <x-tabler-list class="size-5" />
                    <span>Bagan undangan</span>
                </h3>
                <p class="text-sm opacity-50 line-clamp-2">Bagan yang dicheck akan tampil pada undangan anda
                </p>
                <ul>
                    @if ($partials)
                        @foreach ($partials as $item => $checked)
                            <li>
                                <div class="form-control">
                                    <label class="label cursor-pointer justify-start gap-2">
                                        <input type="checkbox" wire:model="partials.{{ $item }}"
                                            wire:change="changeBagan" class="checkbox checkbox-primary checkbox-xs" />
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
            <div class="col-span-2">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('undangan.guest', $undangan) }}">
                            <h3 class="card-title">
                                <x-tabler-users class="size-5" />
                                <span>Status RSVP tamu</span>
                            </h3>
                        </a>
                        <p class="text-sm opacity-50 line-clamp-2">Tamu yang berencana hadir 10 dari 100 undangan yang
                            dikirim.</p>
                    </div>
                    <div class="table-wrapper">
                        <table class="table">
                            <thead>
                                <th>No</th>
                                <th class="w-full">Nama</th>
                                <th>Kehadiran</th>
                            </thead>
                            <tbody>
                                @foreach ($undangan->tamus as $tamu)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="flex flex-col">
                                                <span>{{ $tamu->name }}</span>
                                                <span class="text-xs opacity-50">{{ $tamu->message }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            @if ($tamu->present)
                                                <span class="text-success">hadir</span>
                                            @endif
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
