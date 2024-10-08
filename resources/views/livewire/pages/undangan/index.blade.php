<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Undangan management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('undangan.create')
            <a href="{{ route('undangan.create') }}" class="btn btn-primary" wire:navigate>
                <x-tabler-plus class="size-5" />
                <span>Tambah undangan</span>
            </a>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Judul undangan</th>
                <th>Kategori</th>
                <th>Sudah dibayar</th>
                @canany(['tema.edit', 'tema.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>
                            <div class="flex flex-col">
                                <a href="{{ route('undangan.show', $data) }}">{{ $data->name }}</a>
                                <span class="opacity-50 text-xs">{{ $data->slug }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="flex flex-col">
                                <span class="opacity-50 text-xs">{{ $data->kategori->name }}</span>
                                <span>{{ $data->paket->name }}</span>
                            </div>
                        </td>
                        <td>{{ $data->paid ? 'Terbayar' : 'Belum' }}</td>
                        @canany(['undangan.edit', 'undangan.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('undangan.show')
                                        <a href="{{ route('undangan.show', $data) }}" class="btn btn-xs btn-bordered"
                                            wire:click="$dispatch('editUndangan', {undangan: {{ $data->id }}})">
                                            <x-tabler-eye class="size-4" />
                                            <span>Detail</span>
                                        </a>
                                    @endcan
                                    @can('undangan.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editUndangan', {undangan: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('undangan.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deleteUndangan', {undangan: {{ $data->id }}})">
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

    @livewire('pages.undangan.actions')
</div>
