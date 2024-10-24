<div class="page-wrapper">

    @livewire('partial.header', [
        'title' => 'Detail undangan',
    ])

    @if ($undangan->paid)
        <div class="table-filter-wrapper">
            <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">

            <button wire:click="togglePublish" @class([
                'btn btn-primary',
                '' => $undangan->shared,
                'btn-outline' => !$undangan->shared,
            ])>
                @if ($undangan->shared)
                    <x-tabler-check class="size-5" />
                @else
                    <x-tabler-x class="size-5" />
                @endif
                <span>Undangan : {{ $undangan->shared ? 'dibagikan' : 'tidak dibagikan' }}</span>
            </button>
        </div>

        @if ($undangan->shared)
            <div class="table-wrapper">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Nama tamu</th>
                        <th>Share link</th>
                        <th>Dibagikan</th>
                        <th>Dibaca</th>
                        <th class="text-center">Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($tamus as $tamu)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ Str::limit($tamu->name, 15) }}
                                </td>
                                <td class="text-xs opacity-75">
                                    {{ Str::limit($tamu->link, 70) }}
                                </td>
                                <td>
                                    @if ($tamu->shared)
                                        <div class="flex gap-1 justify-center">
                                            <button class="btn btn-xs btn-square">
                                                <x-tabler-check class="size-4 text-primary" />
                                            </button>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @if ($tamu->read)
                                        <div class="flex gap-1 justify-center">
                                            <button class="btn btn-xs btn-square">
                                                <x-tabler-check class="size-4 text-primary" />
                                            </button>
                                        </div>
                                    @endif
                                </td>
                                @canany(['undangan.edit', 'undangan.delete'])
                                    <td>
                                        <div class="flex gap-1 justify-center">
                                            @can('undangan.show')
                                                <button class="btn btn-xs btn-bordered"
                                                    wire:click="dispatch('shareTamu', {tamu: {{ $tamu->id }}})">
                                                    <x-tabler-share class="size-4" />
                                                    <span>Share</span>
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
        @else
            <div class="card">
                <div class="card-body items-center">
                    <h3 class="card-title">Undangan belum dibagikan</h3>
                    <p class="text-sm opacity-75">Mohon maaf, undangan anda belum dibagikan ke tamu yang
                        ingin melihat.</p>
                </div>
            </div>
        @endif
    @else
        <div class="card max-w-lg mx-auto">
            <div class="card-body">
                <h3 class="card-title">Publish undangan ditunda</h3>
                <div class="py-4">
                    <p class="text-sm opacity-75">Mohon maaf arunkasih belum bisa mempublish undangan anda sampai
                        pembayaran
                        diselesaikan.</p>
                </div>
                <div class="card-actions">
                    <a href="{{ route('pembayaran.show', $undangan->pembayaran) }}" class="btn btn-warning">
                        <x-tabler-credit-card class="size-5" />
                        <span>Selesaikan pembayaran</span>
                    </a>
                </div>
            </div>
        </div>
    @endif

    @livewire('pages.tamu.share')
</div>
