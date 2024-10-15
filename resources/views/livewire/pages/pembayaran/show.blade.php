<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Detail pembayaran',
    ])
    <div class="grid md:grid-cols-2 gap-6">
        <div class="card h-fit">
            <div class="card-body space-y-4">
                <h3 class="card-title">Pembayaran undangan</h3>
                <p class="text-sm opacity-75">Lakukan pembayaran undangan pada e-wallet berikut ini, untuk undangan
                    {{ $pembayaran->undangan->kategori->name ?? '...' }} paket
                    {{ $pembayaran->undangan->paket->name ?? '...' }} dengan harga
                    {{ $pembayaran->undangan->paket->price ?? '...' }}</p>
                <div class="card border-0 bg-base-200">
                    <div class="card-body space-y-4">
                        <div class="flex flex-row gap-3 items-center justify-center">
                            <div class="avatar">
                                <div class="w-12 rounded-box">
                                    <img src="https://a.m.dana.id/danaweb/web/dana-meta-logo.png" alt="">
                                </div>
                            </div>
                            <div class="flex-1 divide-y-2 divide-base-100 space-y-3">
                                <div>
                                    <h3 class="font-bold">Iqbal farhan syuhada</h3>
                                    <p>08999779527</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <span>Amount</span>
                            <h3 class="text-right w-full text-lg">
                                Rp. {{ Number::format($pembayaran->undangan->paket->price, locale: 'de') }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card h-fit">
            <div class="card-body space-y-4">
                <h3 class="card-title">Konfirmasi pembayaran</h3>
                <p class="opacity-75 text-sm">isi form berikut ini untuk konfirmasi pembayaran apabila status pembayaran
                    undangan tidak berubah dalam waktu 10 menit.</p>
                <div class="space-y-2">
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">Upload bukti bayar</span>
                        </div>
                        <input type="file" @class([
                            'file-input file-input-bordered',
                            'file-input-error' => $errors->first('buktibayar'),
                        ]) wire:model="buktibayar" accept="image/*" />
                    </label>
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">Catatan lainnya</span>
                        </div>
                        <textarea @class([
                            'textarea textarea-bordered',
                            'textarea-error' => $errors->first('form.notes'),
                        ]) wire:model="form.notes" placeholder="Tambahkan catatan transfer" rows="5"></textarea>
                    </label>
                </div>
                <div class="card-actions">
                    <button class="btn btn-primary">
                        <x-tabler-check class="size-5" />
                        <span>Konfirmasi</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
