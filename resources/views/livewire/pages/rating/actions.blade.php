<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <div class="card-title">Form rating</div>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama rating</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.user_id'),
                    ]) wire:model="form.user_id"
                        placeholder="Nama lengkap rating" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Masukan dan saran</span>
                    </div>
                    <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.insight'),
                    ]) wire:model="form.insight"
                        placeholder="Nama lengkap rating" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Rate number</span>
                    </div>
                    {{-- <input type="text" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.rate'),
                    ]) wire:model="form.rate"
                        placeholder="Nama lengkap rating" /> --}}
                    <div class="rating">
                        <input type="radio" wire:model="form.rate" value="1"
                            class="mask mask-star-2 bg-orange-400" />
                        <input type="radio" wire:model="form.rate" value="2"
                            class="mask mask-star-2 bg-orange-400" />
                        <input type="radio" wire:model="form.rate" value="3"
                            class="mask mask-star-2 bg-orange-400" />
                        <input type="radio" wire:model="form.rate" value="4"
                            class="mask mask-star-2 bg-orange-400" />
                        <input type="radio" wire:model="form.rate" value="5"
                            class="mask mask-star-2 bg-orange-400" />
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
