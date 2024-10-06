<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <div class="card-title">Form paket</div>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama paket</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.name'),
                    ]) wire:model="form.name"
                        placeholder="Nama lengkap paket" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">harga paket</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.price'),
                    ]) wire:model="form.price"
                        placeholder="Nama lengkap paket" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Description</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.description'),
                    ]) wire:model="form.description"
                        placeholder="Nama lengkap paket" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama kategori</span>
                    </div>
                    <select @class([
                        'select select-bordered',
                        'select-error' => $errors->first('form.kategori_id'),
                    ]) wire:model="form.kategori_id">
                        <option value="">Kategori paket</option>
                        @foreach ($kategoris as $katid => $katname)
                            <option value="{{ $katid }}">{{ $katname }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="modal-action justify-between">
                <button type="button" wire:click="resetForm" class="btn btn-ghost">Close</button>
                <button class="btn btn-primary">
                    <x-tabler-check class="size-5" />
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>
