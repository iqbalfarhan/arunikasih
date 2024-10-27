<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Notif management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('notif.create')
            <button class="btn btn-primary" wire:click="$dispatch('createNotif')">
                <x-tabler-plus class="size-5" />
                <span>Tambah notif</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Kepada</th>
                <th>Pesan</th>
                <th>Created</th>
                @canany(['notif.edit', 'notif.read', 'notif.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}" @class(['opacity-50' => !$data->read])>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->message }}</td>
                        <td>{{ $data->created_at->diffForHumans() }}</td>
                        @canany(['notif.edit', 'notif.read', 'notif.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('notif.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editNotif', {notif: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('notif.read')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('readNotif', {notif: {{ $data->id }}})">
                                            @if ($data->read)
                                                <x-tabler-arrow-back-up class="size-4" />
                                            @else
                                                <x-tabler-check class="size-4" />
                                            @endif
                                        </button>
                                    @endcan
                                    @can('notif.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deleteNotif', {notif: {{ $data->id }}})">
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

    @livewire('pages.notif.actions')
</div>
