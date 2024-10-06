<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Edit Profile',
    ])

    <div class="card max-w-sm mx-auto">
        <form class="card-body" wire:submit="simpan">
            <div class="flex w-full justify-center">
                <div class="avatar" onclick="document.getElementById('pickPhoto').click()">
                    <div class="w-28 rounded-full shadow-lg">
                        <img src="{{ $photo ? $photo->temporaryUrl() : $user->image }}" />
                    </div>
                </div>
            </div>
            <input type="file" wire:model="photo" id="pickPhoto" class="hidden" accept="iamge/*">
            <div class="py-6 space-y-3">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Nama lengkap</span>
                    </div>
                    <input type="text" placeholder="Type here" class="input input-bordered" wire:model="name" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Email address</span>
                    </div>
                    <input type="email" placeholder="Type here" class="input input-bordered" wire:model="email" />
                </label>
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Password</span>
                    </div>
                    <input type="password" class="input input-bordered" wire:model="password"
                        placeholder="Isi untuk merubah password" />
                </label>
            </div>
            <div class="card-action">
                <button class="btn btn-primary">
                    <x-tabler-check class="size-5" />
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>

    <div class="card max-w-sm mx-auto">
        <div class="card-body">
            <h3 class="card-title">Hapus akun</h3>
            <p class="py-2 text-sm opacity-50">
                Menghapus akun akan menghapus semua data mengenai akun tersebut. Harap pastikan lagi untuk
                menghapus akun anda. Klik tombol di bawah ini untuk menonaktifkan akun anda.
            </p>
            <div class="card-actions">
                <button class="btn btn-error" wire:click="$dispatch('deleteAccount', {user: {{ $user->id }}})">
                    <x-tabler-trash class="size-5" />
                    <span>Hapus akun saya</span>
                </button>
            </div>
        </div>
    </div>

    @livewire('pages.user.actions')
</div>
