<div class="page-wrapper">

    @livewire('partial.header', [
        'title' => 'Tema undangan',
    ])

    <div class="card">
        <div class="card-body space-y-4">
            <h3 class="card-title">Pilih tema undangan</h3>
            <div class="h-full max-h-80 overflow-y-auto scrollbar-hide rounded-box">
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($temas as $tema)
                        <div @class([
                            'card card-compact bg-base-200 cursor-pointer border-0 text-left opacity-50',
                            'ring ring-primary ring-inset ring-4 opacity-100' =>
                                $undangan->tema_id == $tema->id,
                        ]) data-theme="{{ $tema->name }}"
                            wire:click="updateTema({{ $tema->id }})">
                            <div class="card-body">
                                <div class="flex justify-between w-full">
                                    <h4 class="card-title text-base capitalize">{{ $tema->name }}</h4>
                                    <div class="flex gap-1">
                                        @foreach (['bg-primary', 'bg-success', 'bg-warning', 'bg-error', 'bg-info'] as $color)
                                            <span class="size-3 rounded-box {{ $color }}"></span>
                                        @endforeach
                                    </div>
                                </div>
                                <p class="text-xs opacity-50 line-clamp-2">Lorem ipsum dolor sit amet.
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @livewire('partial.header', [
        'title' => 'Audio undangan',
    ])

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Artist</th>
                <th>Song title</th>
                <th class="text-center">Actions</th>
            </thead>
            <tbody>
                @foreach ($musics as $audio)
                    <tr>
                        <td>{{ $audio->id }}</td>
                        <td>{{ $audio->artist }}</td>
                        <td>{{ $audio->title }}</td>
                        <td>
                            <div class="flex gap-1 justify-center">
                                @can('pengantin.edit')
                                    <button class="btn btn-xs btn-bordered"
                                        wire:click="$dispatch('editPengantin', {pengantin: {{ $audio->id }}})">
                                        <x-tabler-player-play class="size-4" />
                                        <span>play</span>
                                    </button>
                                @endcan
                                @can('pengantin.delete')
                                    <button @class([
                                        'btn btn-xs btn-bordered',
                                        'btn-primary' => $audio->id == $undangan->music_id,
                                    ]) wire:click="updateMusic({{ $audio->id }})">
                                        <x-tabler-check class="size-4" />
                                        <span>pilih</span>
                                    </button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('partial.header', [
        'title' => 'Pilihan ayat',
    ])

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Pilihan ayat</h3>
            <div class="grid grid-cols-3 gap-4 py-4">
                @foreach ($ayats as $ayat)
                    <div @class([
                        'card card-compact',
                        'border-primary text-primary' => $ayat->id == $undangan->ayat_id,
                    ]) wire:click="updateAyat({{ $ayat->id }})">
                        <div class="card-body">
                            <h3 class="card-title">{{ $ayat->surah }}</h3>
                            <p class="opacity-50 line-clamp-3">{{ $ayat->content }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
