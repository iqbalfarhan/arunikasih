<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <div class="card-title">Form user</div>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama user</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.name'),
                    ]) wire:model="form.name"
                        placeholder="Nama lengkap user" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Alamat email</span>
                    </div>
                    <input type="email" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.email'),
                    ]) wire:model="form.email"
                        placeholder="Alamat email" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Password</span>
                    </div>
                    <input type="password" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.password'),
                    ]) wire:model="form.password"
                        placeholder="isi bila ingin merubah password" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Hak akses</span>
                    </div>
                    <select type="text" @class([
                        'select select-bordered',
                        'select-error' => $errors->first('form.role'),
                    ]) wire:model="form.role">
                        <option value="">Pilih hak akses</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
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
