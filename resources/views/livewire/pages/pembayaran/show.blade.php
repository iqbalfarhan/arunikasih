<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Detail pembayaran',
    ])

    @if ($pembayaran->confirmed)
        <div class="card divide-y-2 divide-base-300 divide-dotted">
            <div class="card-body space-y-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="card-title">Invoice #{{ str_pad($pembayaran->id, 8, 0, STR_PAD_LEFT) }}</h3>
                        <p class="opacity-50 text-sm">{{ $pembayaran->confirmed_at->format('d F Y H:i:s') }}</p>
                    </div>
                    <button class="btn btn-sm btn-primary">Paid</button>
                </div>
            </div>
            <div class="card-body space-y-6">
                <div class="grid md:grid-cols-2">
                    <div class="text-left">
                        <span class="opacity-50 text-sm">Dari</span>
                        <h3 class="font-bold text-lg">{{ $pembayaran->undangan->user->name }}</h3>
                        <p class="opacity-50 text-sm">{{ $pembayaran->via }}</p>
                    </div>
                    <div class="text-right">
                        <span class="opacity-50 text-sm">Kepada</span>
                        <h3 class="font-bold text-lg">Iqbal Farhan Syuhada</h3>
                        <p class="opacity-50 text-sm">Dana [08999779527]</p>
                    </div>
                </div>
                <div class="table-wrapper border-0 rounded-none">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Undangan {{ $pembayaran->undangan->kategori->name }}
                                    {{ $pembayaran->undangan->paket->name }} [#{{ $pembayaran->undangan_id }}]</td>
                                <td>Rp {{ Number::format($pembayaran->amount, locale: 'de') }}</td>
                                <td>1</td>
                                <td>Rp {{ Number::format($pembayaran->amount, locale: 'de') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($pembayaran->evidence)
                <div class="card-body">
                    <h3 class="card-title">Attachment</h3>
                    <div class="avatar">
                        <div class="w-32 rounded-box">
                            <img src="{{ $pembayaran->image }}" alt="">
                        </div>
                    </div>
                </div>
            @endif
            <div class="card-body items-end text-right">
                <div class="flex flex-col items-end">
                    <p class="opacity-50 text-sm">Total pembayaran</p>
                    <h3 class="text-2xl font-bold">Rp {{ Number::format($pembayaran->amount, locale: 'de') }}</h3>
                </div>
            </div>
        </div>
    @else
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
                                        <p>0899 9779 527</p>
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
                <form class="card-body space-y-4" wire:submit="simpan">
                    <h3 class="card-title">Konfirmasi pembayaran</h3>
                    <p class="opacity-75 text-sm">Isi form berikut ini untuk konfirmasi pembayaran. Apabila status
                        pembayaran
                        undangan tidak berubah dalam waktu 10 menit, silakan hubungi admin arunikasih</p>
                    <div class="space-y-2">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">Pembayaran bank/ewallet</span>
                            </div>
                            <select @class([
                                'select select-bordered',
                                'select-error' => $errors->first('form.via'),
                            ]) wire:model="form.via">
                                <option value="">Pilih bank</option>
                                @foreach ($banks as $bankid => $bankname)
                                    <option value="{{ $bankname }}" wire:key="{{ $bankid }}">
                                        {{ $bankname }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">Upload bukti bayar</span>
                            </div>
                            <input type="file" @class([
                                'file-input file-input-bordered',
                                'file-input-error' => $errors->first('buktibayar'),
                            ]) wire:model="buktibayar"
                                accept="image/*" />
                        </label>
                        <div class="avatar">
                            <div class="w-24 rounded-box">
                                <img src="{{ $buktibayar ? $buktibayar->temporaryUrl() : $pembayaran->image }}" />
                            </div>
                        </div>
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">Catatan lainnya</span>
                            </div>
                            <textarea @class([
                                'textarea textarea-bordered',
                                'textarea-error' => $errors->first('form.notes'),
                            ]) wire:model="form.notes" placeholder="Tambahkan catatan transfer" rows="3"></textarea>
                        </label>
                    </div>
                    <div class="card-actions">
                        <button class="btn btn-primary">
                            <x-tabler-check class="size-5" />
                            <span>Konfirmasi</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
