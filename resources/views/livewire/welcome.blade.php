<div class="flex flex-col h-screen background-image-opacity">
    <div class="flex-none z-10 backdrop-blur-sm">
        <div class="navbar bg-transparent border-0 max-w-7xl mx-auto">
            <div class="flex-1">
                <button class="btn btn-ghost text-xl">
                    @livewire('partial.logo')
                    <span>{{ config('app.name') }}</span>
                </button>
            </div>
            <ul class="menu menu-horizontal px-1">
                <li>
                    <a href="#undangan">
                        <x-tabler-certificate class="size-5" />
                        <span>Undangan</span>
                    </a>
                </li>
                <li>
                    <a href="#pricing">
                        <x-tabler-notebook class="size-5" />
                        <span>Pricing</span>
                    </a>
                </li>
                <li>
                    <a href="#testimoni">
                        <x-tabler-star class="size-5" />
                        <span>Testimoni</span>
                    </a>
                </li>
                <div class="divider divider-horizontal"></div>
                @auth
                    <li>
                        <a href="{{ route('home') }}" wire:navigate>
                            <x-tabler-home class="size-5" />
                            <span>Home</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}" wire:navigate>
                            <x-tabler-login class="size-5" />
                            <span>Masuk</span>
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>

    <div class="flex-1 overflow-y-scroll scrollbar-hide">
        <div class="landing py-28">
            <section id="undangan">
                <div class="content-wrapper text-center">
                    <h1 class="text-6xl mx-27 font-bold text-center">Buat Undangan Online Praktis dengan Arunikasih!
                    </h1>

                    <p class="text-xl opacity-50">Buat undangan pernikahan, akikah, ulang tahun, dan syukuran dengan
                        mudah,
                        praktis dan menarik dengan berbagaicam tema dan fitur yang lengkap dengan Arunikasih.</p>

                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                        <x-tabler-notebook class="size-5" />
                        <span>Buat undangan</span>
                    </a>

                    <div class="py-12 flex gap-4 max-w-3xl mx-auto">
                        <div class="carousel rounded-box w-full h-fit">
                            @foreach ($carousels as $carid => $carousel)
                                <div id="slide{{ $carid }}" class="carousel-item w-full">
                                    <img src="{{ $carousel }}" alt="...">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <section id="pricing">
                <div class="content-wrapper">
                    <div class="flex flex-col text-center gap-4">
                        <h2 class="text-4xl font-bold">
                            Jadikan Momen Berharga Anda Lebih Berkesan.
                        </h2>
                        <p class="opacity-50 text-xl">Pilih paket terbaik untuk merayakan momen spesial Anda bersama
                            kami.
                            Sesuaikan dengan kebutuhan dan nikmati layanan berkualitas.</p>
                    </div>
                    <div class="flex justify-center">
                        <div role="tablist" class="tabs tabs-boxed p-2 w-fit">
                            @foreach ($kategoris as $katid => $katname)
                                <button wire:click='setKategoriId({{ $katid }})'
                                    @class(['tab capitalize', 'tab-active' => $katid == $kategori_id])>{{ $katname }}</button>
                            @endforeach
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 gap-6">
                        @foreach ($pakets as $paket)
                            <div class="card border-0 bg-base-200 hover:scale-105 transition">
                                <div class="card-body">
                                    <div class="flex flex-col">
                                        <span class="text-xs opacity-50">
                                            {{ $paket->kategori->name }}
                                        </span>
                                        <h3 class="card-title">{{ $paket->name }}</h3>
                                    </div>
                                    <p class="text-sm line-clamp-2 opacity-50">{{ $paket->description }}</p>

                                </div>
                                <div class="text-4xl text-center text-primary font-bold py-4">
                                    <span class="text-sm">Rp.</span>
                                    {{ Number::format($paket->price, locale: 'de') }}
                                </div>
                                <div class="card-body space-y-4 h-full">
                                    <div class="space-y-4 flex-1 opacity-75">
                                        <ul class="list list-inside text-sm space-y-2">
                                            @foreach ($paket->fiturs()->pluck('name') as $fitur)
                                                <li class="flex items-center gap-2">
                                                    <x-tabler-check class="size-4 text-success" />
                                                    {{ $fitur }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <section id="testimoni">
                <div class="content-wrapper">
                    <div class="flex flex-col text-center gap-4">
                        <h2 class="text-4xl font-bold">
                            Kata orang orang tentang arunikasih
                        </h2>
                        <p class="opacity-50 text-xl">Ini yang client katakan mengenai undangan arunikasih.</p>
                    </div>
                    <div class="columns md:columns-3 gap-6 space-y-6">
                        @foreach ($ratings as $rating)
                            <div class="card bg-base-200 break-inside-avoid border-0">
                                <div class="card-body space-y-3 justify-center">
                                    <div class="flex gap-3 items-center justify-center">
                                        <div class="flex justify-center items-center w-8">
                                            <div class="avatar justify-center flex-none">
                                                <div class="rounded-full w-8 bg-success">
                                                    <img src="{{ $rating->user->image }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-1 justify-start gap-4">
                                            <h3 class="line-clamp-1">{{ $rating->user->name }}</h3>
                                            <div class="flex gap-1">
                                                <div class="rating rating-sm">
                                                    @for ($i = 0; $i < $rating->rate; $i++)
                                                        <div class="mask mask-star-2 bg-warning size-4"></div>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="opacity-75 text-sm">
                                        {{ $rating->insight }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <footer class="footer p-10">
                <section class="w-full max-w-5xl mx-auto flex justify-between">
                    <aside class="flex items-center justify-center gap-4">
                        @livewire('partial.logo')
                        <div class="flex flex-col">
                            <span class="font-bold">Arunikasih.com</span>
                            <span class="opacity-50">Generator undangan online</span>
                        </div>
                    </aside>
                </section>
            </footer>
        </div>
    </div>
</div>
