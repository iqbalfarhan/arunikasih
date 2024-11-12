<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <div class="card-title">Form hadiah</div>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Tipe hadiah</span>
                    </div>
                    <select type="text" @class([
                        'select select-bordered',
                        'select-error' => $errors->first('form.type'),
                    ]) wire:model.live="form.type">
                        <option value="alamat">Alamat</option>
                        <option value="rekening">Rekening</option>
                    </select>
                </label>
                @if ($form->type == 'rekening')
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">Nama bank</span>
                        </div>
                        <select type="text" @class([
                            'select select-bordered',
                            'select-error' => $errors->first('form.bank_id'),
                        ]) wire:model="form.bank_id">
                            <option value="">Pilih bank</option>
                            @foreach ($banks as $bankid => $bankname)
                                <option value="{{ $bankid }}">{{ $bankname }}</option>
                            @endforeach
                        </select>
                    </label>
                @endif
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Pemilik {{ $form->type }}</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.pic'),
                    ]) wire:model="form.pic"
                        placeholder="Nama pemilik" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">{{ $form->type == 'rekening' ? 'Nomor rekening' : 'Alamat' }}</span>
                    </div>
                    <textarea type="text" @class([
                        'textarea textarea-bordered',
                        'textarea-error' => $errors->first('form.value'),
                    ]) wire:model="form.value" rows="3"></textarea>
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
