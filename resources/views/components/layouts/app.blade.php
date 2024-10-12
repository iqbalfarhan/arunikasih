<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $lang ?? app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>
        @vite('resources/css/app.css')
    </head>

    <body>

        @auth
            <div class="drawer lg:drawer-open min-h-screen bg-base-200">
                <input id="drawer" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content">
                    @livewire('partial.navbar')
                    {{ $slot }}
                </div>
                <div class="drawer-side scrollbar-hide">
                    <label for="drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                    @livewire('partial.sidebar')
                </div>
            </div>
        @endauth

        @guest
            <div class="grid grid-cols-2 h-screen bg-base-300">
                <div class="flex-1 overflow-hidden p-12">
                    <img src="https://picsum.photos/200" alt="" class="h-full w-full rounded-box opacity-50 shadow">
                </div>
                <div class="flex-1 flex flex-col justify-center items-center space-y-10">
                    <a href="{{ route('welcome') }}" wire:navigate>
                        <h1 class="text-3xl font-bold text-center">{{ config('app.name') }}</h1>
                    </a>
                    {{ $slot }}
                    @if (Route::is('register'))
                        <p class="text-sm opacity-50">Sudah punya akun? <a href="{{ route('login') }}"
                                @class(['link'])>Masuk</a></p>
                    @elseif (Route::is('login'))
                        @if (Route::has('register'))
                            <p class="text-sm opacity-50">Belum punya akun? <a href="{{ route('register') }}"
                                    @class(['link'])>Daftar</a></p>
                        @endif
                    @endif
                </div>
            </div>
        @endguest

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />
    </body>

</html>
