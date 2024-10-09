<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Event management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('event.create')
            <button class="btn btn-primary" wire:click="$dispatch('createEvent', {undangan: {{ $undangan->id }}})">
                <x-tabler-plus class="size-5" />
                <span>Tambah event</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <td>Name event</td>
                <td>Location name</td>
                <td>Latitude</td>
                <td>Longitude</td>
                <td>Datetime</td>
                @canany(['event.edit', 'event.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->location_name }}</td>
                        <td>{{ $data->latitude }}</td>
                        <td>{{ $data->longitude }}</td>
                        <td>{{ $data->datetime->format('d F Y, H:i') }}</td>
                        @canany(['event.edit', 'event.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('event.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editEvent', {event: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('event.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deleteEvent', {event: {{ $data->id }}})">
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

    @livewire('pages.event.actions')
</div>
