<div class="landing">
    <div class="border-b-2 border-base-300 py-2 bg-base-200">
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
                        <a href="">
                            <x-tabler-certificate class="size-5" />
                            <span>Undangan</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <x-tabler-star class="size-5" />
                            <span>Testimoni</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <x-tabler-notebook class="size-5" />
                            <span>Pricing</span>
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

    <section>
        <div class="content-wrapper text-center">
            <h1 class="text-6xl mx-27 font-bold text-center">The most productive way to build your next web app</h1>

            <p class="text-xl opacity-50">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo eligendi nulla
                cum?
                Debitis, sequi
                dolorum. Autem porro consequuntur modi sapiente, optio distinctio! Consequatur corporis ullam, vel sit
                expedita dolorum perspiciatis?</p>

            <button class="btn btn-primary">
                <x-tabler-notebook class="size-5" />
                <span>Buat undangan</span>
            </button>

            <div class="py-12 flex gap-4 max-w-3xl mx-auto">
                <div class="mockup-browser flex-1 bg-base-300 border border-base-300 h-fit">
                    <div class="mockup-browser-toolbar">
                        <div class="input">{{ route('welcome') }}</div>
                    </div>
                    <div class="h-fit">
                        <img src="https://imgs.search.brave.com/4lnbEvN0-68Ykv4sfRq7Vp49qBE4GVY76xOcxRmBCyA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90aGVt/ZWZpc2hlci5jb20v/YmxvZy9kYXJrLWFk/bWluLndlYnA"
                            alt="" class="w-full">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="content-wrapper">
            <div class="flex flex-col text-center gap-4">
                <h2 class="text-4xl font-bold">
                    Loved by developers around the world
                </h2>
                <p class="opacity-50 text-xl">Here's what people are saying about using Livewire.</p>
            </div>
            <div class="flex justify-center">
                <div role="tablist" class="tabs tabs-boxed p-2 w-fit">
                    <a role="tab" class="tab tab-active">Pernikahan</a>
                    <a role="tab" class="tab">Syukuran</a>
                    <a role="tab" class="tab">Khitanan</a>
                </div>
            </div>

            <div class="table-wrapper">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Fitur name</th>
                            <th>Bronze</th>
                            <th>Silver</th>
                            <th>Gold</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < fake()->numberBetween(8, 10); $i++)
                            <tr>
                                <td>{{ fake()->words(3, true) }}</td>
                                <td>
                                    @if (fake()->boolean())
                                        <x-tabler-check class="size-4" />
                                    @endif
                                </td>
                                <td>
                                    @if (fake()->boolean())
                                        <x-tabler-check class="size-4" />
                                    @endif
                                </td>
                                <td>
                                    @if (fake()->boolean())
                                        <x-tabler-check class="size-4" />
                                    @endif
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section>
        <div class="content-wrapper">
            <div class="flex flex-col text-center gap-4">
                <h2 class="text-4xl font-bold">
                    Loved by developers around the world
                </h2>
                <p class="opacity-50 text-xl">Here's what people are saying about using Livewire.</p>
            </div>
            <div class="columns-3 gap-6 space-y-6">
                @for ($i = 0; $i < 9; $i++)
                    <div class="card bg-base-200 break-inside-avoid">
                        <div class="card-body space-y-3 justify-center">
                            <div class="flex gap-3 items-center justify-center">
                                <div class="flex justify-center items-center w-8">
                                    <div class="avatar justify-center flex-none">
                                        <div class="rounded-full w-8 bg-success">
                                            <img src="https://robohash.org/{{ fake()->name() }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1 justify-start gap-4">
                                    <h3 class="line-clamp-1">{{ fake()->firstName() }} {{ fake()->lastName() }}</h3>
                                    <div class="flex gap-1">
                                        @for ($j = 0; $j < 5; $j++)
                                            <x-tabler-star-filled class="size-3 text-warning" />
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <p class="opacity-75 text-sm">
                                {{ fake()->words(fake()->numberBetween(5, 15), true) }}
                            </p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <footer></footer>
</div>
