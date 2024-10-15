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
                class="card card-compact bg-base-200 hover:opacity-75 border-0"
                data-theme="{{ $data->tema->name ?? '' }}">
                <div class="card-body space-y-12">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-xs opacity-50">{{ $data->kategori->name ?? '' }}</span>
                            <h3 class="font-bold">{{ $data->name }}</h3>
                        </div>
                        <div @class([
                            'badge badge-sm badge-error',
                            '!badge-success' => $data->paid,
                        ])>{{ $data->paid ? 'paid' : 'unpaid' }}</div>
                    </div>
                    <div class="flex flex-col justify-between items-center">
                        <div class="flex relative justify-center items-center">
                            <img src="{{ Storage::url($data->ornament->ring) }}" alt="" class="w-32 z-10">
                            <div class="avatar absolute">
                                <div class="w-24 rounded-full">
                                    <img src="{{ $data->image }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-4">
                        @if ($data->partials)
                            <p class="text-xs opacity-50 line-clamp-3">
                                {{ implode(', ', array_keys($data->partials)) }}
                            </p>
                        @endif

                        <div class="text-xs">{{ $data->created_at->diffForHumans() }}</div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
