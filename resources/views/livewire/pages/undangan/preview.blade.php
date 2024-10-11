<div class="publish">
    {{-- <div>
        <img src="{{ url('ornament/botanicalpartial/botanicaltopleft.png') }}" alt=""
            class="animate__animated animate__fadeInDown animate__faster fixed top-0 left-0 !opacity-20">
        <img src="{{ url('ornament/botanicalpartial/botanicalbottomleft.png') }}" alt=""
            class="animate__animated animate__fadeInLeft animate__fast fixed bottom-0 left-0 !opacity-20">
        <img src="{{ url('ornament/botanicalpartial/botanicalbottomright.png') }}" alt=""
            class="animate__animated animate__fadeInRight animate__slow fixed bottom-0 right-0 !opacity-20">
    </div> --}}
    <div class="z-0">
        <img src="{{ url('ornament/lovepartial/lovetopleft.png') }}" alt=""
            class="animate__animated animate__fadeInDown animate__faster fixed top-0 left-0 !opacity-20">
        <img src="{{ url('ornament/lovepartial/lovebottomleft.png') }}" alt=""
            class="animate__animated animate__fadeInLeft animate__fast fixed bottom-0 left-0 !opacity-20">
        <img src="{{ url('ornament/lovepartial/lovebottomright.png') }}" alt=""
            class="animate__animated animate__fadeInRight animate__slow fixed bottom-0 right-0 !opacity-20">
    </div>

    @if ($cover)
        <section class="card min-h-screen">
            <div class="card-body">
                <div class="space-y-12">
                    <p>Undangan {{ $undangan->kategori->name }}</p>
                    <div class="flex relative justify-center items-center">
                        <img src="{{ url('ornament/circleornament2.png') }}" alt="" class="w-48 z-10">
                        <div class="avatar absolute">
                            <div class="w-40 rounded-full">
                                <img src="{{ $undangan->image }}" alt="">
                            </div>
                        </div>
                    </div>
                    <h2>{{ $undangan->name }}</h2>
                    <div class="">
                        @livewire('partial.countdown')
                        <p class="py-4">{{ $undangan->event_date->format('d F Y') }}</p>
                    </div>
                    <button wire:click="toggleCover" class="btn btn-primary">
                        <x-tabler-mail class="size-5" />
                        <span>Buka undangan</span>
                    </button>
                </div>
            </div>
        </section>
    @else
        {{-- cover --}}
        <section id="cover" class="card min-h-screen">
            <div class="card-body items-center text-center">
                <div class="space-y-6">
                    <p>Undangan {{ $undangan->kategori->name }}</p>
                    <div class="flex relative justify-center items-center">
                        <img src="{{ url('ornament/circleornament2.png') }}" alt="" class="w-48 z-10">
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
                        {{ $undangan->kategori->name }}
                        kami :</p>
                </div>
            </div>
        </section>
        {{-- pengantin --}}
        <section id="pengantin" class="card">
            <div class="card-body items-center text-center">
                <div class="space-y-10">
                    <h2>Kami yang berbahagia</h2>
                    <p>Kami adalah dua jiwa yang dipersatukan oleh cinta. Di sini, kami ingin memperkenalkan diri kepada
                        Anda, serta orangtua yang telah membimbing dan mencintai kami dalam setiap langkah kehidupan.
                    </p>
                    <div class="grid md:grid-cols-2">
                        @foreach ($undangan->pengantins as $pengantin)
                            <div class="card border-0 bg-transparent" wire:transition>
                                <div class="card-body text-center items-center space-y-2">
                                    <div class="flex relative justify-center items-center">
                                        <img src="{{ url('ornament/circleornament2.png') }}" alt=""
                                            class="w-48 z-10">
                                        <div class="avatar absolute">
                                            <div class="w-40 rounded-full">
                                                <img src="{{ $pengantin->image }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="avatar">
                                        <div class="w-32 bg-neutral rounded-full">
                                            <img src="{{ $pengantin->image }}" alt="">
                                        </div>
                                    </div> --}}
                                    <h3 class="text-3xl font-semibold">{{ $pengantin->name }}</h3>
                                    <p>{{ $pengantin->text }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        {{-- event --}}
        <section id="event" class="card">
            <div class="card-body items-center text-center">
                <h2>Tanggal Acara</h2>
                <p>Dengan penuh kebahagiaan, kami mengundang Anda untuk menjadi bagian dari hari istimewa kami.</p>

                @livewire('partial.countdown')

                <div class="grid md:grid-cols-2 gap-4">
                    @foreach ($undangan->events as $event)
                        <div class="card bg-base-200 border-0">
                            <figure>
                                <iframe class="w-full aspect-video" frameborder="0"
                                    src="https://maps.google.com/maps?q={{ $event->location_name }}&amp;output=embed"></iframe>
                            </figure>
                            <div class="card-body">
                                <div class="flex flex-col items-center gap-2">
                                    <h5 class="card-title text-center">{{ $event->name }}</h5>
                                    <p>{{ $event->location_name }} tanggal
                                        {{ $event->datetime->format('d F Y : H:i') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        {{-- moment kami --}}
        <section id="moment" class="card">
            <div class="card-body items-center text-center">
                <h2>Moment Kami</h2>

                <p>Setiap momen adalah kisah abadi, inilah potongan perjalanan cinta kami sebelum hari bahagia tiba.</p>

                <div class="columns-2 md:columns-2 lg:columns-3 space-y-4">
                    @foreach ($undangan->galleries->pluck('filename') as $image)
                        <div class="break-inside-avoid">
                            <img src="{{ Storage::url($image) }}" alt="" class="w-full rounded-box">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        {{-- kisah --}}
        <section id="kisah" class="card">
            <div class="card-body items-center text-center">
                <h2>Perjalanan kisah cinta</h2>
                <p>Setiap langkah dalam perjalanan cinta kami menyimpan cerita berharga. Di sini, kami berbagi momen
                    istimewa dari awal pertemuan hingga hari bahagia.</p>

                <ul class="timeline timeline-vertical">
                    @foreach ($undangan->kisahs as $kisah)
                        <li>
                            @if ($loop->first == false)
                                <hr>
                            @endif
                            <div class="timeline-start">{{ $kisah->title }}</div>
                            <div class="timeline-middle">
                                <x-tabler-arrow-right class="size-4" />
                            </div>
                            <div class="timeline-end timeline-box text-left">{{ $kisah->content }}</div>
                            @if ($loop->last == false)
                                <hr>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
        {{-- ucapan --}}
        <section id="ucapan" class="card">
            <div class="card-body items-center text-center">
                <h2>Ucapan Syukur</h2>

                <p>Kami bersyukur atas kehadiran serta ucapan selamat dari tamu yang membuat hari istimewa kami semakin
                    berarti.</p>

                <div class="flex flex-col text-left text-base w-full">
                    @foreach ($undangan->tamus->take(4) as $tamu)
                        <div class="chat chat-end">
                            <div class="chat-bubble chat-bubble-accent">
                                <div class="chat-header">
                                    <span class="font-bold">{{ $tamu->name }}</span>
                                </div>
                                {{ $tamu->message }}
                            </div>
                        </div>
                        @if ($tamu->reply)
                            <div class="chat chat-start">
                                <div class="chat-bubble chat-bubble-secondary">
                                    <div class="chat-header">
                                        <span class="font-bold">{{ $undangan->name }}</span>
                                    </div>
                                    {{ $tamu->reply }}
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <button class="btn btn-primary btn-circle">
                    <x-tabler-edit />
                </button>
            </div>
        </section>
        {{-- live streaming --}}
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
        {{-- hadiah --}}
        <section id="hadiah" class="card">
            <div class="card-body items-center text-center">
                <h2>Hadiah kasih</h2>
                <p>Jika Anda ingin memberikan hadiah, kami menyediakan alamat pengiriman dan nomor rekening untuk ucapan
                    selamat. Kehadiran Anda adalah anugerah terindah bagi kami.</p>
            </div>
        </section>
        {{-- protokol --}}
        <section id="protokol" class="card">
            <div class="card-body items-center text-center">
                <div class="space-y-10">
                    <h2>Protokol kesehatan</h2>
                    <p>Dalam upaya mengurangi penyebaran Covid 19 pada masa pandemi, kami harapkan kedatangan para tamu
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
        {{-- terimakasih --}}
        <section id="terimakasih" class="card min-h-screen">
            <div class="card-body">
                <div class="space-y-10">
                    <h2>Terimakasih</h2>

                    <div class="flex relative justify-center items-center">
                        <img src="{{ url('ornament/circleornament2.png') }}" alt="" class="w-48 z-10">
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
    @endif
</div>
