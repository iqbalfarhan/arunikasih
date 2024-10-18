<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <div class="card-title">Form undangan</div>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Kategori undangan</span>
                    </div>
                    <select type="text" @class([
                        'select select-bordered',
                        'select-error' => $errors->first('form.kategori_id'),
                    ]) wire:model="form.kategori_id">
                        <option value=""></option>
                        @foreach ($kategoris as $katid => $katname)
                            <option value="{{ $katid }}">{{ $katname }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama undangan</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.name'),
                    ]) wire:model="form.name"
                        placeholder="Nama lengkap undangan" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Tanggal countdown</span>
                    </div>
                    <input type="date" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.event_date'),
                    ]) wire:model="form.event_date"
                        placeholder="Nama lengkap undangan" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Photo cover</span>
                    </div>
                    <input type="file" @class([
                        'file-input file-input-bordered',
                        'file-input-error' => $errors->first('photo'),
                    ]) wire:model="photo" accept="image/*" />
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
