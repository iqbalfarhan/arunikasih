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
                <th>Other</th>
                @canany(['undangan.edit', 'undangan.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td></td>
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
