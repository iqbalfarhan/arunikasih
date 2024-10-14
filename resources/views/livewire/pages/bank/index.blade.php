<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Bank management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('bank.create')
            <button class="btn btn-primary" wire:click="$dispatch('createBank')">
                <x-tabler-plus class="size-5" />
                <span>Tambah bank</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Icon</th>
                <th>Nama bank</th>
                @canany(['bank.edit', 'bank.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>
                            <div class="avatar">
                                <div class="w-4">
                                    <img src="{{ $data->image }}" alt="">
                                </div>
                            </div>
                        </td>
                        <td>{{ $data->name }}</td>
                        @canany(['bank.edit', 'bank.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('bank.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editBank', {bank: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('bank.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deleteBank', {bank: {{ $data->id }}})">
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

    @livewire('pages.bank.actions')
</div>
