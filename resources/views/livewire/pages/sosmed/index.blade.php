<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Sosmed management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('sosmed.create')
            <button class="btn btn-primary" wire:click="$dispatch('createSosmed')">
                <x-tabler-plus class="size-5" />
                <span>Tambah sosmed</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper max-w-lg mx-auto">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Media name</th>
                <th>Photourl</th>
                @canany(['sosmed.edit', 'sosmed.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->name }}</td>
                        <td>
                            <div class="avatar">
                                <div class="w-6">
                                    <img src="{{ $data->image }}" alt="">
                                </div>
                            </div>
                        </td>
                        @canany(['sosmed.edit', 'sosmed.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('sosmed.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editSosmed', {sosmed: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('sosmed.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deleteSosmed', {sosmed: {{ $data->id }}})">
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

    @livewire('pages.sosmed.actions')
</div>
