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
            <a href="{{ route('undangan.show', $data) }}" wire:key="{{ $data }}">
                @livewire('pages.undangan.card', ['undangan' => $data], key($data->id))
            </a>
        @endforeach
    </div>
</div>
