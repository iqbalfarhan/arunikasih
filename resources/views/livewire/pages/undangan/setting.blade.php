<div class="page-wrapper">

    @livewire('partial.header', [
        'title' => 'Tema undangan',
    ])

    <div class="card divide-y-2 divide-base-300">
        <div class="card-body space-y-4">
            <div class="flex justify-between">
                <h3 class="card-title">Tema warna</h3>
                <h3 class="card-title text-primary bg-transparent text-sm capitalize"
                    data-theme="{{ $undangan->tema->name }}">
                    {{ $undangan->tema->name }}
                </h3>
            </div>
            <div class="h-full rounded-box">
                <div class="grid md:grid-cols-4 gap-3">
                    @foreach ($temas as $tema)
                        <div @class([
                            'card card-compact bg-base-200 cursor-pointer border-0 text-left',
                            'ring ring-primary ring-inset ring-4' => $undangan->tema_id == $tema->id,
                        ]) wire:click="updateTema({{ $tema->id }})"
                            data-theme="{{ $tema->name }}">
                            <div class="card-body">
                                <div class="flex justify-between w-full items-center">
                                    <h4 class="text-base-content capitalize">{{ $tema->name }}</h4>
                                    <div class="flex gap-1 bg-base-200 p-1 rounded-box">
                                        @foreach (['bg-primary', 'bg-secondary', 'bg-accent', 'bg-info'] as $color)
                                            <span class="size-3 rounded-box {{ $color }}"></span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card-body space-y-4">
            <h3 class="card-title">Pilih ornamen undangan</h3>
            <div class="h-full max-h-80 overflow-y-auto scrollbar-hide rounded-box">
                <div class="grid md:grid-cols-4 gap-3">
                    @foreach ($ornaments as $ornament)
                        <div @class([
                            'card card-compact bg-base-200 cursor-pointer border-0 text-left',
                            'ring ring-primary ring-inset ring-4' =>
                                $undangan->ornament_id == $ornament->id,
                        ]) wire:click="updateOrnament({{ $ornament->id }})">
                            <div class="card-body">
                                <div class="flex gap-4 w-full items-center">
                                    <div class="avatar">
                                        <div class="w-10">
                                            <img src="{{ Storage::url($ornament->ring) }}" alt="">
                                        </div>
                                    </div>
                                    <h4 class="text-base capitalize">{{ $ornament->name }}</h4>
                                </div>
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
            <div class="flex justify-between items-center">
                <h3 class="card-title">Pilihan ayat</h3>
                <button wire:click="hapusAyat" class="btn btn-sm">Reset</button>
            </div>
            <div class="grid md:grid-cols-3 gap-4 py-4">
                @foreach ($ayats as $ayat)
                    <div @class([
                        'card card-compact border-4',
                        'border-primary text-primary' => $ayat->id == $undangan->ayat_id,
                    ]) wire:click="updateAyat({{ $ayat->id }})">
                        <div class="card-body">
                            <h3 class="card-title">{{ $ayat->surah }}</h3>
                            <p class="opacity-50 line-clamp-3 text-sm">{{ $ayat->content }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
