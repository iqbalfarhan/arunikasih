<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <div class="card-title">Form rating</div>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Masukan dan saran</span>
                    </div>
                    <textarea type="text" @class([
                        'textarea textarea-bordered',
                        'textarea-error' => $errors->first('form.insight'),
                    ]) wire:model="form.insight" placeholder="Review dan masukan"
                        rows="7">
                    </textarea>
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Rate number</span>
                    </div>
                    <div class="rating">
                        <input type="radio" wire:model="form.rate" value="1"
                            class="mask mask-star-2 bg-warning" />
                        <input type="radio" wire:model="form.rate" value="2"
                            class="mask mask-star-2 bg-warning" />
                        <input type="radio" wire:model="form.rate" value="3"
                            class="mask mask-star-2 bg-warning" />
                        <input type="radio" wire:model="form.rate" value="4"
                            class="mask mask-star-2 bg-warning" />
                        <input type="radio" wire:model="form.rate" value="5"
                            class="mask mask-star-2 bg-warning" />
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
