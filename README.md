# Cactus
> Cactus adalah website forum tanya jawab yang dirancang untuk memfasilitasi pertukaran pengetahuan dan diskusi antara pengguna dari berbagai latar belakang dan minat. Cactus forum bertujuan menjadi tempat yang ramah dan kolaboratif bagi individu untuk bertanya, berbagi pengetahuan, dan memecahkan masalah.

## Feature
Sprint 1
* Menampilkan kumpulan pertanyaan beserta dengan balasan dari sesama pengguna.
* Menampilkan profil pengguna 
* Menampilkan cari akun dan pertanyaan 

## Keterangan Folder
>Desain : gambar dan ikon serta color pallete dari desain website

>Aplikasi : kodingan website

>Dokumentasi : deskripsi dan laporan uji coba aplikasi

### Requirements
- Node.js 20.12+
- PHP 8.2+
- Composer 2.7+
- npm 10.5+

Jika belum mempunyai Node.js atau Composer, silakan untuk mengunduh dari website resminya:
- Node.js: https://nodejs.org (https://nodejs.org/)
- Composer: https://getcomposer.org (https://getcomposer.org/)

### Installation
1. Clone repositori dari GitHub:
```bash
git clone https://github.com/alfienrian/cactus
```

2. Masuk ke direktori aplikasi project laravel
```bash
cd cactus/Aplikasi
```

3. Install dependencies PHP menggunakan Composer:
```bash
composer install
```

4. Install dependencies JavaScript menggunakan npm:
```bash
npm install
```

5. Salin file .env.example lalu rename file menjadi .env:
```bash
cp .env.example .env
```

6. Generate key aplikasi Laravel:
```bash
php artisan key:generate
```

7. Jalankan migrasi dan buat skema database:
```bash
php artisan migrate
```

## [Usage](#usage)
Untuk menggunakan aplikasi Cactus jalankan server development dengan cara mengetik perintah :
```bash
npm run dev
```
berjalan dan buka browser ke http://localhost:8000.

## [Configuration](#configuration)
Konfigurasi proyek Laravel dapat diatur di file .env. Pastikan untuk menyesuaikan pengaturan basis data, caching, dan konfigurasi lainnya sesuai kebutuhan.


