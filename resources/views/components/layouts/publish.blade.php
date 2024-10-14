<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $lang ?? app()->getLocale()) }}" data-theme="{{ $undangan->tema->name }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Undangan {{ $undangan->kategori->name }} {{ $undangan->name }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta property="og:image"content="{{ $undangan->image }}" />
        <meta property="og:image:type" content="image/jpg" />
        <meta property="og:title" content="{{ $undangan->kategori->name }} {{ $undangan->name }}" />
        <meta property="og:description"
            content="undangan online arunikasih {{ $undangan->kategori->name }} {{ $undangan->name }}" />
        @vite('resources/css/app.css')
    </head>

    <body>

        {{ $slot }}

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />
    </body>

</html>
