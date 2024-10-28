<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Ucapan dan doa dari tamu',
    ])

    <div class="max-w-3xl mx-auto">
        @foreach ($datas as $data)
            <div class="chat chat-start">
                <div class="chat-image avatar placeholder">
                    <div class="w-10 rounded-full bg-primary">
                        <x-tabler-user class="text-primary-content" />
                    </div>
                </div>
                <div @class([
                    'btn btn-sm disabled chat-header text-error',
                    'text-success' => $data->present,
                ])>
                    {{ $data->name }}
                    {{ $data->present ? 'akan hadir' : 'tidak hadir' }}
                </div>
                <div class="chat-bubble max-w-sm">
                    {{ $data->message }}
                </div>
                <div class="chat-footer flex justify-between">
                    <span class="btn btn-xs btn-ghost">
                        {{ $data->created_at->diffForHumans() }}
                    </span>
                    <button class="btn btn-xs btn-ghost text-primary">
                        <x-tabler-arrow-back-up class="size-4" />
                        <span>Balas</span>
                    </button>
                </div>
            </div>

            @if ($data->reply)
                <div class="chat chat-end">
                    <div class="chat-image avatar">
                        <div class="w-10 rounded-full">
                            <img alt="Tailwind CSS chat bubble component" src="{{ $undangan->image }}" />
                        </div>
                    </div>
                    <div class="chat-bubble max-w-sm">{{ $data->reply }}</div>
                </div>
            @endif
        @endforeach
    </div>
</div>
