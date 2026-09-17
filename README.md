# 🧺 E-Londri — Sistem Manajemen & Kasir Laundry Digital

![Laravel Version](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel)
![PHP Version](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

Aplikasi manajemen operasional dan sistem kasir _laundry_ digital berbasis RESTful API. Proyek ini dirancang untuk mempermudah pencatatan transaksi kasir, pelacakan status pengerjaan cuci/setrika secara real-time, serta pengelolaan data pelanggan dan paket layanan.

---

## 📋 Daftar Isi

-   [Struktur Tim & Pembagian Peran](#-struktur-tim--pembagian-peran)
-   [Arsitektur & Teknologi](#-arsitektur--teknologi)
-   [Struktur Basis Data & ERD](#-struktur-basis-data--erd)
-   [Panduan Instalasi & Konfigurasi Lokal](#-panduan-instalasi--konfigurasi-lokal)

---

## 👥 Struktur Tim & Pembagian Peran

| Peran                  | Anggota Tim     | Tanggung Jawab Utama                                                                                         |
| :--------------------- | :-------------- | :----------------------------------------------------------------------------------------------------------- |
| **Project Manager**    | Nama PM         | Pengendalian _timeline_, penyusunan papan Kanban, QA fungsional, dan finalisasi dokumentasi repositori.      |
| **Database Analyst**   | Nama DB Analyst | Perancangan ERD, skema migrasi Laravel, penentuan relasi Eloquent, serta pembuatan _Seeder_ & _Factory_.     |
| **Backend Developer**  | Nama Backend    | Pembangunan RESTful API, validasi request (`FormRequest`), API Resource, dan pengelolaan transaksi database. |
| **Frontend Developer** | Nama Frontend   | Pengembangan antarmuka kasir, konsumsi API _endpoint_, validasi _client-side_, dan penanganan _error flow_.  |

---

## 🛠️ Arsitektur & Teknologi

-   **Framework Backend:** Laravel 11
-   **Database Management System:** MySQL 8.0
-   **Authentication:** Laravel Sanctum / JWT
-   **API Documentation & Testing:** Postman Collection v2.1
-   **Version Control System:** Git & GitHub

---

## 🗄️ Struktur Basis Data & ERD

Sistem E-Londri menggunakan 4 tabel utama dengan relasi relasional:

[ customers ] (1) <--- (N) [ orders ] (N) <---> (N) [ services ]

### Penjelasan Entitas:

1. **`customers`** (Master Pelanggan): Menyimpan data identitas pelanggan (`name`, `phone`, `address`).
2. **`services`** (Master Layanan): Menyimpan paket laundry (`name`, `price_per_kg`, `unit`).
3. **`orders`** (Kepala Transaksi): Mencatat nota transaksi (`invoice_code`, `order_date`, `completion_date`, `status`, `total_price`).
4. **`order_details`** (Pivot Table): Hubungan _Many-to-Many_ antara pesanan dan paket layanan (`qty`, `subtotal`).

---

## ⚙️ Panduan Instalasi & Konfigurasi Lokal

Ikuti langkah-langkah berikut untuk menjalankan proyek di lingkungan lokal:

### 1. Prasyarat Sistem

-   PHP >= 8.2
-   Composer >= 2.x
-   MySQL Server
-   Git

### 2. Langkah Instalasi

```bash
# 1. Clone repositori dari GitHub
git clone [https://github.com/username/elondri9.git](https://github.com/username/elondri9.git)

# 2. Masuk ke direktori proyek
cd elondri9

# 3. Install dependensi PHP via Composer
composer install

# 4. Salin berkas lingkungan (.env)
cp .env.example .env

# 5. Generate Application Key
php artisan key:generate
```
