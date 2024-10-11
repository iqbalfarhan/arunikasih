<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Buat undangan baru',
    ])

    <div class="card h-fit">
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
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Paket undangan</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.name'),
                    ]) wire:model="form.name" />
                </label>
            </div>

            <div class="card-actions">
                <button class="btn btn-primary" wire:click='simpan'>
                    <x-tabler-arrow-right class="size-5" />
                    <span>Selanjutnya</span>
                </button>
            </div>
        </div>
    </div>
</div>
