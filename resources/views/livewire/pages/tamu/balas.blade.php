<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <div class="card-title">Balas ucapan {{ $form->name }}</div>
            <div class="py-4 space-y-2">
                <div class="chat chat-start space-y-4">
                    <div class="chat-bubble">{{ $form->message }}</div>
                </div>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Balas ucapan</span>
                    </div>
                    <textarea @class([
                        'textarea textarea-bordered',
                        'textarea-error' => $errors->first('form.reply'),
                    ]) wire:model.live="form.reply"></textarea>
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
