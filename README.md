# Mini Perpustakaan 📚

Aplikasi web sederhana untuk pengelolaan data buku dan kategori perpustakaan, dibuat untuk keperluan Ujian Tengah Semester (UTS).

---

## 🛠️ Teknologi yang Digunakan

Aplikasi ini dibangun menggunakan teknologi dan pustaka modern:

- **Backend Framework:** [Laravel](https://laravel.com/) (PHP ^8.2 / ^8.3)
- **Frontend & Styling:** [Tailwind CSS v4](https://tailwindcss.com/) & [Blade Templating Engine](https://laravel.com/docs/blade)
- **Asset Bundler:** [Vite](https://vitejs.dev/)
- **Database:** SQLite / MySQL
- **Dependency Manager:** [Composer](https://getcomposer.org/) & [Node.js / npm](https://nodejs.org/)

---

## 📋 Prasyarat Sistem

Sebelum menjalankan aplikasi, pastikan komputer Anda telah terinstal:
- PHP >= 8.2
- Composer
- Node.js & npm
- Git

---

## 🚀 Panduan Instalasi & Menjalankan Proyek

Ikuti langkah-langkah berikut untuk menjalankan proyek di komputer lokal:

### 1. Clone Repository
```bash
git clone https://github.com/Deonct/Mini-Perpustakaan.git
cd Mini-Perpustakaan
```

### 2. Instal Dependensi PHP
```bash
composer install
```

### 3. Instal Dependensi Frontend (Node.js)
```bash
npm install
```

### 4. Konfigurasi File Lingkungan (`.env`)
Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```
*(Di Windows PowerShell: `copy .env.example .env`)*

### 5. Generate Application Key
```bash
php artisan key:generate
```

### 6. Jalankan Migrasi Database
Siapkan database dan jalankan migrasi tabel:
```bash
php artisan migrate
```
> *Catatan: Jika menggunakan SQLite, pastikan file database sudah dibuat atau setujui konfirmasi otomatis saat menjalankan perintah migrasi.*

### 7. Jalankan Server Pengembangan
Jalankan server backend Laravel:
```bash
php artisan serve
```

Di terminal terpisah, jalankan server asset Vite:
```bash
npm run dev
```

Buka browser dan akses aplikasi melalui: **[http://localhost:8000](http://localhost:8000)**

---

## ✨ Fitur Utama

- 📖 Manajemen Data Buku (Tambah, Lihat, Edit, Hapus)
- 🗂️ Manajemen Kategori Buku
- 🎨 Tampilan antarmuka responsif menggunakan Tailwind CSS

