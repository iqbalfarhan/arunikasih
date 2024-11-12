<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <div class="card-title">Form streaming</div>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Social media</span>
                    </div>
                    <select type="text" @class([
                        'select select-bordered',
                        'select-error' => $errors->first('form.sosmed_id'),
                    ]) wire:model="form.sosmed_id">
                        <option value="">---</option>
                        @foreach ($sosmeds as $sosmedid => $sosmedname)
                            <option value="{{ $sosmedid }}">{{ $sosmedname }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Url streaming</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.url'),
                    ]) wire:model="form.url"
                        placeholder="Nama lengkap streaming" />
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
