<div class="page-wrapper">

    @livewire('partial.header', [
        'title' => 'Detail undangan',
    ])

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Publish undangan ditunda</h3>
            <div class="py-4">
                <p>Mohon maaf arunkasih belum bisa mempublish undangan anda sampai pembayaran diselesaikan</p>
            </div>
            <div class="card-actions">
                <button class="btn">Selesaikan pembayaran</button>
            </div>
        </div>
    </div>
</div>
