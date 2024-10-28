<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Tamu management',
    ])

    <div class="grid md:grid-cols-2 gap-6">
        @if ($undangan->can('rsvp dan ucapan'))
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        0 Tamu akan hadir
                    </h3>
                    <p class="text-sm opacity-75">0 tamu berencana hadir ke acara anda dari 12 tamu yang diundang.</p>
                </div>
            </div>
        @else
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        0 undangan sudah dibaca
                    </h3>
                    <p class="text-sm opacity-75">0 tamu berencana hadir ke acara anda dari 12 tamu yang diundang.</p>
                </div>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="flex justify-between items-center">
                    <h3 class="card-title">
                        <x-tabler-share class="size-5" />
                        Fitur share {{ $undangan->shared ? 'aktif' : 'tidak aktif' }}
                    </h3>
                    <input type="checkbox" class="toggle toggle-sm toggle-primary" wire:click="togglePublish"
                        @checked($undangan->shared)>
                </div>
                <p class="text-sm opacity-75">Aktifkan fitur share undangan agar tamu anda bisa membuka link yang anda
                    berikan.</p>
            </div>
        </div>
    </div>

    <div class="table-filter-wrapper">
        <div class="flex-1">
            <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        </div>

        @can('tamu.create')
            <button class="btn btn-primary" wire:click="$dispatch('createTamu', {undangan_id: {{ $undangan->id }}})">
                <x-tabler-plus class="size-5" />
                <span>Tambah tamu</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Name</th>
                <th>Dibagikan</th>
                <th>Dibaca</th>
                @if ($undangan->can('rsvp dan ucapan'))
                    <th>Hadir</th>
                    <th class="text-center">Ucapan</th>
                @endif
                @canany(['tamu.edit', 'tamu.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>
                            <div class="flex flex-col">
                                <h3>{{ $data->name }}</h3>
                                <span class="opacity-50 text-xs">{{ $data->link }}</span>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-xs btn-square">
                                <x-tabler-check class="size-4 text-primary" />
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-xs btn-square">
                                <x-tabler-check class="size-4 text-primary" />
                            </button>
                        </td>
                        @if ($undangan->can('rsvp dan ucapan'))
                            <td>
                                <button class="btn btn-xs text-primary">
                                    hadir
                                </button>
                            </td>
                            <td>
                                @if ($data->message)
                                    <div class="flex gap-1 justify-center">
                                        @can('tamu.share')
                                            <button class="btn btn-xs btn-bordered"
                                                wire:click="dispatch('shareTamu', {tamu: {{ $data->id }}})">
                                                <x-tabler-message class="size-4" />
                                                <span>Baca pesan</span>
                                            </button>
                                        @endcan
                                    </div>
                                @endif
                            </td>
                        @endif
                        @canany(['tamu.edit', 'tamu.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('tamu.share')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="dispatch('shareTamu', {tamu: {{ $data->id }}})">
                                            <x-tabler-share class="size-4" />
                                        </button>
                                    @endcan
                                    @can('tamu.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editTamu', {tamu: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('tamu.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deleteTamu', {tamu: {{ $data->id }}})">
                                            <x-tabler-trash class="size-4" />
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        @endcanany
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('pages.tamu.actions')
    @livewire('pages.tamu.share')
</div>
