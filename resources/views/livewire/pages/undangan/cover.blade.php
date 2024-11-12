<div class="page-wrapper">

    @livewire('partial.header', [
        'title' => 'Detail undangan',
    ])

    <div class="card max-w-sm mx-auto relative">
        <div class="card-body text-center items-center space-y-10">
            <p>Undangan {{ $undangan->kategori->name }}</p>
            <div class="avatar">
                <div class="w-32 rounded-full">
                    <img src="{{ $undangan->image }}" alt="">
                </div>
            </div>

            <div class="space-y-8">
                <h3 class="font-bold text-3xl">{{ $undangan->name }}</h3>
                @livewire('partial.countdown', ['tanggal' => $undangan->event_date])
                <p>{{ $undangan->event_date->format('d F Y H:i:s') }}</p>
            </div>

            <div class="card-actions">
                <button class="btn" wire:click="dispatch('editUndangan', {undangan: {{ $undangan->id }}})">
                    <x-tabler-edit class="size-5" />
                    <span>Edit sampul undangan</span>
                </button>
            </div>
        </div>
    </div>

    @livewire('pages.undangan.actions')
</div>
