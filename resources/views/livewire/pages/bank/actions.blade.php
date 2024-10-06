<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <div class="card-title">Form bank</div>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama bank</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.name'),
                    ]) wire:model="form.name"
                        placeholder="Nama lengkap bank" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Filename</span>
                    </div>
                    <input type="file" @class([
                        'file-input file-input-bordered',
                        'file-input-error' => $errors->first('form.filename'),
                    ]) wire:model="form.filename" />
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
