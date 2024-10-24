<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <div class="card-title">Form pembayaran</div>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama user</span>
                    </div>
                    <select @class([
                        'select select-bordered',
                        'select-error' => $errors->first('form.user_id'),
                    ]) wire:model="form.user_id">
                        <option value="">Pilih user</option>
                        @foreach ($users as $userid => $username)
                            <option value="{{ $userid }}">{{ $username }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama Undangan</span>
                    </div>
                    <select @class([
                        'select select-bordered',
                        'select-error' => $errors->first('form.undangan_id'),
                    ]) wire:model="form.undangan_id">
                        <option value="">Nama undangan</option>
                        @foreach ($undangans as $undanganid => $undanganname)
                            <option value="{{ $undanganid }}">{{ $undanganname }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Amount</span>
                    </div>
                    <input type="number" inputmode="numeric" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.amount'),
                    ]) wire:model="form.amount"
                        placeholder="Nominal invoice" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Catatan</span>
                    </div>
                    <textarea @class([
                        'textarea textarea-bordered',
                        'textarea-error' => $errors->first('form.notes'),
                    ]) wire:model="form.notes" placeholder="catatan invoice"></textarea>
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
