<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Gallery management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('gallery.create')
            <button class="btn btn-primary" wire:click="$dispatch('createGallery', {undangan_id : {{ $undangan->id }}})">
                <x-tabler-plus class="size-5" />
                <span>Tambah gallery</span>
            </button>
        @endcan
    </div>

    <div class="columns-4 space-y-4">
        @foreach ($datas as $data)
            <div class="card card-compact break-inside-avoid">
                <figure>
                    <img src="{{ Storage::url($data->filename) }}" class="w-full" alt="{{ $data->filename }}">
                </figure>
                <div class="card-body">
                    <div class="card-actions">
                        <div class="flex gap-1 justify-center">
                            @can('gallery.edit')
                                <button class="btn btn-xs btn-square btn-bordered"
                                    wire:click="$dispatch('editGallery', {gallery: {{ $data->id }}})">
                                    <x-tabler-edit class="size-4" />
                                </button>
                            @endcan
                            @can('gallery.delete')
                                <button class="btn btn-xs btn-square btn-bordered"
                                    wire:click="$dispatch('deleteGallery', {gallery: {{ $data->id }}})">
                                    <x-tabler-trash class="size-4" />
                                </button>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @livewire('pages.gallery.actions')
</div>
