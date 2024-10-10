<div class="landing">
    <div class="fixed top-0 w-full border-b-2 border-base-300 py-2 bg-base-200 backdrop-blur-sm z-50">
        <div class="navbar bg-transparent border-0 max-w-7xl mx-auto">
            <div class="flex-1">
                <button class="btn btn-ghost text-xl">
                    @livewire('partial.logo')
                    <span>{{ config('app.name') }}</span>
                </button>
            </div>
            <div class="flex-none">
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
    </div>

    <section id="undangan">
        <div class="content-wrapper text-center py-24">
            <h1 class="text-6xl mx-27 font-bold text-center">Buat Undangan Online Praktis dengan Arunikasih!
            </h1>

            <p class="text-xl opacity-50">Buat undangan pernikahan, akikah, ulang tahun, dan syukuran dengan mudah,
                praktis dan menarik dengan berbagaicam tema dan fitur yang lengkap dengan Arunikasih.</p>

            <button class="btn btn-primary">
                <x-tabler-notebook class="size-5" />
                <span>Buat undangan</span>
            </button>

            <div class="py-12 flex gap-4 max-w-3xl mx-auto">
                <div class="mockup-browser flex-1 bg-base-300 border border-base-300 h-fit">
                    <div class="mockup-browser-toolbar">
                        <div class="input">https://arunikasih.com/pernikahan/chandra_dan_lina</div>
                    </div>
                    <div class="h-fit">
                        <div class="carousel">
                            <div class="carousel-item w-full">
                                <img src="{{ url('images/contohcontrol.png') }}" alt="" class="w-full">
                            </div>
                            <div class="carousel-item w-full">
                                <img src="{{ url('images/contohundangan.png') }}" alt="" class="w-full">
                            </div>
                            <div class="carousel-item w-full">
                                <img src="{{ url('images/contohmobile.png') }}" alt="" class="w-full">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing">
        <div class="content-wrapper">
            <div class="flex flex-col text-center gap-4">
                <h2 class="text-4xl font-bold">
                    Loved by developers around the world
                </h2>
                <p class="opacity-50 text-xl">Here's what people are saying about using Livewire.</p>
            </div>
            <div class="flex justify-center">
                <div role="tablist" class="tabs tabs-boxed p-2 w-fit">
                    @foreach ($kategoris as $katid => $katname)
                        <button wire:click='setKategoriId({{ $katid }})'
                            @class(['tab capitalize', 'tab-active' => $katid == $kategori_id])>{{ $katname }}</button>
                    @endforeach
                </div>
            </div>

            <div class="table-wrapper">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama fitur</th>
                            @foreach ($pakets as $paket)
                                <th>{{ $paket->name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fiturs as $fitur)
                            <tr wire:key="{{ $fitur->id }}" wire:transition.opacity>
                                <td class="w-full">{{ $fitur->name }}</td>
                                @foreach ($pakets as $paket)
                                    <td>
                                        @if (fake()->boolean())
                                            <x-tabler-circle-check class="text-primary size-5" />
                                        @else
                                            <x-tabler-circle-x class="text-error size-5 opacity-20" />
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            @foreach ($pakets as $paket)
                                <th>{{ Number::currency($paket->price, 'IDR') }}</th>
                            @endforeach
                        </tr>
                    </tfoot>
                </table>
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
                    <div class="card bg-base-200 break-inside-avoid">
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
                                            <input type="radio" name="rate{{ $rating->id }}"
                                                class="mask mask-star bg-warning" disabled
                                                @checked($rating->rate == 1) />
                                            <input type="radio" name="rate{{ $rating->id }}"
                                                class="mask mask-star bg-warning" disabled
                                                @checked($rating->rate == 2) />
                                            <input type="radio" name="rate{{ $rating->id }}"
                                                class="mask mask-star bg-warning" disabled
                                                @checked($rating->rate == 3) />
                                            <input type="radio" name="rate{{ $rating->id }}"
                                                class="mask mask-star bg-warning" disabled
                                                @checked($rating->rate == 4) />
                                            <input type="radio" name="rate{{ $rating->id }}"
                                                class="mask mask-star bg-warning" disabled
                                                @checked($rating->rate == 5) />
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
            <aside class="space-y-6">
                @livewire('partial.logo')
                <p>
                    arunikasih.com
                    <br />
                    Generator undangan online
                </p>
            </aside>
            <nav>
                <h6 class="footer-title">Social</h6>
                <div class="grid grid-flow-col gap-4">
                    <a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="fill-current">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                            </path>
                        </svg>
                    </a>
                    <a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="fill-current">
                            <path
                                d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z">
                            </path>
                        </svg>
                    </a>
                    <a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="fill-current">
                            <path
                                d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z">
                            </path>
                        </svg>
                    </a>
                </div>
            </nav>
        </section>
    </footer>
</div>
