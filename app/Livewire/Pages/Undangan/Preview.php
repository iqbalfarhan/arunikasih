<?php

namespace App\Livewire\Pages\Undangan;

use App\Models\Undangan;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Preview extends Component
{
    public $cover = false;

    public Undangan $undangan;

    public function mount(Undangan $undangan)
    {
        $this->undangan = $undangan;
    }

    public function render()
    {
        return view('livewire.pages.undangan.preview', [
            'images' => [
                "https://imgs.search.brave.com/ozcGOX53olaAw5wL9DLco3wmrvVYQYBFOuts6k0QF9c/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMuc3F1YXJlc3Bh/Y2UtY2RuLmNvbS9j/b250ZW50L3YxLzUz/N2JhYzgzZTRiMDQ2/MmJjMTdiZGY4NC8x/NTgxNTg5MDI0OTU1/LTlPUU9NWlY4ME4z/RlpVU0hUVlNOL0xv/bmRvbi1QcmUtV2Vk/ZGluZy1QaG90b2dy/YXBoeS5qcGc",
                "https://imgs.search.brave.com/UR0ZS-lCl60lGpnFc_u0h2dikaywzmmjNN_JhW-ejPg/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMuc3F1YXJlc3Bh/Y2UtY2RuLmNvbS9j/b250ZW50L3YxLzUz/N2JhYzgzZTRiMDQ2/MmJjMTdiZGY4NC8x/NzA3OTA1Mjc4MTA4/LVZaWktQT1NLRVZF/SUFWNFRLTzdZL0xv/bmRvbitQcmUrV2Vk/ZGluZytQaG90b2dy/YXBoeStVSysxNS1t/aW4uanBn",
                "https://imgs.search.brave.com/Y43bqVk3poLDityZ1gNnPOvMKXIAns9amxmVk8uZOK0/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZS53ZWRtZWdvb2Qu/Y29tL3Jlc2l6ZWQv/MjAwWC91cGxvYWRz/L2ltX2NhdF9pbWFn/ZS80MS9wcmUtd2Vk/ZGluZy5qcGc",
                "https://imgs.search.brave.com/RMWAcj8vp5ZCbweKOVu--t3I2t3s7EUati1qayIj1GE/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMuc3F1YXJlc3Bh/Y2UtY2RuLmNvbS9j/b250ZW50L3YxLzUz/N2JhYzgzZTRiMDQ2/MmJjMTdiZGY4NC8x/NzA3OTA1MjkzMzU5/LVdYQ1lHRE1GUVRI/TjNXT1gwN1A2L0xv/bmRvbitQcmUrV2Vk/ZGluZytQaG90b2dy/YXBoeStVSys0MC1t/aW4uanBn",
                "https://imgs.search.brave.com/K-ORGdeGUS1M1fpGz_O34v1s6SdOnTpuPDqL6Fv_TGc/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pMC53/cC5jb20vd3d3Lndl/ZGRpbmdmb3J3YXJk/LmNvbS93cC1jb250/ZW50L3VwbG9hZHMv/MjAyMS8xMi9wcmUt/d2VkZGluZy1waG90/b3MtcHJlLXdlZGRp/bmctYnJpZGUtYW5k/LWJyaWRlc21haWRz/LWphbmVsbGUuZWxp/c2VfLnBob3RvXy5q/cGc_Zml0PTEwODAs/MTM1MCZxdWFsaXR5/PTcwJnNzbD0x",
                "https://imgs.search.brave.com/sUCgwTw_lGjtdigpWM6MYptoF8-zfworifCh2NLI0hQ/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9hbGV4/YW5kcmEuYnJpZGVz/dG9yeS5jb20vaW1h/Z2UvdXBsb2FkL3Ff/ODAsd182NzgvYmxv/Z3MvcHJld2VkZGlu/Z190aGUtaW5kaWdl/bm91cy1ya2RCUkhY/UEwuanBn"
            ]
        ])->layout('components.layouts.publish', [
            'undangan' => $this->undangan,
        ]);
    }
}
