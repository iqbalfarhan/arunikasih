<div class="publish">
    @if ($undangan->ornament_id)
        @livewire('partial.bgornament', ['ornament_id' => $undangan->ornament_id, 'light' => true])
    @endif

    @if ($undangan->can('cover undangan'))
        <input type="checkbox" id="my_modal_6" class="modal-toggle" @checked($cover) />
        <div class="modal" role="dialog">
            <div
                class="modal-box space-y-10 text-center flex flex-col items-center justify-center shadow-primary h-full">
                @if ($undangan->ornament_id)
                    @livewire('partial.bgornament', ['ornament_id' => $undangan->ornament_id, 'light' => false])
                @endif
                <p>Undangan {{ $undangan->kategori->name }}</p>
                <div class="flex relative justify-center items-center">
                    <img src="{{ $undangan->ornament->default_ring ?? '' }}" alt="" class="w-48 h-48 z-10">
                    <div class="avatar absolute">
                        <div class="w-40 rounded-full">
                            <img src="{{ $undangan->image }}" alt="">
                        </div>
                    </div>
                </div>
                <h2>{{ $undangan->name }}</h2>
                <div class="">
                    @livewire('partial.countdown', ['tanggal' => $undangan->event_date])
                    <p class="py-4">{{ $undangan->event_date->format('d F Y') }}</p>
                </div>
                <button wire:click="toggleCover" class="btn btn-primary z-10">
                    <x-tabler-mail class="size-5" />
                    <span>Buka undangan</span>
                </button>
            </div>
        </div>
    @endif


    @if ($undangan->kategori->name == 'pernikahan')
        {{-- intro --}}
        @if ($undangan->can('intro undangan'))
            <section id="cover" class="card min-h-screen">
                <div class="card-body items-center text-center">
                    <div class="space-y-6">
                        <p>Undangan {{ $undangan->kategori->name }}</p>
                        <div class="flex relative justify-center items-center">
                            <img src="{{ $undangan->ornament->default_ring ?? '' }}" alt=""
                                class="w-48 h-48 z-10">
                            <div class="avatar absolute">
                                <div class="w-40 rounded-full">
                                    <img src="{{ $undangan->image }}" alt="">
                                </div>
                            </div>
                        </div>
                        <h1>{{ $undangan->name }}</h1>
                        <p>Assalamualaikum warohmatullohi wabarokatuh.</p>
                        @if ($undangan->ayat)
                            <div class="italic space-y-2">
                                <p>“{{ $undangan->ayat->content }}”.</p>
                                <p>(~ {{ $undangan->ayat->surah }} ~)</p>
                            </div>
                        @endif
                        <p>Melalui undangan ini kami, mengundang bapak, ibu dan rekan sekalian untuk menghadiri acara
                            pernikahan kami :</p>
                    </div>
                </div>
            </section>
        @endif
        {{-- pengantin --}}
        @if ($undangan->can('data pengantin'))
            <section id="pengantin" class="card">
                <div class="card-body items-center text-center">
                    <div class="space-y-10">
                        <h2>Kami yang berbahagia</h2>
                        <p>Kami adalah dua jiwa yang dipersatukan oleh cinta. Di sini, kami ingin memperkenalkan diri
                            kepada
                            Anda, serta orangtua yang telah membimbing dan mencintai kami dalam setiap langkah
                            kehidupan.
                        </p>
                        <div class="grid md:grid-cols-2">
                            @foreach ($undangan->pengantins as $pengantin)
                                <div class="card border-0 bg-transparent" wire:transition>
                                    <div class="card-body text-center items-center space-y-2">
                                        <div class="flex relative justify-center items-center">
                                            <img src="{{ $undangan->ornament->default_ring ?? '' }}" alt=""
                                                class="w-48 h-48 z-10">
                                            <div class="avatar absolute">
                                                <div class="w-40 rounded-full">
                                                    <img src="{{ $pengantin->image }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="text-3xl font-semibold">{{ $pengantin->name }}</h3>
                                        <p>{{ $pengantin->text }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif
        {{-- event --}}
        @if ($undangan->can('detail acara'))
            <section id="event" class="card">
                <div class="card-body items-center text-center">
                    <h2>Tanggal Acara</h2>
                    <p>Dengan penuh kebahagiaan, kami mengundang Anda untuk menjadi bagian dari hari istimewa kami.</p>

                    @livewire('partial.countdown', ['tanggal' => $undangan->event_date])

                    <div class="grid md:grid-cols-2 gap-4">
                        @foreach ($undangan->events as $event)
                            <div class="card card-compact border-0 bg-transparent">
                                <div class="card-body">
                                    <figure>
                                        <iframe class="w-full aspect-video rounded-box" frameborder="0"
                                            src="https://maps.google.com/maps?q={{ $event->location_name }}&amp;output=embed"></iframe>
                                    </figure>
                                    <div class="flex flex-col items-center gap-2">
                                        <h5 class="card-title text-center">{{ $event->name }}</h5>
                                        <p class="text-base">{{ $event->location_name }} tanggal
                                            {{ $event->datetime->format('d F Y \j\a\m H:i') }} - selesai
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        {{-- moment kami --}}
        @if ($undangan->can('photo prewedding'))
            <section id="moment" class="card">
                <div class="card-body items-center text-center">
                    <h2>Moment Kami</h2>

                    <p>Setiap momen adalah kisah abadi, inilah potongan perjalanan cinta kami sebelum hari bahagia tiba.
                    </p>

                    <div class="columns-2 md:columns-2 lg:columns-3 space-y-4">
                        @foreach ($undangan->galleries->pluck('filename') as $image)
                            <div class="break-inside-avoid">
                                <img src="{{ Storage::url($image) }}" alt="" class="w-full rounded-box">
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        {{-- kisah --}}
        @if ($undangan->can('kisah cinta'))
            <section id="kisah" class="card">
                <div class="card-body items-center text-center">
                    <h2>Perjalanan kisah cinta</h2>
                    <p>Setiap langkah dalam perjalanan cinta kami menyimpan cerita berharga. Di sini, kami berbagi momen
                        istimewa dari awal pertemuan hingga hari bahagia.</p>


                    <ol class="steps steps-vertical">
                        @foreach ($undangan->kisahs as $kisah)
                            <li class="step">
                                <div class="font-semibold text-left py-4">
                                    <div class="font-bold">{{ $kisah->title }}</div>
                                    <p class="text-left">{{ $kisah->content }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </section>
        @endif
        {{-- ucapan --}}
        @if ($undangan->can('rsvp dan ucapan'))
            <section id="ucapan" class="card">
                <div class="card-body items-center text-center">
                    <h2>Ucapan Syukur</h2>

                    <p>Kami bersyukur atas kehadiran serta ucapan selamat dari tamu yang membuat hari istimewa kami
                        semakin
                        berarti.</p>

                    <div class="flex flex-col text-left text-base w-full">
                        @foreach ($undangan->tamus->take(4) as $tamu)
                            <div class="chat chat-end">
                                <div class="chat-image avatar">
                                    <div class="w-10 rounded-full">
                                        <img alt="Tailwind CSS chat bubble component"
                                            src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                                    </div>
                                </div>
                                <div class="chat-bubble chat-bubble-accent space-y-1 max-w-lg text-sm">
                                    <div class="chat-header flex justify-between">
                                        <div class="chat-footer opacity-50 text-xs">
                                            {{ $tamu->created_at->format('d M Y') }}
                                        </div>
                                        <span class="font-bold">{{ $tamu->name }}</span>
                                    </div>
                                    <p class="text-right">{{ $tamu->message }}</p>
                                </div>
                            </div>
                            @if ($tamu->reply)
                                <div class="chat chat-start space-y-1">
                                    <div class="chat-image avatar">
                                        <div class="w-10 rounded-full">
                                            <img alt="" src="{{ $undangan->image }}" />
                                        </div>
                                    </div>
                                    <div class="chat-bubble chat-bubble-accent space-y-1 max-w-lg text-sm">
                                        <div class="chat-header flex justify-between">
                                            <span class="font-bold">{{ $undangan->name }}</span>
                                            <div class="chat-footer opacity-50 text-xs">
                                                {{ $tamu->created_at->format('d M Y') }}
                                            </div>
                                        </div>
                                        <p>{{ $tamu->reply }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <button class="btn btn-primary" wire:click="dispatch('openChat', {tamu: {{ $tamu->id }}})">
                        <x-tabler-edit />
                        <span>Tulis ucapan dan doa</span>
                    </button>

                    @livewire('pages.undangan.chat')
                </div>
            </section>
        @endif
        {{-- live streaming --}}
        @if ($undangan->can('live streaming'))
            <section id="streaming" class="card">
                <div class="card-body items-center text-center">
                    <h2>Saksikan Momen Berharga Kami</h2>
                    <p>Nikmati momen bahagia kami secara langsung! Temukan tautan di bawah ini untuk menyaksikan prosesi
                        akad
                        dan resepsi, sehingga Anda bisa ikut merayakan cinta kami meski dari jauh.</p>

                    <div class="grid grid-cols-3 gap-6">
                        @foreach ($undangan->streamings as $stream)
                            <div class="card bg-transparent border-0">
                                <div class="card-body">
                                    <div class="avatar">
                                        <div class="w-16">
                                            <img src="{{ $stream->sosmed->image }}" alt="" class="w-full">
                                        </div>
                                    </div>
                                    <a href="{{ $stream->url }}">
                                        {{ $stream->sosmed->name }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        {{-- hadiah --}}
        @if ($undangan->can('hadiah dan rekening'))
            <section id="hadiah" class="card">
                <div class="card-body items-center text-center">
                    <h2>Hadiah kasih</h2>
                    <p>Jika Anda ingin memberikan hadiah, kami menyediakan alamat pengiriman dan nomor rekening untuk
                        ucapan
                        selamat. Kehadiran Anda adalah anugerah terindah bagi kami.</p>

                    <div class="flex flex-col gap-3">
                        @foreach ($undangan->hadiahs as $hadiah)
                            <div class="card card-compact border-0 bg-base-200 max-w-lg">
                                <div class="card-body">
                                    <div class="flex justify-start w-full gap-3">
                                        @if ($hadiah->type == 'rekening')
                                            <div class="avatar">
                                                <div class="size-12 rounded-box">
                                                    <img src="{{ $hadiah->bank?->image }}" alt=""
                                                        class="w-full">
                                                </div>
                                            </div>
                                        @else
                                            <div class="avatar placeholder">
                                                <div class="size-12 rounded-box bg-primary">
                                                    <x-tabler-home class="size-6 text-primary-content" />
                                                </div>
                                            </div>
                                        @endif
                                        <div class="text-left">
                                            <h4 class="card-title">
                                                {{ $hadiah->type == 'rekening' ? $hadiah->bank->name : 'Alamat rumah' }}
                                            </h4>
                                            <p>{{ $hadiah->value }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        {{-- protokol --}}
        @if ($undangan->can('protokol kesehatan'))
            <section id="protokol" class="card">
                <div class="card-body items-center text-center">
                    <div class="space-y-10">
                        <h2>Protokol kesehatan</h2>
                        <p>Dalam upaya mengurangi penyebaran Covid 19 pada masa pandemi, kami harapkan kedatangan para
                            tamu
                            undangan agar menjalankan protokol yang berlaku.</p>

                        <div class="grid grid-cols-3 gap-6">
                            <div class="flex flex-col justify-center items-center gap-4">
                                <img src="{{ url('prokes/washhand.png') }}" alt="" class="w-24">
                                <p>Mencuci tangan</p>
                            </div>
                            <div class="flex flex-col justify-center items-center gap-4">
                                <img src="{{ url('prokes/distancing.png') }}" alt="" class="w-24">
                                <p>Menjaga jarak</p>
                            </div>
                            <div class="flex flex-col justify-center items-center gap-4">
                                <img src="{{ url('prokes/wearmask.png') }}" alt="" class="w-24">
                                <p>Mengenakan masker</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @elseif($undangan->kategori->name == 'aqiqah')
        {{-- intro --}}
        <section id="intro" class="card">
            <div class="card-body items-center text-center">
                <div class="space-y-10">
                    <h3 class="card-title">Undangan aqiqah</h3>
                    <p>Assalamualaikum warohmatullahi wabarokatuh</p>
                    <p>Alhamdulillah telah lahir anak pertama kami yang bernama</p>
                    <h2>Prana dian adriyani</h2>
                    <p>Berjenis kelamin perempuan, pada 28 Juni 1996</p>
                    <p>Beriukut kami ingin melangsungkan acara aqiqahan anak kami pada</p>
                    <p>Demikian undangan ini kami sampaikan,m semoga bapak/ibu/saudara/saudari berkenann untuk datang
                        pada acara
                        tersebut</p>
                    <p>Wassalamualaikum warohmatullahi wabarokatuh</p>
                </div>
            </div>
        </section>
        {{-- bayi --}}
        <section id="intro" class="card">
            <div class="card-body items-center text-center">
                <div class="space-y-10">
                    <h3 class="card-title">Undangan aqiqah</h3>
                    <p>Assalamualaikum warohmatullahi wabarokatuh</p>
                    <p>Alhamdulillah telah lahir anak pertama kami yang bernama</p>
                    <h2>Prana dian adriyani</h2>
                    <p>Berjenis kelamin perempuan, pada 28 Juni 1996</p>
                    <p>Beriukut kami ingin melangsungkan acara aqiqahan anak kami pada</p>
                    <p>Demikian undangan ini kami sampaikan,m semoga bapak/ibu/saudara/saudari berkenann untuk datang
                        pada acara
                        tersebut</p>
                    <p>Wassalamualaikum warohmatullahi wabarokatuh</p>
                </div>
            </div>
        </section>
        {{-- event --}}
        <section id="intro" class="card">
            <div class="card-body items-center text-center">
                <div class="space-y-10">
                    <h3 class="card-title">Undangan aqiqah</h3>
                    <p>Assalamualaikum warohmatullahi wabarokatuh</p>
                    <p>Alhamdulillah telah lahir anak pertama kami yang bernama</p>
                    <h2>Prana dian adriyani</h2>
                    <p>Berjenis kelamin perempuan, pada 28 Juni 1996</p>
                    <p>Beriukut kami ingin melangsungkan acara aqiqahan anak kami pada</p>
                    <p>Demikian undangan ini kami sampaikan,m semoga bapak/ibu/saudara/saudari berkenann untuk datang
                        pada acara
                        tersebut</p>
                    <p>Wassalamualaikum warohmatullahi wabarokatuh</p>
                </div>
            </div>
        </section>
    @endif

    {{-- terimakasih --}}
    <section id="terimakasih" class="card min-h-screen">
        <div class="card-body items-center text-center">
            <div class="space-y-6">
                <h2>Terimakasih</h2>

                <div class="flex relative justify-center items-center">
                    <img src="{{ $undangan->ornament->default_ring ?? '' }}" alt="" class="w-48 h-48 z-10">
                    <div class="avatar absolute">
                        <div class="w-40 rounded-full">
                            <img src="{{ $undangan->image }}" alt="">
                        </div>
                    </div>
                </div>

                <p>Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/I berkenan hadir
                    untuk
                    memberikan do'a restu kepada kami</p>

                <p>Wassalamu'alaikum Warahmatullahi Wabarakatuh.</p>
                <div>
                    <button wire:click="toggleCover" class="btn btn-primary">
                        <x-tabler-mail class="size-5" />
                        <span>Tutup undangan</span>
                    </button>
                </div>
                <p class="!text-base opacity-50">Undangan ini dibuat dengan <span class="text-red-500">❤</span>
                    oleh<br>arunikasih.com</p>
            </div>
        </div>
    </section>
</div>
