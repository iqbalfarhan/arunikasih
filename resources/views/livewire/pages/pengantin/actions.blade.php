<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <div class="card-title">Form pengantin</div>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Data pengantin</span>
                    </div>
                    <select @class([
                        'select select-bordered',
                        'select-error' => $errors->first('form.gender'),
                    ]) wire:model="form.gender">
                        <option value="">Pilih pengantin</option>
                        <option value="pria">Pengantin pria</option>
                        <option value="wanita">Pengantin wanita</option>
                    </select>
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama pengantin</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.name'),
                    ]) wire:model="form.name"
                        placeholder="Nama lengkap pengantin" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Anak ke</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.child'),
                    ]) wire:model="form.child"
                        placeholder="pertama, kedua ..." />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama Ayah</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.father'),
                    ]) wire:model="form.father" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama Ibu</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.mother'),
                    ]) wire:model="form.mother" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Photo</span>
                    </div>
                    <input type="file" @class([
                        'file-input file-input-bordered',
                        'file-input-error' => $errors->first('photo'),
                    ]) wire:model="photo" accept="images/*" />
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
