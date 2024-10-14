<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Hadiah management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('hadiah.create')
            <button class="btn btn-primary" wire:click="$dispatch('createHadiah', {undangan_id: {{ $undangan->id }}})">
                <x-tabler-plus class="size-5" />
                <span>Tambah hadiah</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Tipe</th>
                <th>Bank / E-wallet</th>
                <th>Penerima</th>
                <th>Value</th>
                @canany(['hadiah.edit', 'hadiah.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->type }}</td>
                        <td>{{ $data->bank->name }}</td>
                        <td>{{ $data->pic }}</td>
                        <td>{{ $data->value }}</td>
                        @canany(['hadiah.edit', 'hadiah.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('hadiah.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editHadiah', {hadiah: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('hadiah.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deleteHadiah', {hadiah: {{ $data->id }}})">
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

    @livewire('pages.hadiah.actions')
</div>
