<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Undangan saya',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('undangan.create')
            <a href="{{ route('undangan.create') }}" class="btn btn-primary">
                <x-tabler-plus class="size-5" />
                <span>Buat undangan</span>
            </a>
        @endcan
    </div>

    <div class="grid md:grid-cols-4 gap-6">
        @forelse ($datas as $data)
            <a href="{{ route('undangan.show', $data) }}" wire:key="{{ $data }}">
                @livewire('pages.undangan.card', ['undangan' => $data], key($data->id))
            </a>
        @empty
            <div class="col-span-full">
                <div class="card max-w-sm mx-auto">
                    <div class="card-body space-y-6 text-center items-center">
                        <div class="avatar">
                            <div class="w-32 rounded-full bg-base-300">
                                <img src="{{ url('/notfound.svg') }}" alt="">
                            </div>
                        </div>
                        <p>Ayo buat undangan pertama anda dengan klik tombol berikut ini</p>
                        @can('undangan.create')
                            <a href="{{ route('undangan.create') }}" class="btn btn-primary">
                                <x-tabler-plus class="size-5" />
                                <span>Buat undangan</span>
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>
