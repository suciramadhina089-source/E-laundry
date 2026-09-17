## E-Londri — Core API System

Backend Engine & RESTful API Service untuk Digitalisasi Operasional Laundry.

Proyek ini merupakan backend engine berbasis RESTful API yang melayani seluruh transaksi kasir, manajemen inventaris paket cuci, dan monitoring status pesanan pelanggan secara terpusat.

## Daftar Isi

-   [Struktur Tim & Pembagian Peran](#-struktur-tim--pembagian-peran)
-   [Arsitektur & Teknologi](#-arsitektur--teknologi)
-   [Struktur Basis Data & ERD](#-struktur-basis-data--erd)
-   [Panduan Instalasi & Konfigurasi Lokal](#-panduan-instalasi--konfigurasi-lokal)
-   [Dokumentasi RESTful API](#-dokumentasi-restful-api)
-   [Pengujian (Testing)](#-pengujian-testing)
-   [Lisensi](#-lisensi)

### Struktur Tim & Pembagian Peran

-   **[Project Manager] Anisa Syahfitri**
    Pengendalian _timeline_, penyusunan papan Kanban, QA fungsional, dan finalisasi dokumentasi repositori.

-   **[DataBase Analyst] Suci Ramadhina**
    Perancangan ERD, skema migrasi Laravel, penentuan relasi Eloquent, serta pembuatan _Seeder_ & _Factory_.

-   **[Backend Developer] Chyntia Putri Dila**
    Pembangunan RESTful API, validasi request (`FormRequest`), API Resource, dan pengelolaan transaksi database.

-   **[Frontend Developer] Meutya Wahyu Talita**
    Pengembangan antarmuka kasir, konsumsi API _endpoint_, validasi _client-side_, dan penanganan _error flow_.

## Arsitektur & Teknologi

-   **Framework Backend:** Laravel 11
-   **Database Management System:** MySQL 8.0
-   **Authentication:** Laravel Sanctum / JWT
-   **API Documentation & Testing:** Postman Collection v2.1
-   **Version Control System:** Git & GitHub

## Penjelasan Entitas

+------------------+ +------------------+ +------------------+
| customers | | orders | | services |
+------------------+ +------------------+ +------------------+
| id (PK) |<---+ | id (PK) |<---+ | id (PK) |
| name | | | invoice_code | | | name |
| phone | +--- | customer_id (FK) | | | price |
| address | | order_date | | | unit |
+------------------+ | status | | +------------------+
| total_price | | ^
+------------------+ | |
^ | |
| +------+------+
| |
+----+---------------------+----+
| order_details |
+-------------------------------+
| id (PK) |
| order_id (FK) |
| service_id (FK) |
| qty |
| subtotal |
+-------------------------------+

## Panduan Instalasi & Konfigurasi Lokal

1. Syarat Perangkat Lunak
   PHP > 8.2
   Composer 2.x
   MySQL Server 8.0+
   Postman (untuk pengujian API)

2. Langkah Instalasi
   1.Clone repositori dari Github
   git clone https://github.com/suciramadhina089-source/E-laundry cd elondri-backend
   2.Masuk ke direktori proyek
   cd elondri-pengayaan
   3.Install dependensi PHP via Composer
   composer install
   4.Salin berkas lingkungan (.env)
   cp .env.example .env
   5.Generate Application Key
   php artisan key:generate

## Konfigurasi Basis Data (.env)

Buka berkas .env lalu atur koneksi databvase anda:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_elondri
DB_USERNAME=root
DB_PASSWORD=

## Migrasi & Seeding Data Dummy

Lalu jalankan di terminal:
php artisan migrate:fresh --seed

## Jalankan Peladen Lokal

php artisan serve

## Dokumentasi RESTful API Endpoint Utama

+------------+-------------------------+-------------------------------------------------+
| Action | Route | Keterangan |
+------------+-------------------------+-------------------------------------------------+
| GET | /api/orders | Ambil riwayat semua transaksi. |
| POST | /api/orders | Tambah transaksi baru. |
| GET | /api/orders/{id} | Ambil detail satu transaksi berdasarkan ID. |
| PACTH | /api/orders/{id}/status | Perbarui status proses pesanan. |
| DELETE | /api/orders/{id} | Batalkan/hapus transaksi. |
+------------+-------------------------+-------------------------------------------------+

## Contoh Payload Request (POST /api/orders)

{
"customer_id": 1,
"completion_date": "2026-09-16",
"services": [
{
"service_id": 1,
"qty": 3
},
{
"service_id": 2,
"qty": 1
}
]
}

## Contoh Response JSON Success (201 Created)

{
"status": true,
"message": "Transaksi laundry berhasil dibuat",
"data": {
"id": 12,
"invoice_code": "INV-20260914-482",
"order_date": "2026-09-14 08:30:00",
"completion_date": "2026-09-16",
"status": "pending",
"total_price": 45000,

    "customer": {
    "id": 1,
    "name": "Budi Santoso",
    "phone": "08123456789"

},

"details": [

{
"service_id": 1,
"service_name": "Cuci Kiloan Regular",
"price_per_kg": 10000,
"qty": 3,
"subtotal": 30000
},
{
"service_id": 2,
"service_name": "Setrika Express",
"price_per_kg": 15000,
"qty": 1,
"subtotal": 15000
}
]
}
}

## Contoh Response Error Validation (422 Unprocessable Entity)

{
"message": "Pelanggan wajib dipilih. (and 1 more error)",
"errors": {
"customer_id": [
"Pelanggan wajib dipilih."
],
"services": [
"Minimal pilih 1 layanan laundry."
]
}
}
