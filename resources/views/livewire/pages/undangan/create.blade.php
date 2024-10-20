<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Buat undangan baru',
    ])

    <div class="card h-fit divide-y-2 divide-base-300">
        <div class="card-body">
            <p class="text-sm opacity-50">Buat undangan mudah dengan hanya melakukan beberapa langkah</p>
        </div>
        <div class="card-body">
            <ul class="steps steps-vertical md:steps-horizontal">
                @foreach ($steps as $stepkey => $stepname)
                    <li @class(['step', 'step-primary' => $stepkey == $step])>{{ $stepname }}</li>
                @endforeach
            </ul>
        </div>
        @if ($step == 'kategori')
            <div class="card-body space-y-6">
                <div class="flex flex-col gap-2">
                    <h3 class="card-title">Kategori undangan</h3>
                    <p class="text-sm opacity-50">Silakan klik pada list kategori undangan berikut untuk undangan yang
                        akan
                        anda buat, kemudian klik selanjutnya.
                    </p>
                </div>
                <div class="flex gap-4 flex-wrap">
                    @foreach ($kategoris as $katid => $katname)
                        <button wire:click="set('form.kategori_id', {{ $katid }})" @class([
                            'btn flex-1 capitalize border-2',
                            'btn-outline btn-primary' => $form->kategori_id == $katid,
                        ])>
                            <x-tabler-click class="size-5" />
                            <span>{{ $katname }}</span>
                        </button>
                    @endforeach
                </div>
            </div>
        @elseif ($step == 'paket')
            <div class="card-body space-y-6">
                <div class="flex flex-col gap-2">
                    <h3 class="card-title">Paket undangan</h3>
                    <p class="text-sm opacity-50">Silakan klik pada list kategori undangan berikut untuk undangan yang
                        akan
                        anda buat, kemudian klik selanjutnya.
                    </p>
                </div>
                <div class="flex gap-4 flex-wrap justify-center">
                    <div class="grid md:grid-cols-3 gap-6">
                        @foreach ($pakets as $paket)
                            <div class="card border-0 bg-base-200 hover:scale-105 transition">
                                <div class="card-body">
                                    <div class="flex flex-col">
                                        <span class="text-xs opacity-50">
                                            {{ $paket->kategori->name }}
                                        </span>
                                        <h3 class="card-title">{{ $paket->name }}</h3>
                                    </div>
                                    <p class="text-sm line-clamp-2 opacity-50">{{ $paket->description }}</p>
                                </div>
                                <div class="flex flex-col items-center justify-center py-4">
                                    <span
                                        class="text-center text-xs opacity-75 line-through">{{ Number::format($paket->before_discount, locale: 'de') }}</span>
                                    <div class="text-4xl text-center text-primary font-bold">
                                        <span class="text-sm">Rp.</span>
                                        {{ Number::format($paket->price, locale: 'de') }}
                                    </div>
                                </div>
                                <div class="card-body space-y-4 h-full">
                                    <div class="space-y-4 flex-1 opacity-75">
                                        <ul class="list list-inside text-sm space-y-2">
                                            @foreach ($paket->fiturs()->pluck('name') as $fitur)
                                                <li class="flex items-center gap-2">
                                                    <x-tabler-check class="size-4 text-success" />
                                                    {{ $fitur }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button @class([
                                        'btn btn-block btn-active',
                                        'btn-primary' => $form->paket_id == $paket->id,
                                    ])
                                        wire:click="set('form.paket_id', {{ $paket->id }})">
                                        <x-tabler-click class="size-5" />
                                        <span>Pilih paket ini</span>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @elseif ($step == 'name')
            <div class="card-body space-y-6">
                <div class="flex flex-col gap-2">
                    <h3 class="card-title">Nama undangan</h3>
                    <p class="text-sm opacity-50">Tuliskan nama undangan misalkan undangan pernikahan galih dan ratna
                        maka silakan tuliskan nama undangan "Galih & Ratna", tapi tenang anda tetap dapat mengubah nama
                        undangan nanti
                    </p>
                </div>
                <label class="form-control">
                    <input type="text" @class([
                        'input input-bordered input-lg',
                        'input-error' => $errors->first('form.name'),
                    ]) wire:model="form.name"
                        placeholder="Contoh : Galih & Ratna" />
                </label>
            </div>
        @elseif ($step == 'done')
            <div class="card-body space-y-6">
                <div class="flex flex-col gap-2">
                    <h3 class="card-title">Undangan sudah siap dibuat</h3>
                    <p class="text-sm opacity-50">Anda akan membuat sebuah undangan pernikahan dengan paket gratis
                        dengan harga Rp.
                        {{ Number::format(10000000, locale: 'de') }}. Anda bisa melakukan pembayaran setelah anda klik
                        selesai. setelah ini anda bisa langsung mengedit
                        undangan anda pada halaman detail undangan</p>
                </div>
            </div>
        @endif
        <div class="card-body space-y-6">
            <div class="card-actions justify-between">
                @if ($step != 'kategori')
                    <button class="btn" wire:click="previousStep">
                        <x-tabler-arrow-left class="size-5" />
                        <span>Sebelumnya</span>
                    </button>
                @else
                    <div></div>
                @endif
                <div class="flex flex-col md:flex-row gap-3">

                    @if ($step == 'done')
                        <button class="btn btn-primary" wire:click="simpan">
                            <x-tabler-check class="size-5" />
                            <span>Selesai</span>
                        </button>
                    @else
                        <button class="btn btn-primary" wire:click="nextStep">
                            <x-tabler-arrow-right class="size-5" />
                            <span>Selanjutnya</span>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
