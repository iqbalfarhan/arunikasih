<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Pembayaran management',
    ])
    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @can('pembayaran.create')
            <button class="btn btn-primary" wire:click="$dispatch('createPembayaran')">
                <x-tabler-plus class="size-5" />
                <span>Tambah pembayaran</span>
            </button>
        @endcan
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>User</th>
                <th>Undangan</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Confirmed at</th>
                @canany(['pembayaran.show', 'pembayaran.edit', 'pembayaran.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->undangan->user->name ?? '' }}</td>
                        <td>{{ $data->undangan->name ?? '' }}</td>
                        <td>Rp. {{ Number::format($data->amount, locale: 'de') }}</td>
                        <td>
                            @if ($data->confirmed)
                                <div class="badge badge-sm badge-success">Paid</div>
                            @else
                                <div class="badge badge-sm badge-error">Unpaid</div>
                            @endif
                        </td>
                        <td>
                            {{ $data->confirmed ? $data->confirmed_at->format('d F Y H:i:s') : '' }}
                        </td>
                        @canany(['pembayaran.show', 'pembayaran.edit', 'pembayaran.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('pembayaran.show')
                                        <a href="{{ route('pembayaran.show', $data) }}"
                                            class="btn btn-xs btn-square btn-bordered">
                                            <x-tabler-eye class="size-4" />
                                        </a>
                                    @endcan
                                    @can('pembayaran.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editPembayaran', {pembayaran: {{ $data->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('pembayaran.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deletePembayaran', {pembayaran: {{ $data->id }}})">
                                            <x-tabler-trash class="size-4" />
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        @endcanany
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('pages.pembayaran.actions')
</div>
