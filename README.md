<p align="center">
  <a href="#" target="_blank">
    <h1 align="center" style="font-size: 3rem; font-weight: bold;">Toko - Online</h1>
  </a>
</p>

<p align="center">
  Website E-commerce modern yang dibangun dengan Laravel 11, Vite, dan Tailwind CSS.
</p>

---

## Tentang Proyek

**NOCTVIBE** adalah aplikasi web e-commerce fungsional yang dirancang untuk menyediakan platform jual beli produk fashion. Proyek ini mencakup semua alur penting dari sebuah toko online, mulai dari menampilkan produk, manajemen keranjang belanja, proses checkout, hingga panel admin untuk mengelola produk dan pesanan.

Proyek ini dibangun sebagai studi kasus untuk mengimplementasikan praktik terbaik pengembangan web modern menggunakan ekosistem Laravel.

## Fitur Utama

-   **Katalog Produk:** Halaman untuk menampilkan semua produk dengan fitur pencarian.
-   **Detail Produk:** Halaman khusus untuk setiap produk dengan galeri gambar dan deskripsi.
-   **Manajemen Keranjang:** Pengguna dapat menambah, melihat, mengubah jumlah, dan menghapus item dari keranjang belanja.
-   **Sistem Checkout:** Alur checkout yang mulus untuk pengguna tamu (guest) maupun yang sudah login.
-   **Autentikasi Pengguna:** Sistem registrasi dan login yang aman menggunakan Laravel Breeze.
-   **Riwayat Pesanan:** Pengguna yang login dapat melihat riwayat transaksi mereka.
-   **Panel Admin:**
    -   Dasbor khusus yang dilindungi untuk admin.
    -   Manajemen Produk penuh (CRUD - Create, Read, Update, Delete) termasuk upload gambar.
    -   Manajemen Kategori Produk (CRUD).
    -   Melihat daftar pesanan yang masuk.
    -   Mengubah status pesanan (Pending, Paid, Shipped, Done).

## Tumpukan Teknologi (Tech Stack)

-   **Backend:** Laravel 11, PHP 8.2
-   **Frontend:** Tailwind CSS, Alpine.js
-   **Build Tool:** Vite
-   **Database:** MySQL
-   **Autentikasi:** Laravel Breeze

---

## Instalasi & Setup Lokal

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lingkungan lokal Anda.

1.  **Clone Repository**
    ```bash
    git clone [https://github.com/URL_REPOSITORY_ANDA.git](https://github.com/URL_REPOSITORY_ANDA.git)
    cd nama-folder-proyek
    ```

2.  **Install Dependensi PHP**
    ```bash
    composer install
    ```

3.  **Install Dependensi JavaScript**
    ```bash
    npm install
    ```

4.  **Setup Environment File**
    Salin file `.env.example` menjadi `.env` dan konfigurasikan koneksi database Anda.
    ```bash
    cp .env.example .env
    ```
    Setelah itu, buka file `.env` dan isi variabel `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD`.

5.  **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

6.  **Jalankan Migrasi & Seeder**
    Perintah ini akan membuat semua tabel database dan mengisi data awal (jika ada seeder).
    ```bash
    php artisan migrate --seed
    ```

7.  **Buat Storage Link**
    Perintah ini penting untuk menampilkan gambar yang di-upload.
    ```bash
    php artisan storage:link
    ```

8.  **Jalankan Server**
    Buka dua terminal terpisah:
    -   Di terminal pertama, jalankan Vite untuk kompilasi aset frontend:
        ```bash
        npm run dev
        ```
    -   Di terminal kedua, jalankan server development Laravel:
        ```bash
        php artisan serve
        ```

Aplikasi Anda sekarang berjalan di `http://127.0.0.1:8000`.

---

## Lisensi

Proyek ini menggunakan lisensi [MIT license](https://opensource.org/licenses/MIT).
