<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal modal-bottom sm:modal-middle" role="dialog">
        <form class="modal-box w-full md:max-w-sm" wire:submit="simpan">
            <div class="text-lg font-bold">Ucapat & Doa dari {{ $form?->name }}</div>
            <div class="py-4 space-y-4">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Ucapan dan doa</span>
                    </div>
                    <textarea @class(['textarea textarea-bordered', 'textarea-error' => false]) placeholder="Ucapan dan doa" wire:model="form.message" rows="7"></textarea>
                </label>

                <div class="form-control">
                    <label class="label cursor-pointer justify-start space-x-3">
                        <input type="checkbox" @checked($form->present) wire:click="toggePresent"
                            class="checkbox" />
                        <span class="label-text">Saya berencana hadir</span>
                    </label>
                </div>
            </div>
            <div class="modal-action justify-between">
                <button type="button" wire:click="closeModal" class="btn btn-ghost">Close</button>
                <button class="btn btn-primary">
                    <x-tabler-check class="size-5" />
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>
