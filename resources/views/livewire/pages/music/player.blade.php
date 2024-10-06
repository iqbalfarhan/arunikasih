<div @class(['card card-compact', 'hidden' => !$music])>
    <div class="card-body">
        <div class="flex gap-4 items-center">
            <div class="flex items-center">
                <button class="btn btn-circle">
                    <x-tabler-disc class="size-6 animate-spin" />
                </button>
            </div>
            <div class="flex flex-col flex-1 gap-2">
                <span>{{ $music?->artist }} - {{ $music?->title }}</span>
                <div class="progress"></div>
            </div>
            <div class="flex items-center">
                <button class="btn btn-circle btn-ghost" wire:click="resetMusic">
                    <x-tabler-x class="size-5" />
                </button>
            </div>
        </div>
    </div>
</div>
