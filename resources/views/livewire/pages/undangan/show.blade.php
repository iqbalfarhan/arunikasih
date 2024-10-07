<div class="page-wrapper">

    @livewire('partial.header', [
        'title' => 'Detail undangan',
    ])

    <div class="grid grid-cols-3 gap-6">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    <x-tabler-send class="size-5" />
                    <span>Status publish</span>
                </h3>
                <p class="text-sm opacity-50 line-clamp-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Nihil, molestias?
                </p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    <x-tabler-users class="size-5" />
                    <span>Tamu undangan</span>
                </h3>
                <p class="text-sm opacity-50 line-clamp-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Illum, quos?
                </p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    <x-tabler-message class="size-5" />
                    <span>Ucapan & doa</span>
                </h3>
                <p class="text-sm opacity-50 line-clamp-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Optio, dolore?
                </p>
            </div>
        </div>
    </div>

    <div class="card card-compact">
        <div class="card-body">
            <div class="flex justify-between items-center">
                <span>{{ $undangan->link }}</span>
                <button class="btn btn-xs">
                    <x-tabler-copy class="size-4" />
                    <span>Copy</span>
                </button>
            </div>
        </div>
    </div>

    @livewire('pages.undangan.actions')
</div>
