<div class="page-wrapper">

    @livewire('partial.header', [
        'title' => 'Tema undangan',
    ])

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Pilih tema undangan</h3>
            <div class="py-4">
                <div class="grid grid-cols-4 py-4 gap-4">
                    @foreach ($temas as $tema)
                        <button class="card card-compact bg-base-200 cursor-pointer border-0 text-left"
                            data-theme="{{ $tema->name }}" wire:click="updateTema({{ $tema->id }})">
                            <div class="card-body">
                                <div class="flex justify-between">
                                    <h4 class="card-title text-base capitalize">{{ $tema->name }}</h4>
                                    @if ($undangan->tema_id == $tema->id)
                                        <x-tabler-circle-check class="text-primary" />
                                    @endif
                                </div>
                                <p class="text-xs opacity-50 line-clamp-2">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit.
                                    Sequi, laborum.
                                </p>
                                <div class="flex gap-1">
                                    @foreach (['bg-primary', 'bg-success', 'bg-warning', 'bg-error', 'bg-info'] as $color)
                                        <span class="size-3 rounded-box {{ $color }}"></span>
                                    @endforeach
                                </div>
                            </div>
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @livewire('partial.header', [
        'title' => 'Audio undangan',
    ])

    <div class="card">
        <div class="card-body">
            <div class="py-4">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur sequi rem fugit ducimus
                architecto, ex commodi nam possimus? Nam, quas officiis iusto non tempora cupiditate quod fugiat
                delectus voluptates distinctio.
            </div>
        </div>
    </div>
</div>
