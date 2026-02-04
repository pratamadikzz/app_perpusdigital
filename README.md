PerpusDigital

PerpusDigital adalah aplikasi perpustakaan digital sederhana berbasis Laravel untuk manajemen buku, pengguna, dan peminjaman. Proyek ini disiapkan agar mudah dijalankan di lingkungan lokal (contoh: XAMPP / PHP built-in server).

## Fitur

- Autentikasi pengguna (login/register)
- Peran dasar: admin, petugas, peminjam (struktur view tersedia di resources/views)
- Manajemen pengguna, buku, dan peminjaman (model + migrasi dasar)
- Halaman landing, login, register, dan dashboard per peran

## Prasyarat

- PHP 8.x
- Composer
- MySQL / MariaDB (via XAMPP pada Windows)
- Node.js & npm

## Instalasi (lokal)

1. Clone repository:

```bash
git clone <repo-url> perpusdigital
cd perpusdigita
```

2. Install dependensi PHP:

```bash
composer install
```

3. Salin file environment dan buat app key:

```bash
cp .env.example .env
php artisan key:generate
```

4. Sesuaikan konfigurasi database pada file `.env` (DB_DATABASE, DB_USERNAME, DB_PASSWORD).

5. Jalankan migrasi dan seeder (jika ada):

```bash
php artisan migrate --seed
```

6. Install dependensi frontend dan build asset:

```bash
npm install
npm run dev
```

7. Jalankan server lokal (opsional gunakan XAMPP atau):

```bash
php artisan serve
```

## Konfigurasi penting

- File environment: [.env](.env)
- Route utama: [routes/web.php](routes/web.php)
- Model pengguna: [app/Models/User.php](app/Models/User.php)
- Views: [resources/views](resources/views)

Pastikan konfigurasi mail, storage, dan session di `.env` sesuai kebutuhan.

## Struktur proyek penting

- [app/Http/Controllers](app/Http/Controllers): controller aplikasi
- [app/Models](app/Models): model Eloquent (mis. [app/Models/User.php](app/Models/User.php))
- [database/migrations](database/migrations): file migrasi database
- [resources/views](resources/views): blade templates (landing, login, register, admin, petugas, peminjam)
- [public](public): aset publik (css, js, img)

## Menjalankan test

Jika terdapat test, jalankan dengan:

```bash
php artisan test
```

atau

```bash
./vendor/bin/phpunit
```

## Kontribusi

- Fork repository, buat branch fitur `feature/xxx`, dan ajukan pull request.
- Sertakan deskripsi perubahan dan langkah untuk menguji fitur.

## Lisensi

Lisensi: MIT (jika berbeda, sesuaikan dengan file lisensi di repo).

## Kontak

Untuk pertanyaan atau bantuan, silakan buka issue di repository atau hubungi maintainer.

---

Catatan: Saya telah memperbarui file README dengan instruksi dasar. Mau saya tambahkan contoh `.env.example`, screenshot, atau badge build/coverage?

<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). -->
