<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Pengantin management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('pengantin.create')
            <button class="btn btn-primary" wire:click="$dispatch('createPengantin', {undangan_id: {{ $undangan->id }}})">
                <x-tabler-plus class="size-5" />
                <span>Tambah pengantin</span>
            </button>
        @endcan
    </div>

    <div class="grid md:grid-cols-3 gap-6">
        @foreach ($datas as $data)
            <div class="card">
                <div class="card-body items-center text-center space-y-4">
                    <div class="text-sm opacity-50">Pengantin {{ $data->gender }}</div>
                    <div class="avatar">
                        <div class="w-24 rounded-full">
                            <img src="{{ $data->image }}" alt="">
                        </div>
                    </div>
                    <div class="card-title text-primary">
                        {{ $data->name }}
                    </div>
                    <p class="text-sm">{{ $data->text }}</p>
                    <div class="flex gap-1 justify-center">
                        @can('pengantin.edit')
                            <button class="btn btn-xs btn-square btn-bordered"
                                wire:click="$dispatch('editPengantin', {pengantin: {{ $data->id }}})">
                                <x-tabler-edit class="size-4" />
                            </button>
                        @endcan
                        @can('pengantin.delete')
                            <button class="btn btn-xs btn-square btn-bordered"
                                wire:click="$dispatch('deletePengantin', {pengantin: {{ $data->id }}})">
                                <x-tabler-trash class="size-4" />
                            </button>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @livewire('pages.pengantin.actions')
</div>
