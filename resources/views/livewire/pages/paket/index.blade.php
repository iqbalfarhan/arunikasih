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

    <div class="grid grid-cols-3 gap-6">
        @foreach ($datas as $data)
            <div class="card h-fit" wire:transition>
                <div class="card-body">
                    <div class="flex flex-col items-start">
                        <button class="text-xs opacity-50">{{ $data->kategori->name ?? '' }}</button>
                        <h3 class="card-title flex-1 line-clamp-1">{{ $data->name }}</h3>
                    </div>

                    <div class="space-y-4 my-4">
                        <p class="text-sm opacity-50 line-clamp-3">{{ $data->description }}</p>
                        <ul class="text-sm opacity-50 list list-disc list-inside">
                            @foreach ($data->fiturs->pluck('name') as $fitur)
                                <li class="list-item">{{ $fitur }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="card-actions justify-between">
                        <div class="text-success text-lg">{{ Number::currency($data->price, 'IDR') }}</div>
                        @canany(['paket.edit', 'paket.delete'])
                            <div class="flex-none">
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
                        @endcanany
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @livewire('pages.paket.actions')
</div>
