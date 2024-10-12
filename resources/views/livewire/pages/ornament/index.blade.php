<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Ornament management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('ornament.create')
            <button class="btn btn-primary" wire:click="$dispatch('createOrnament')">
                <x-tabler-plus class="size-5" />
                <span>Tambah ornament</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Name</th>
                <th>Ring</th>
                <th>Top Left</th>
                <th>Top Right</th>
                <th>Bottom Left</th>
                <th>Bottom Right</th>
                @canany(['ornament.edit', 'ornament.delete'])
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
                                <div class="w-10">
                                    <img src="{{ Storage::url($data->ring ?? '') }}" alt="" />
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="avatar">
                                <div class="w-10">
                                    <img src="{{ Storage::url($data->topleft ?? '') }}" alt="" />
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="avatar">
                                <div class="w-10">
                                    <img src="{{ Storage::url($data->topright ?? '') }}" alt="" />
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="avatar">
                                <div class="w-10">
                                    <img src="{{ Storage::url($data->bottomleft ?? '') }}" alt="" />
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="avatar">
                                <div class="w-10">
                                    <img src="{{ Storage::url($data->bottomright ?? '') }}" alt="" />
                                </div>
                            </div>
                        </td>
                        @canany(['ornament.edit', 'ornament.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('ornament.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editOrnament', {ornament: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('ornament.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deleteOrnament', {ornament: {{ $data->id }}})">
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

    @livewire('pages.ornament.actions')
</div>
