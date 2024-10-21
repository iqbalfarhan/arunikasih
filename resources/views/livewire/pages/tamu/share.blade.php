<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-lg space-y-6">
            <div class="flex flex-col space-y-2">
                <div class="card-title">Share undangan ke tamu</div>
                <p class="text-sm opacity-50">Silakan copy text berikut ini dan bagikan ke tamu anda melalui media sosial
                    anda</p>
            </div>
            <div class="card card-compact bg-base-300 border-0">
                <div class="card-body text-xs space-y-2" id="toCopy">
                    <p>Kepada: {{ $tamu?->name }}</p>
                    <p>Assalamu'alaikum warahmatullahi wabarokaatuh.</p>
                    <p>Tanpa mengurangi rasa hormat, kami mengundang saudara/(i) untuk menghadiri acara pernikahan kami:
                    </p>
                    <p>*{{ $tamu?->undangan->kategori->name }} {{ $tamu?->undangan->name }}*</p>
                    <p>Pesan ini merupakan undangan resmi dari kami. Silahkan kunjungi link dibawah ini untuk membuka
                        undangan
                        anda:
                    </p>
                    <p>Atas kehadiran & doa restu dari saudara, kami ucapkan terimakasih banyak.</p>
                    <p>wassalamu'alaikum warahmatullahi wabarokatuh.</p>
                    <p class="link">{{ $tamu?->link }}</p>
                </div>
            </div>
            <div class="modal-action justify-between">
                <button type="button" wire:click="resetForm" class="btn btn-ghost">Close</button>
            </div>
        </form>
    </div>
</div>
