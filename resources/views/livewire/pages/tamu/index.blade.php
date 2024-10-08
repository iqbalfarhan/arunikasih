<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Tamu management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('tamu.create')
            <button class="btn btn-primary" wire:click="$dispatch('createTamu')">
                <x-tabler-plus class="size-5" />
                <span>Tambah tamu</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Other</th>
                @canany(['tamu.edit', 'tamu.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td></td>
                        @canany(['tamu.edit', 'tamu.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
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
</div>
