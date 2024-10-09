<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Pengantin management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('pengantin.create')
            <button class="btn btn-primary" wire:click="$dispatch('createPengantin', {undangan_id: {{ $undangan->id }}})">
                <x-tabler-plus class="size-5" />
                <span>Tambah pengantin</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Pengantin</th>
                <th>Name</th>
                <th>Anak ke</th>
                <th>Ayah</th>
                <th>Ibu</th>
                @canany(['pengantin.edit', 'pengantin.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->gender }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->child }}</td>
                        <td>{{ $data->father }}</td>
                        <td>{{ $data->mother }}</td>
                        @canany(['pengantin.edit', 'pengantin.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('pengantin.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editPengantin', {pengantin: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('pengantin.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deletePengantin', {pengantin: {{ $data->id }}})">
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

    @livewire('pages.pengantin.actions')
</div>
