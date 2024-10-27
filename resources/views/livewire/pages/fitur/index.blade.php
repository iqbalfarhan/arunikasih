<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Fitur management',
    ])
    <div class="table-filter-wrapper">
        <div role="tablist" class="tabs tabs-boxed bg-base-300">
            @foreach ($kategoris as $katid => $katname)
                <button wire:click="$set('cari', {{ $katid }})" role="tab"
                    @class(['tab', 'tab-active' => $katid == $cari])>{{ $katname }}</button>
            @endforeach
        </div>
        @can('fitur.create')
            <button class="btn btn-primary" wire:click="$dispatch('createFitur')">
                <x-tabler-plus class="size-5" />
                <span>Tambah fitur</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Kategori</th>
                <th>name</th>
                <th>description</th>
                @canany(['fitur.edit', 'fitur.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->kategori->name ?? '' }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ Str::limit($data->description, 40) }}</td>
                        @canany(['fitur.edit', 'fitur.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('fitur.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editFitur', {fitur: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('fitur.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deleteFitur', {fitur: {{ $data->id }}})">
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

    @livewire('pages.fitur.actions')
</div>
