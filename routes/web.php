<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Welcome::class)->name('welcome');

Route::get('logout',  function(){
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::middleware('guest')->group(function(){
    // Route::get('/{katname}/{slug}', \App\Livewire\Pages\Publish::class)->name('publish');
    Route::get('/login', \App\Livewire\Auth\Login::class)->name('login');
    Route::get('/register', \App\Livewire\Auth\Register::class)->name('register');
});

Route::middleware('auth')->group(function(){
    Route::middleware('can:home')->get('/home', \App\Livewire\Pages\Home::class)->name('home');
    Route::middleware('can:profile')->get('/profile', \App\Livewire\Pages\Profile::class)->name('profile');
    Route::middleware('can:about')->get('/about', \App\Livewire\Pages\About::class)->name('about');
    Route::middleware('can:user.index')->get('/user', \App\Livewire\Pages\User\Index::class)->name('user.index');
    Route::middleware('can:permission.index')->get('/permission', \App\Livewire\Pages\Permission\Index::class)->name('permission.index');

    Route::get('/music', \App\Livewire\Pages\Music\Index::class)->name('music.index');
    Route::get('/ayat', \App\Livewire\Pages\Ayat\Index::class)->name('ayat.index');
    Route::get('/kategori', \App\Livewire\Pages\Kategori\Index::class)->name('kategori.index');
    Route::get('/bank', \App\Livewire\Pages\Bank\Index::class)->name('bank.index');
    Route::get('/fitur', \App\Livewire\Pages\Fitur\Index::class)->name('fitur.index');
    Route::get('/paket', \App\Livewire\Pages\Paket\Index::class)->name('paket.index');
    Route::get('/tema', \App\Livewire\Pages\Tema\Index::class)->name('tema.index');
    Route::get('/sosmed', \App\Livewire\Pages\Sosmed\Index::class)->name('sosmed.index');
    Route::get('/rating', \App\Livewire\Pages\Rating\Index::class)->name('rating.index');
    Route::get('/ornamen', \App\Livewire\Pages\Ornament\Index::class)->name('ornamen.index');
    Route::get('/pembayaran', \App\Livewire\Pages\Pembayaran\Index::class)->name('pembayaran.index');
    Route::get('/undangan', \App\Livewire\Pages\Undangan\Index::class)->name('undangan.index');
    Route::get('/undangan/table', \App\Livewire\Pages\Undangan\Table::class)->name('undangan.table');

    Route::get('/penilaian', \App\Livewire\Pages\Rating\Mine::class)->name('rating.mine');
    Route::get('/pembayaran/mine', \App\Livewire\Pages\Pembayaran\Mine::class)->name('pembayaran.mine');
    Route::get('/undangan/mine', \App\Livewire\Pages\Undangan\Mine::class)->name('undangan.mine');

    Route::get('/pembayaran/{pembayaran}', \App\Livewire\Pages\Pembayaran\Show::class)->name('pembayaran.show');
    Route::get('/undangan/create', \App\Livewire\Pages\Undangan\Create::class)->name('undangan.create');
    Route::prefix("/undangan/{undangan}")->group(function(){
        Route::get('/', \App\Livewire\Pages\Undangan\Show::class)->name('undangan.show');
        Route::get('/raw', \App\Livewire\Pages\Undangan\Raw::class)->name('undangan.raw');
        Route::get('/setting', \App\Livewire\Pages\Undangan\Setting::class)->name('undangan.setting');
        Route::get('/cover', \App\Livewire\Pages\Undangan\Cover::class)->name('undangan.cover');
        Route::get('/pengantin', \App\Livewire\Pages\Undangan\Pengantin::class)->name('undangan.pengantin');
        Route::get('/preview', \App\Livewire\Pages\Undangan\Preview::class)->name('undangan.preview');
        Route::get('/acara', \App\Livewire\Pages\Undangan\Acara::class)->name('undangan.acara');
        Route::get('/media', \App\Livewire\Pages\Undangan\Media::class)->name('undangan.media');
        Route::get('/guest', \App\Livewire\Pages\Undangan\Guest::class)->name('undangan.guest');
        Route::get('/story', \App\Livewire\Pages\Undangan\Story::class)->name('undangan.story');
        Route::get('/publish', \App\Livewire\Pages\Undangan\Publish::class)->name('undangan.publish');
        Route::get('/livestreaming', \App\Livewire\Pages\Undangan\Livestreaming::class)->name('undangan.livestreaming');
        Route::get('/rekening', \App\Livewire\Pages\Undangan\Rekening::class)->name('undangan.rekening');
        Route::get('/anak', \App\Livewire\Pages\Undangan\Rekening::class)->name('undangan.anak');
    });
});
