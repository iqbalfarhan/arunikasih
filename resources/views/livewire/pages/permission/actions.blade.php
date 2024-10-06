<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <h3 class="font-bold text-lg">Form {{ $mode }}</h3>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Jenis input</span>
                    </div>
                    <select type="text" placeholder="Type here" @class([
                        'select select-bordered',
                        'sselect-error' => $errors->first('mode'),
                    ]) wire:model.live="mode">
                        <option value="">Pilih jenis</option>
                        <option value="permission">Permission</option>
                        <option value="role">Role</option>
                    </select>
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">nama {{ $mode }}</span>
                    </div>
                    <input type="text" placeholder="Type here" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('name'),
                    ]) wire:model="name" />
                </label>
            </div>
            <div class="modal-action justify-between">
                <button type="button" wire:click="closeActions" class="btn btn-ghost">Close</button>
                <button class="btn btn-primary">
                    <x-tabler-check class="size-5" />
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>
