<div class="publish">
    <input type="checkbox" id="cover" @checked($cover) class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box max-w-lg h-screen text-center bg-base-100">
            <div class="flex flex-col h-full gap-6">
                <div class="flex-1 flex flex-col justify-center items-center space-y-6">
                    <p>Undangan {{ $undangan->kategori->name }}</p>
                    <div class="avatar">
                        <div class="w-36 bg-neutral rounded-full">
                            <img src="https://robohash.org/iqbal&prana" alt="">
                        </div>
                    </div>
                    <h2>{{ $undangan->name }}</h2>
                    @livewire('partial.countdown')
                    <p class="py-4">{{ $undangan->event_date->format('d F Y') }}</p>
                </div>
                <div class="flex-none">
                    <label for="cover" class="btn btn-block btn-primary">
                        <x-tabler-mail class="size-5" />
                        <span>Buka undangan</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <section class="card min-h-screen">
        <div class="card-body items-center text-center">
            <div class="space-y-6">
                <p>Undangan {{ $undangan->kategori->name }}</p>
                <div class="avatar">
                    <div class="w-28 bg-neutral mask mask-hexagon-2">
                        <img src="https://imgs.search.brave.com/RdGFv7pW5uQUwEgUy8VxAPc7b8ozWesjscUMSRkgH9A/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly93d3cu/ZWtycGljdHVyZXMu/Y29tL3dwLWNvbnRl/bnQvdXBsb2Fkcy8y/MDIxLzAyL0VLUi1Q/aWN0dXJlcy1QcmUt/V2VkZGluZy1waG90/b3Nob3RvLUJhbWZv/cmQtRWRnZTUtMTAy/NHg2ODMuanBn"
                            alt="">
                    </div>
                </div>
                <h1>{{ $undangan->name }}</h1>
                <p>Assalamualaikum warohmatullohi wabarokatuh.</p>
                <p class="italic">“Dan segala sesuatu Kami ciptakan berpasang-pasangan supaya kamu mengingat kebesaran
                    Allah.”.<br />
                    (~ QS. Adz Dzariyyat Ayat 49 ~)</p>
                <p>Melalui undangan ini kami, mengundang bapak, ibu dan rekan sekalian untuk menghadiri acara
                    {{ $undangan->kategori->name }}
                    kami :</p>
            </div>
        </div>
    </section>
    <section class="card">
        <div class="card-body items-center text-center">
            <div class="space-y-10">
                <h2>Pengantin</h2>
                <p>Kami yang berbahagia</p>
                <div class="grid md:grid-cols-2">
                    @foreach ($undangan->pengantins as $pengantin)
                        <div class="card border-0 bg-transparent">
                            <div class="card-body text-center items-center space-y-4">
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
                <div class="card bg-base-200 border-0">
                    <figure>
                        <img src="https://imgs.search.brave.com/4lnbEvN0-68Ykv4sfRq7Vp49qBE4GVY76xOcxRmBCyA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90aGVt/ZWZpc2hlci5jb20v/YmxvZy9kYXJrLWFk/bWluLndlYnA"
                            alt="">
                    </figure>
                    <div class="card-body">
                        <div class="flex flex-col items-center gap-2">
                            <h5 class="card-title text-center">Akad Nikah</h5>
                            <p>Gedung Kesenian Balikpapan jam 08:00 sampai dengan 10:00</p>
                        </div>
                    </div>
                </div>
                <div class="card bg-base-200 border-0">
                    <figure>
                        <img src="https://imgs.search.brave.com/4lnbEvN0-68Ykv4sfRq7Vp49qBE4GVY76xOcxRmBCyA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90aGVt/ZWZpc2hlci5jb20v/YmxvZy9kYXJrLWFk/bWluLndlYnA"
                            alt="">
                    </figure>
                    <div class="card-body">
                        <div class="flex flex-col items-center gap-2">
                            <h4 class="card-title">Resepsi</h4>
                            <p>Gedung Kesenian Balikpapan jam 08:00 sampai dengan 10:00</p>
                        </div>
                    </div>
                </div>
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
                <div class="chat chat-start">
                    <div class="chat-bubble chat-bubble-secondary">What kind of nonsense is this</div>
                </div>
                <div class="chat chat-start">
                    <div class="chat-bubble chat-bubble-secondary">
                        Put me on the Council and not make me a Master!??
                    </div>
                </div>
                <div class="chat chat-start">
                    <div class="chat-bubble chat-bubble-secondary">
                        That's never been done in the history of the Jedi. It's insulting!
                    </div>
                </div>
                <div class="chat chat-start">
                    <div class="chat-bubble chat-bubble-secondary">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, aperiam!
                    </div>
                </div>
            </div>

            <button class="btn btn-primary btn-circle">
                <x-tabler-edit />
            </button>
        </div>
    </section>
    <section class="card">
        <div class="card-body items-center text-center">
            <h2>Live streaming</h2>
            <p>Saksikan runtutan acara kami di live streaming berikut ini.
        </div>
    </section>
    <section class="card">
        <div class="card-body items-center text-center">
            <h2>Hadiah</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis minima nulla deserunt dignissimos unde
                accusamus quis, corporis maxime aspernatur magni iusto architecto accusantium quo, iure culpa sequi vero
                perferendis laboriosam?</p>
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
                    <div class="w-28 bg-neutral rounded-full">
                        <img src="https://robohash.org/iqbal&prana" alt="">
                    </div>
                </div>

                <p>Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/I berkenan hadir untuk
                    memberikan do'a restu kepada kami</p>

                <p>Wassalamu'alaikum Warahmatullahi Wabarakatuh.</p>
                <div>
                    <label for="cover" class="btn btn-primary">
                        <x-tabler-mail class="size-5" />
                        <span>Tutup undangan</span>
                    </label>
                </div>
                <p class="!text-base opacity-50">Undangan ini dibuat dengan <span class="text-red-500">❤</span>
                    oleh<br>arunikasih.com</p>
            </div>
        </div>
    </section>
</div>
