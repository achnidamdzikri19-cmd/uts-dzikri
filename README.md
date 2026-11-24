Aplikasi CRUD sederhana dengan pola **Route → Controller → Blade**.
Data disimpan di **session** (`SESSION_DRIVER=file`), tanpa database.

> Repo ini berisi bagian aplikasi (routes, controller, views). Salin ke proyek Laravel 13 Anda.

## Langkah Menjalankan
1. `composer create-project laravel/laravel laundry` (atau clone proyek Anda)
2. Salin isi folder ini ke proyek (timpa `routes/web.php`, tambahkan controller dan views).
3. `cp .env.example .env` lalu `php artisan key:generate`
4. Di `.env` atur: `SESSION_DRIVER=file`
5. Pastikan `storage/framework/sessions` dapat ditulis (`chmod -R 775 storage bootstrap/cache`)
6. `php artisan route:clear && php artisan view:clear`
7. `php artisan serve` lalu buka http://127.0.0.1:8000/pesanan
8. Cek route: `php artisan route:list`

## Fitur
Kelola pesanan laundry: daftar, tambah, detail, edit, hapus (dengan konfirmasi), pesan status, validasi form, penanganan kode tidak ditemukan.
