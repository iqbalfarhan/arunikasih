<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $lang ?? app()->getLocale()) }}" data-theme="{{ $undangan->tema->name }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Undangan {{ $undangan->kategori->name }} {{ $undangan->name }}</title>
        @vite('resources/css/app.css')
    </head>

    <body>

        {{ $slot }}

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />
    </body>

</html>
