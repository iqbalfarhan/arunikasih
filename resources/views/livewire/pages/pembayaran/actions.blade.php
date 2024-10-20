<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <div class="card-title">Form pembayaran</div>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="radio" wire:model="form.confirmed" value="0"
                                class="radio radio-error" />
                            <span class="label-text">Unpaid belum dikonfirmasi</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="radio" wire:model="form.confirmed" value="1"
                                class="radio radio-success" />
                            <span class="label-text">Paid sudah dikonfirmasi</span>
                        </label>
                    </div>
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
