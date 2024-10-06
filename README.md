# Template starter

Template starter aplikasi ini ditujukan sebagai template code dasar sebelum membuat aplikasi agar cepat. Template starter ini mengharuskan memiliki paket sebagai berikut ini:

- [Laravel 11 : membutuhkan minimal PHP 8.2](https://laravel.com/docs/11.x)
- [Livewire 3 : sebagai frontent laravel 11](https://livewire.laravel.com/)
- [PNPM : sebagai nodejs package manager](https://pnpm.io/id/)
- [Tailwindcss : sebagai css entity](https://tailwindcss.com/docs/guides/laravel)
- [Daisyui : thema bawaan menggunakan tailwindcss](https://daisyui.com/components/)
- [Adminer : database management system](https://github.com/onecentlin/laravel-adminer)

Silakan jalankan perintah untuk menginstall menggunakan composer maupun pnpm. silakan ubah dokumentasi ini di file README.md dan sesuaikan dengan aplikasi yang sedang dibangun.

## Fitur bawaan

Berikut ini adalah beberapa fitur bawaan yang disediakan oleh template starter ini:

- Frontend menggunakan livewire
- Authentication login dan register
- User management
- Halaman profile user yang masuk
- Role dan Permission menggunakan spatie laravel permission
- Livewire sweetalert
- Database management system menggunakan adminer laravel
- Halaman responsive sudah disedsuaikan dengan resolusi perangkat

## Setelah copy repository

```
cp .env.example .env
composer install
pnpm install
php artisan key:generate
php artisan migrate
php artisan migrate:fresh --seed
php artisan storage:link

```
