<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'undangan management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('undangan.create')
            <button class="btn btn-primary" wire:click="$dispatch('createUndangan')">
                <x-tabler-plus class="size-5" />
                <span>Tambah undangan</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Creator</th>
                <th>Kategori</th>
                <th>Nama undangan</th>
                <th>Publish</th>
                @canany(['undangan.edit', 'undangan.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->kategori->name }} {{ $data->paket->name }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->publish ? 'true' : 'false' }}</td>
                        @canany(['undangan.edit', 'undangan.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
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
