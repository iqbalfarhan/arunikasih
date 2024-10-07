<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $lang ?? app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $undangan->kategori->name }} {{ $undangan->name }}</title>
        @vite('resources/css/app.css')
    </head>

    <body>

        <div class="drawer lg:drawer-open min-h-screen bg-base-200">
            <input id="drawer" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content">
                @livewire('partial.navbar')
                {{ $slot }}
            </div>
            <div class="drawer-side scrollbar-hide">
                <label for="drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                @livewire('partial.bagan', [
                    'undangan' => $undangan,
                ])
            </div>
        </div>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />
    </body>

</html>
