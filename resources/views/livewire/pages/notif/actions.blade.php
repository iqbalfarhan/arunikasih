<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <div class="card-title">Form notif</div>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama penerima</span>
                    </div>
                    <select @class([
                        'select select-bordered',
                        'select-error' => $errors->first('form.user_id'),
                    ]) wire:model="form.user_id">
                        <option value="">Pilih penerima</option>
                        @foreach ($users as $userid => $username)
                            <option value="{{ $userid }}">{{ $username }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Pesan notifikasi</span>
                    </div>
                    <textarea @class([
                        'textarea textarea-bordered',
                        'textarea-error' => $errors->first('form.message'),
                    ]) wire:model="form.message" placeholder="Pesan notifikasi" rows="5"></textarea>
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
