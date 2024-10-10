<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Kisah management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('kisah.create')
            <button class="btn btn-primary" wire:click="$dispatch('createKisah', {undangan_id: {{ $undangan->id }}})">
                <x-tabler-plus class="size-5" />
                <span>Tambah kisah</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Judul</th>
                <th>Content</th>
                @canany(['kisah.edit', 'kisah.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->title }}</td>
                        <td>{{ Str::limit($data->content, 40) }}</td>
                        @canany(['kisah.edit', 'kisah.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('kisah.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editKisah', {kisah: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('kisah.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deleteKisah', {kisah: {{ $data->id }}})">
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

    @livewire('pages.kisah.actions')
</div>
