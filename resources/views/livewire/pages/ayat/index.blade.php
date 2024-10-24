<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Ayat management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('ayat.create')
            <button class="btn btn-primary" wire:click="$dispatch('createAyat')">
                <x-tabler-plus class="size-5" />
                <span>Tambah ayat</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <td>Kategori</td>
                <td>surah</td>
                <td>content</td>
                @canany(['ayat.edit', 'ayat.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->kategori?->name }}</td>
                        <td>{{ $data->surah }}</td>
                        <td>{{ Str::limit($data->content, 50) }}</td>
                        @canany(['ayat.edit', 'ayat.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('ayat.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editAyat', {ayat: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('ayat.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deleteAyat', {ayat: {{ $data->id }}})">
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

    @livewire('pages.ayat.actions')
</div>
