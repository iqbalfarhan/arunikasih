<div class="grid auto-cols-max grid-flow-col gap-3 text-center items-center justify-center">
    <div class="flex flex-col items-center">
        <span class="countdown font-mono font-bold text-4xl">
            {{ str_pad($days, 2, '0', STR_PAD_LEFT) }}
        </span>
        <span class="text-sm">Hari</span>
    </div>
    <span class="text-xl font-bold">:</span>
    <div class="flex flex-col items-center">
        <span class="countdown font-mono font-bold text-4xl">
            {{ str_pad($hours, 2, '0', STR_PAD_LEFT) }}
        </span>
        <span class="text-sm">Jam</span>
    </div>
    <span class="text-xl font-bold">:</span>
    <div class="flex flex-col items-center">
        <span class="countdown font-mono font-bold text-4xl">
            {{ str_pad($minutes, 2, '0', STR_PAD_LEFT) }}
        </span>
        <span class="text-sm">Menit</span>
    </div>
    <span class="text-xl font-bold">:</span>
    <div class="flex flex-col items-center">
        <span class="countdown font-mono font-bold text-4xl" wire:poll.1s>
            {{ str_pad($seconds, 2, '0', STR_PAD_LEFT) }}
        </span>
        <span class="text-sm">Detik</span>
    </div>
</div>
