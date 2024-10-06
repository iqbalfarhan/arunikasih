<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('logout',  function(){
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::middleware('guest')->group(function(){
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
});
