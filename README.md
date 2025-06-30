<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# SEA Catering App — Proyek Submission COMPFEST 17

Selamat datang di **SEA Catering App**! Aplikasi web ini merupakan bagian dari proses seleksi untuk **Software Engineering Academy (SEA) COMPFEST 17**. Aplikasi ini dirancang sebagai platform pemesanan dan manajemen layanan katering makanan sehat yang efisien, bertujuan untuk membantu SEA Catering mengelola pesanan, langganan, dan interaksi dengan pelanggan.

---

## ✨ Tautan Aplikasi (Live Demo)

Aplikasi ini sudah di-deploy dan dapat diakses secara publik melalui tautan berikut:

**[https://seacatering-production.up.railway.app/](https://seacatering-production.up.railway.app/)**

---

## 🚀 Tumpukan Teknologi (Tech Stack)

| Kategori          | Teknologi                  |
| :---------------- | :------------------------- |
| 🧠 **Backend** | Laravel 11                 |
| ⚡ **Frontend** | Livewire 3                 |
| 🎨 **Styling** | Tailwind CSS 3   |
| ✨ **Interaktivitas** | Alpine.js (via Livewire)   |
| 🗄️ **Database** | MySQL                      |
| 🔧 **Dev Server** | Vite                       |

---

### Langkah-langkah Instalasi

#### 1. Clone Repositori
Salin repositori ini ke mesin lokal Anda dan masuk ke dalam direktori proyek.
```bash
git clone https://github.com/ariefrachman17/seacatering.git
cd seacatering
```

#### 2. Pasang Dependensi Backend
Instal semua paket PHP yang dibutuhkan oleh Laravel menggunakan Composer.
```bash
composer install
```

#### 3. Konfigurasi Lingkungan
Salin file `.env.example` untuk membuat file konfigurasi `.env` Anda.
```bash
cp .env.example .env
```
Selanjutnya, buat kunci enkripsi unik untuk aplikasi.
```bash
php artisan key:generate
```

#### 4. Siapkan Database
Buka file `.env` dan sesuaikan konfigurasi database (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).

> **Contoh Konfigurasi untuk Laragon (Default):**
> ```ini
> DB_CONNECTION=mysql
> DB_HOST=127.0.0.1
> DB_PORT=3306
> DB_DATABASE=seacateringdb
> DB_USERNAME=root
> DB_PASSWORD=
> ```

Selanjutnya, buat database baru.

> **Panduan untuk Pengguna Laragon:**
> 1.  Jalankan Laragon dan klik **`Start All`** untuk mengaktifkan Apache & MySQL.
> 2.  Klik tombol **`Database`** pada dashboard. Ini akan membuka alat manajemen (seperti HeidiSQL).
> 3.  Buat database baru. Pastikan namanya **sama persis** dengan nilai `DB_DATABASE` di file `.env` Anda (contoh: `seacateringdb`).

#### 5. Pasang Dependensi Frontend
Instal semua paket JavaScript yang dibutuhkan seperti Tailwind CSS dan Vite.
```bash
npm install
```

#### 6. Migrasi dan Seeding Database
Jalankan perintah ini untuk membuat semua tabel dan mengisinya dengan data awal (termasuk akun demo).
```bash
php artisan migrate --seed
```
> 💡 **Catatan:** Jika terjadi error, pastikan konfigurasi dan nama database di file `.env` sudah benar dan layanan database Anda berjalan.

#### 7. Buat Tautan Penyimpanan (Storage Link)
Buat tautan simbolis agar file yang diunggah dapat diakses secara publik.
```bash
php artisan storage:link
```
> ⚠️ **Peringatan:** Perintah ini hanya perlu dijalankan sekali.

#### 8. Jalankan Server Pengembangan
Gunakan perintah `npm start` untuk menjalankan server PHP dan server Vite secara bersamaan.
```bash
npm start
```

#### 9. Buka Aplikasi
Setelah semua server berjalan, aplikasi siap diakses melalui browser Anda.

**Buka alamat:** 👉 **[http://localhost:8080](http://localhost:8080)**

---

### 🔑 Akun Demo untuk Login
Setelah aplikasi berjalan, Anda dapat menggunakan akun demo berikut yang sudah dibuat melalui *seeder* untuk masuk dan menguji fungsionalitas:

**👑Akun Administrator:**
-   **Username:** `admin@gmail.com` //harus admin emailnya
-   **Password:** `Admin@123`

**👤Akun Pengguna (User):**
-   **Username:** `user@example.com`
-   **Password:** `user1234`

---

Terima kasih telah meninjau proyek ini!
