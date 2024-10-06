<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Music management',
    ])

    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('music.create')
            <button class="btn btn-primary" wire:click="$dispatch('createMusic')">
                <x-tabler-plus class="size-5" />
                <span>Tambah music</span>
            </button>
        @endcan
    </div>

    @livewire('pages.music.player')

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Artist</th>
                <th>Title</th>
                <th>Play</th>
                @canany(['music.edit', 'music.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->artist }}</td>
                        <td>{{ $data->title }}</td>
                        <td>
                            @if ($data->filename)
                                <button class="btn btn-xs"
                                    wire:click="dispatch('playMusic', {music: {{ $data->id }}})">
                                    <x-tabler-player-play class="size-4" />
                                    <span>Play music</span>
                                </button>
                            @endif
                        </td>
                        @canany(['music.edit', 'music.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('music.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editMusic', {music: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('music.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deleteMusic', {music: {{ $data->id }}})">
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

    @livewire('pages.music.actions')
</div>
