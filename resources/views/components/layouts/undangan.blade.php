<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $lang ?? app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ Str::ucfirst($undangan->kategori->name) }} {{ $undangan->name }}</title>
        @vite('resources/css/app.css')
    </head>

    <body>

        <div class="drawer lg:drawer-open min-h-screen bg-base-200">
            <input id="drawer" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content">
                @livewire('partial.detailnav', [
                    'undangan' => $undangan,
                ])
                @if ($undangan->paid == false)
                    <div role="alert"
                        class="alert bg-gradient-to-r text-error-content from-error to-warning rounded-none">
                        <x-tabler-exclamation-circle />
                        <p>Hai, anda belum menyelesaikan pembayaran undangan ini.</p>
                        <a href="{{ route('pembayaran.show', ['pembayaran' => $undangan->pembayaran->id]) }}"
                            class="btn btn-xs">Klik disini</a>
                    </div>
                @endif
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
        <script>
            Alpine.magic('clipboard', () => {
                return subject => navigator.clipboard.writeText(subject)
            })
        </script>
    </body>

</html>
