<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Rating management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('rating.create')
            <button class="btn btn-primary" wire:click="$dispatch('createRating')">
                <x-tabler-plus class="size-5" />
                <span>Tambah rating</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Name</th>
                <th>Masukan</th>
                <th>Rate</th>
                @canany(['rating.edit', 'rating.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ Str::limit($data->insight, 40) }}</td>
                        <td>
                            <div class="rating rating-sm">
                                <input type="radio" @checked($data->rate == 1)
                                    class="mask mask-star-2 bg-orange-400" />
                                <input type="radio" @checked($data->rate == 2)
                                    class="mask mask-star-2 bg-orange-400" />
                                <input type="radio" @checked($data->rate == 3)
                                    class="mask mask-star-2 bg-orange-400" />
                                <input type="radio" @checked($data->rate == 4)
                                    class="mask mask-star-2 bg-orange-400" />
                                <input type="radio" @checked($data->rate == 5)
                                    class="mask mask-star-2 bg-orange-400" />
                            </div>
                        </td>
                        @canany(['rating.edit', 'rating.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('rating.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editRating', {rating: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('rating.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deleteRating', {rating: {{ $data->id }}})">
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

    @livewire('pages.rating.actions')
</div>
