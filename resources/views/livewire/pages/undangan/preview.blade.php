<div class="publish">
    <img src="{{ url('ornament/plantornament.png') }}" alt=""
        class="fixed top-0 right-0 w-full max-w-2xl opacity-15 rotate-180">
    <img src="{{ url('ornament/plantornament.png') }}" alt="" class="fixed bottom-0 w-full max-w-2xl opacity-15">
    @if ($cover)
        <section class="card min-h-screen">
            <div class="card-body">
                <div class="space-y-10">
                    <p>Undangan {{ $undangan->kategori->name }}</p>
                    <div class="avatar">
                        <div class="w-32 bg-neutral rounded-full">
                            <img src="https://robohash.org/iqbal&prana" alt="">
                        </div>
                    </div>
                    <h2>{{ $undangan->name }}</h2>
                    @livewire('partial.countdown')
                    <p class="py-4">{{ $undangan->event_date->format('d F Y') }}</p>
                    <button wire:click="toggleCover" class="btn btn-primary">
                        <x-tabler-mail class="size-5" />
                        <span>Buka undangan</span>
                    </button>
                </div>
            </div>
        </section>
    @else
        <section class="card min-h-screen">
            <div class="card-body items-center text-center">
                <div class="space-y-6">
                    <p>Undangan {{ $undangan->kategori->name }}</p>
                    <div class="avatar">
                        <div class="w-32 bg-neutral rounded-full">
                            <img src="https://imgs.search.brave.com/RdGFv7pW5uQUwEgUy8VxAPc7b8ozWesjscUMSRkgH9A/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly93d3cu/ZWtycGljdHVyZXMu/Y29tL3dwLWNvbnRl/bnQvdXBsb2Fkcy8y/MDIxLzAyL0VLUi1Q/aWN0dXJlcy1QcmUt/V2VkZGluZy1waG90/b3Nob3RvLUJhbWZv/cmQtRWRnZTUtMTAy/NHg2ODMuanBn"
                                alt="">
                        </div>
                    </div>
                    <h1>{{ $undangan->name }}</h1>
                    <p>Assalamualaikum warohmatullohi wabarokatuh.</p>
                    @if ($undangan->ayat)
                        <p class="italic">“{{ $undangan->ayat->content }}”.<br />
                            (~ {{ $undangan->ayat->surah }} ~)</p>
                    @endif
                    <p>Melalui undangan ini kami, mengundang bapak, ibu dan rekan sekalian untuk menghadiri acara
                        {{ $undangan->kategori->name }}
                        kami :</p>
                </div>
            </div>
        </section>
        <section class="card">
            <div class="card-body items-center text-center">
                <div class="space-y-10">
                    <h2>Kami yang berbahagia</h2>
                    <p>Kami adalah dua jiwa yang dipersatukan oleh cinta. Di sini, kami ingin memperkenalkan diri kepada
                        Anda, serta orangtua yang telah membimbing dan mencintai kami dalam setiap langkah kehidupan.
                    </p>
                    <div class="grid md:grid-cols-2">
                        @foreach ($undangan->pengantins as $pengantin)
                            <div class="card border-0 bg-transparent">
                                <div class="card-body text-center items-center space-y-2">
                                    <div class="avatar">
                                        <div class="w-32 bg-neutral rounded-full">
                                            <img src="https://robohash.org/{{ $pengantin->name }}" alt="">
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
        <section class="card">
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
        <section class="card">
            <div class="card-body items-center text-center">
                <h2>Moment Kami</h2>

                <p>Setiap momen adalah kisah abadi, inilah potongan perjalanan cinta kami sebelum hari bahagia tiba.</p>

                <div class="columns-1 md:columns-2 space-y-4">
                    @foreach ($images as $image)
                        <div class="break-inside-avoid">
                            <img src="{{ $image }}" alt="" class="w-full rounded-box">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="card">
            <div class="card-body items-center text-center">
                <h2>Perjalanan kisah cinta</h2>
                <p>Setiap langkah dalam perjalanan cinta kami menyimpan cerita berharga. Di sini, kami berbagi momen
                    istimewa dari awal pertemuan hingga hari bahagia.</p>
            </div>
        </section>
        <section class="card">
            <div class="card-body items-center text-center">
                <h2>Ucapan Syukur</h2>

                <p>Kami bersyukur atas kehadiran serta ucapan selamat dari tamu yang membuat hari istimewa kami semakin
                    berarti.</p>

                <div class="flex flex-col text-left">
                    @foreach ($undangan->tamus->take(5) as $tamu)
                        <div class="chat chat-end">
                            <div class="chat-bubble chat-bubble-secondary">
                                <div class="chat-header">
                                    <span class="font-bold">{{ $tamu->name }}</span>
                                    <time class="text-xs opacity-50">{{ $tamu->created_at->diffForHumans() }}</time>
                                </div>
                                {{ $tamu->message }}
                            </div>
                        </div>

                        @if ($tamu->reply)
                            <div class="chat chat-start">
                                <div class="chat-bubble chat-bubble-secondary">
                                    <div class="chat-header">
                                        <span class="font-bold">{{ $undangan->name }}</span>
                                        <time
                                            class="text-xs opacity-50">{{ $tamu->created_at->diffForHumans() }}</time>
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
        <section class="card">
            <div class="card-body items-center text-center">
                <h2>Saksikan Momen Berharga Kami</h2>
                <p>Nikmati momen bahagia kami secara langsung! Temukan tautan di bawah ini untuk menyaksikan prosesi
                    akad
                    dan resepsi, sehingga Anda bisa ikut merayakan cinta kami meski dari jauh.</p>
            </div>
        </section>
        <section class="card">
            <div class="card-body items-center text-center">
                <h2>Hadiah kasih</h2>
                <p>Jika Anda ingin memberikan hadiah, kami menyediakan alamat pengiriman dan nomor rekening untuk ucapan
                    selamat. Kehadiran Anda adalah anugerah terindah bagi kami.</p>
            </div>
        </section>
        <section class="card">
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
        <section class="card">
            <div class="card-body">
                <div class="space-y-10">
                    <h2>Terimakasih</h2>

                    <div class="avatar">
                        <div class="w-32 bg-neutral rounded-full">
                            <img src="https://robohash.org/iqbal&prana" alt="">
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
