<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Paket management',
    ])

    <div class="table-filter-wrapper">
        <select wire:model.live="cari" class="select select-bordered" placeholder="Pencarian">
            <option value="">Kategori paket</option>
            @foreach ($kategoris as $katid => $katname)
                <option value="{{ $katid }}">{{ $katname }}</option>
            @endforeach
        </select>
        @can('paket.create')
            <button class="btn btn-primary" wire:click="$dispatch('createPaket')">
                <x-tabler-plus class="size-5" />
                <span>Tambah paket</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Kategori</th>
                <th>Nama paket</th>
                <th>harga paket</th>
                <th>Deskripsi</th>
                <th>Fitur</th>
                @canany(['paket.edit', 'paket.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->kategori->name }}</td>
                        <td>{{ $data->name }}</td>
                        <td>
                            <div class="flex flex-col">
                                <span
                                    class="text-xs opacity-50 line-through">{{ Number::format($data->before_discount ?? 0, locale: 'de') }}</span>
                                <span class="text-success">{{ Number::format($data->price, locale: 'de') }}</span>
                            </div>
                        </td>
                        <td>{{ Str::limit($data->description, 40) }}</td>
                        <td>{{ $data->fiturs()->count() }}</td>
                        @canany(['paket.edit', 'paket.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('paket.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editPaket', {paket: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('paket.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deletePaket', {paket: {{ $data->id }}})">
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

    @livewire('pages.paket.actions')
</div>
