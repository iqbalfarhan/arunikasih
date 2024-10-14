<div class="page-wrapper">

    @livewire('partial.header', [
        'title' => 'Detail undangan',
    ])

    <div class="card max-w-lg mx-auto relative">
        <div class="card-body text-center items-center space-y-10">
            <p>undangan {{ $undangan->kategori->name }}</p>
            <div class="avatar">
                <div class="w-32 rounded-full shadow-lg">
                    <img src="{{ $undangan->image }}" />
                </div>
            </div>
            <div class="flex flex-col justify-center items-center">
                <h3 class="font-bold text-3xl">{{ $undangan->name }}</h3>
                <p>{{ $undangan->event_date->format('d F Y') }}</p>
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
