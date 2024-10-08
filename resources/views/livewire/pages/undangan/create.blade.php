<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Buat undangan baru',
    ])
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Kategori undangan</h3>
            <div class="grid grid-cols-3 gap-6 py-4">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Jenis undangan</span>
                    </div>
                    <select @class([
                        'select select-bordered',
                        'select-error' => $errors->first('form.kategori_id'),
                    ]) wire:model.live="form.kategori_id">
                        <option value="">Pilih jenis undangan</option>
                        @foreach ($kategoris as $katid => $katname)
                            <option value="{{ $katid }}">{{ $katname }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Paket undangan</span>
                    </div>
                    <select @class([
                        'select select-bordered',
                        'select-error' => $errors->first('form.paket_id'),
                    ]) wire:model="form.paket_id">
                        <option value="">Pilih jenis undangan</option>
                        @foreach ($pakets as $paketid => $paketname)
                            <option value="{{ $paketid }}">{{ $paketname }}</option>
                        @endforeach
                    </select>
                </label>

                <div class="card">
                    <div class="card-body">
                        <div class="flex flex-col items-start">
                            <button class="text-xs opacity-50">Undangan</button>
                            <h3 class="card-title flex-1 line-clamp-1">Nama paket</h3>
                        </div>

                        <p class="text-sm opacity-50 my-4 line-clamp-3">Lorem ipsum dolor sit, amet consectetur
                            adipisicing elit. Sequi deleniti iure similique placeat voluptatibus expedita laboriosam
                            consequatur dicta harum quos, vel ullam veniam maxime quisquam nihil nisi amet sapiente
                            aliquam.</p>

                        <div class="card-actions justify-between">
                            <div class="text-success text-lg">{{ Number::currency(100000, 'IDR') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Informasi undangan</h3>

            <div class="grid grid-cols-2 py-4 gap-6">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama undangan</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.name'),
                    ]) wire:model.live="form.name"
                        placeholder="contoh : pernikahan Galih dan ratna" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Link undangan</span>
                    </div>
                    <div class="input input-bordered flex items-center">
                        <span>{{ url(Str::slug($form->name)) }}</span>
                    </div>
                </label>
            </div>
        </div>
    </div>
    <div class="flex">
        <button class="btn btn-primary" wire:click='simpan'>
            <x-tabler-arrow-right class="size-5" />
            <span>Selanjutnya</span>
        </button>
    </div>
</div>
