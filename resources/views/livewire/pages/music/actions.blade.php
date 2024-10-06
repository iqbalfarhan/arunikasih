<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <div class="card-title">Form music</div>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Artist</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.artist'),
                    ]) wire:model="form.artist"
                        placeholder="Nama artis" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Judul music</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.title'),
                    ]) wire:model="form.title"
                        placeholder="Judul music" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Pilih file</span>
                    </div>
                    <input type="file" @class([
                        'file-input file-input-bordered',
                        'file-input-error' => $errors->first('filename'),
                    ]) wire:model="filename" accept="image/*" />
                    @error('filename')
                        {{ $message }}
                    @enderror
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
