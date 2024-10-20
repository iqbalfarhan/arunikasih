<div class="card card-compact bg-base-200 border-0 w-full md:max-w-64" data-theme="{{ $undangan->tema->name ?? '' }}">
    <div class="card-body space-y-12">
        <div class="flex justify-between items-center">
            <div>
                <span class="text-xs opacity-50">{{ $undangan->kategori->name ?? '' }}</span>
                <h3 class="font-bold">{{ $undangan->name }}</h3>
            </div>
            <div @class([
                'badge badge-sm badge-error',
                '!badge-success' => $undangan->paid,
            ])>{{ $undangan->paid ? 'paid' : 'unpaid' }}</div>
        </div>
        <div class="flex flex-col justify-between items-center">
            <div class="avatar">
                <div class="w-24 rounded-full">
                    <img src="{{ $undangan->image }}" alt="">
                </div>
            </div>
        </div>
        <div class="space-y-4">
            <p class="text-xs opacity-50 line-clamp-3">
                paket {{ $undangan->paket->name ?? 'tidak ada paket' }}
                {{ implode(', ', array_keys($undangan->partials ?? [])) }}
            </p>

            <div class="text-xs">{{ $undangan->created_at->diffForHumans() }}</div>
        </div>
    </div>
</div>
