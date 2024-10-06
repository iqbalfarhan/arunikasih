<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Tema management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('tema.create')
            <button class="btn btn-primary" wire:click="$dispatch('createTema')">
                <x-tabler-plus class="size-5" />
                <span>Tambah tema</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>name</th>
                <th>kategori_id</th>
                <th>thumbnail</th>
                <th>css</th>
                @canany(['tema.edit', 'tema.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->kategori_id }}</td>
                        <td>{{ $data->thumbnail }}</td>
                        <td>{{ $data->css }}</td>
                        @canany(['tema.edit', 'tema.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('tema.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editTema', {tema: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('tema.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deleteTema', {tema: {{ $data->id }}})">
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

    @livewire('pages.tema.actions')
</div>