<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Undangan management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('undangan.create')
            <a href="{{ route('undangan.create') }}" class="btn btn-primary" wire:navigate>
                <x-tabler-plus class="size-5" />
                <span>Tambah undangan</span>
            </a>
        @endcan
    </div>

    <div class="grid md:grid-cols-4 gap-6">
        @foreach ($datas as $data)
            <a href="{{ route('undangan.show', $data) }}"
                class="card bg-gradient-to-br from-base-100 to-base-300 hover:opacity-75"
                data-theme="{{ $data->tema->name ?? '' }}">
                <div class="card-body space-y-20">
                    <div class="avatar">
                        <div class="ring-primary ring-offset-base-200 w-16 bg-neutral rounded-full ring ring-offset-2">
                            <img src="https://robohash.org/{{ $data->name }}" alt="">
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <span class="text-xs opacity-50">{{ $data->kategori->name ?? '' }}
                                {{ $data->tema->name ?? '' }}</span>
                            <h3 class="font-bold">{{ $data->name }}</h3>
                        </div>
                        <p class="text-xs opacity-50 line-clamp-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Est repudiandae maxime quis sint
                            repellat! Nostrum aliquam ex commodi, delectus hic at quae laborum maiores iure natus
                            aliquid
                            non debitis ut!
                        </p>

                        <div class="text-xs">{{ $data->created_at->diffForHumans() }}</div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
