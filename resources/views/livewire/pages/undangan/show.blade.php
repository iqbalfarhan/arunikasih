<div class="page-wrapper">

    @livewire('partial.header', [
        'title' => 'Detail undangan',
    ])

    @livewire('pages.undangan.card', ['undangan' => $undangan])

    @livewire('partial.header', [
        'title' => 'Detail undangan',
    ])

    <div class="grid md:grid-cols-3 gap-4">
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
                <a href="{{ route('undangan.preview', $undangan) }}" target="_blank">
                    <h3 class="card-title">
                        <x-tabler-device-mobile class="size-5" />
                        <span>Preview undangan</span>
                    </h3>
                </a>
                <p class="text-sm opacity-50 line-clamp-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Optio, dolore?
                </p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    <x-tabler-list class="size-5" />
                    <span>Bagan undangan</span>
                </h3>
                <p class="text-sm opacity-50 line-clamp-2">Bagan yang dicheck akan tampil pada undangan anda
                </p>
                <ul>
                    @if ($partials)
                        @foreach ($partials as $item => $checked)
                            <li>
                                <div class="form-control">
                                    <label class="label cursor-pointer justify-start gap-3">
                                        <input type="checkbox" wire:model="partials.{{ $item }}"
                                            class="checkbox checkbox-sm" />
                                        <span class="label-text">{{ $item }}</span>
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>

                <div class="card-actions pt-6">
                    <button wire:click="changeBagan" class="btn btn-primary">
                        <x-tabler-check class="size-4" />
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
