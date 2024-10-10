<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <div class="card-title">Form kisah</div>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Judul</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.title'),
                    ]) wire:model="form.title"
                        placeholder="Nama lengkap kisah" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Kisah</span>
                    </div>
                    <textarea type="text" @class([
                        'textarea textarea-bordered',
                        'textarea-error' => $errors->first('form.content'),
                    ]) wire:model="form.content" rows="7"
                        placeholder="Nama lengkap kisah">
                    </textarea>
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
