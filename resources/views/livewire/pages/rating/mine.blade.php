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

    <div class="grid grid-cols-3 gap-6">
        @foreach ($datas as $data)
            <div class="card break-inside-avoid">
                <div class="card-body space-y-3 justify-center">
                    <div class="flex gap-3 items-center justify-center">
                        <div class="flex justify-center items-center w-8">
                            <div class="avatar justify-center flex-none">
                                <div class="rounded-full w-8 bg-success">
                                    <img src="https://robohash.org/{{ fake()->name() }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 justify-start gap-4">
                            <h3 class="line-clamp-1">{{ $data->user->name }}</h3>
                            <div class="flex gap-1">
                                <div class="rating rating-sm">
                                    <input type="radio" name="rate{{ $data->id }}"
                                        class="mask mask-star bg-warning" disabled @checked($data->rate == 1) />
                                    <input type="radio" name="rate{{ $data->id }}"
                                        class="mask mask-star bg-warning" disabled @checked($data->rate == 2) />
                                    <input type="radio" name="rate{{ $data->id }}"
                                        class="mask mask-star bg-warning" disabled @checked($data->rate == 3) />
                                    <input type="radio" name="rate{{ $data->id }}"
                                        class="mask mask-star bg-warning" disabled @checked($data->rate == 4) />
                                    <input type="radio" name="rate{{ $data->id }}"
                                        class="mask mask-star bg-warning" disabled @checked($data->rate == 5) />
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="opacity-75 text-sm">
                        {{ $data->insight }}
                    </p>

                    <div class="card-actions">
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
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @livewire('pages.rating.actions')
</div>
