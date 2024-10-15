<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <div class="card-title">Form tamu</div>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama tamu</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.name'),
                    ]) wire:model.live="form.name"
                        placeholder="Nama lengkap tamu" />
                </label>

                @if ($undangan)
                    <p class="text-sm">
                        {{ $undangan->link }}?{{ http_build_query(['yth' => $form->name]) }}
                    </p>
                @endif

                @if ($form->message)
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">Ucapan dari tamu</span>
                        </div>
                        <div class="chat chat-end">
                            <div class="chat-bubble">{{ $form->message }}</div>
                        </div>
                    </label>
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">Reply ucapan</span>
                        </div>
                        <textarea type="text" @class([
                            'textarea textarea-bordered',
                            'textarea-error' => $errors->first('form.reply'),
                        ]) wire:model.live="form.reply" rows="5" placeholder="Balasan"></textarea>
                    </label>
                @endif
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
