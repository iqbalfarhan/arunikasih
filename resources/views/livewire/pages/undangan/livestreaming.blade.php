<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Streaming management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('streaming.create')
            <button class="btn btn-primary" wire:click="$dispatch('createStreaming', {undangan_id: {{ $undangan->id }}})">
                <x-tabler-plus class="size-5" />
                <span>Tambah streaming</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Social media</th>
                <th>Url</th>
                @canany(['streaming.edit', 'streaming.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->sosmed->name }}</td>
                        <td>{{ $data->url }}</td>
                        @canany(['streaming.edit', 'streaming.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('streaming.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editStreaming', {streaming: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('streaming.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deleteStreaming', {streaming: {{ $data->id }}})">
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

    @livewire('pages.streaming.actions')
</div>
