# 🎓 TSU Magang - Sistem Informasi Pengelolaan Magang

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-v12.x-red.svg" alt="Laravel">
  <img src="https://img.shields.io/badge/TailwindCSS-v4.x-blue.svg" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/Alpine.js-v3.x-blueviolet.svg" alt="Alpine.js">
  <img src="https://img.shields.io/badge/Database-MySQL-orange.svg" alt="MySQL">
</p>

**TSU Magang** adalah platform berbasis web yang dirancang untuk mengelola ekosistem kegiatan magang di **Tiga Serangkai University (TSU)**.

Project ini dikembangkan sebagai bagian dari tugas akhir/skripsi dengan fokus utama pada implementasi **Frontend Development**, mencakup pembangunan antarmuka pengguna (UI) yang modern, responsif, interaktif, dan mudah digunakan.

---

## 🚀 Fokus Utama (Skripsi)

Project ini menekankan pada pengembangan antarmuka pengguna menggunakan teknologi berikut:

- **Laravel Blade & Components** sebagai struktur utama halaman.
- **Tailwind CSS** untuk utility-first styling dan desain responsif.
- **Alpine.js** untuk menangani interaksi pada sisi client.
- **Custom CSS & AOS** untuk meningkatkan pengalaman visual pengguna.

## ✨ Fitur Utama

- **Dashboard Interaktif**: Menampilkan statistik peserta magang, termasuk peserta terdaftar, aktif, dan lulus.
- **Filtering Lowongan**: Pemisahan kategori antara Magang Mandiri dan Studi Independen.
- **Smart Pagination**: Sistem navigasi halaman yang ringan dan interaktif.
- **Logbook & Monitoring**: Fasilitas pelaporan kegiatan harian mahasiswa selama magang.
- **Detail Program**: Menampilkan informasi kriteria, persyaratan, dan capaian pembelajaran setiap lowongan.
- **Responsive Interface**: Antarmuka yang dapat menyesuaikan berbagai ukuran layar.

## 🛠️ Tech Stack

| Bagian | Teknologi |
|---|---|
| Framework | Laravel 12 |
| Template Engine | Laravel Blade |
| CSS Framework | Tailwind CSS 4 |
| JavaScript | Alpine.js |
| Database | MySQL |
| Animation | Custom CSS & AOS |
| Development Tools | PHP, Composer, Node.js, NPM |

## ⚙️ Instalasi dan Konfigurasi

Ikuti langkah-langkah berikut untuk menjalankan project secara lokal.

### 1. Clone Repository

```bash
git clone https://github.com/ThomasSatriaBintara/Project-Magang-Laravel-TSU.git

cd Project-Magang-Laravel-TSU
```

### 2. Instal Dependensi Composer

```bash
composer install
```

### 3. Instal Dependensi NPM

```bash
npm install
```

### 4. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`.

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

### 5. Konfigurasi Database

Buat database MySQL terlebih dahulu, kemudian sesuaikan konfigurasi database pada file `.env`.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Migrasi Database

```bash
php artisan migrate
```

### 7. Jalankan Project

Jalankan Vite:

```bash
npm run dev
```

Buka terminal baru, kemudian jalankan Laravel:

```bash
php artisan serve
```

Akses aplikasi melalui:

```text
http://127.0.0.1:8000
```

---

## 👨‍💻 Developer

**Thomas Satria Bintara**

Information Systems Graduate - Tiga Serangkai University

- GitHub: [ThomasSatriaBintara](https://github.com/ThomasSatriaBintara)

---

## 📄 License

Project ini dikembangkan untuk keperluan akademik sebagai bagian dari tugas akhir/skripsi di Tiga Serangkai University.
