<div class="card card-compact">
    <div class="card-body flex flex-row gap-4 items-center">
        <div class="avatar">
            <div class="w-12 rounded-full">
                <img src="{{ $user->image }}" alt="">
            </div>
        </div>
        <div class="flex flex-col flex-1">
            <div class="text-lg font-bold">{{ $user->name }}</div>
            <div class="text-sm">{{ $user->email }}</div>
        </div>
        <div class="hidden lg:flex">
            <a href="{{ route('profile') }}" class="btn btn-sm btn-bordered" wire:navigate>
                <x-tabler-edit class="size-4" />
                <span>Profile</span>
            </a>
        </div>
    </div>
</div>
