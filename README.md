# PRAKTIKUM 8 – PHP DAN DATABASE MYSQL

## 1. Tujuan Praktikum

Praktikum ini bertujuan untuk:
1. Memahami konsep dasar Database.
2. Memahami konsep dasar CRUD menggunakan PHP.
3. Membuat program CRUD sederhana menggunakan PHP dan MySQL.

## 2. Perangkat yang Digunakan

- Visual Studio Code
- XAMPP
- Apache
- MySQL
- phpMyAdmin
- Google Chrome

## 3. Langkah-Langkah Praktikum

### A. Membuat Database

Membuat database `latihan1` dan tabel `data_barang` menggunakan phpMyAdmin. Tabel digunakan untuk menyimpan informasi barang seperti nama, kategori, harga beli, harga jual, dan stok.

**Screenshot:**

![Database](screenshot/data_barang.png)

### B. Menambahkan Data Awal

Memasukkan beberapa data barang ke dalam database, yaitu HP Samsung Android, HP Xiaomi Android, dan HP OPPO Android.

**Screenshot:**

![Menambahkan Data](screenshot/nambahin data barang.png)

### C. Membuat Koneksi Database

Membuat file `koneksi.php` untuk menghubungkan PHP dengan database MySQL menggunakan fungsi `mysqli_connect()`.

Pengujian dilakukan melalui browser untuk memastikan koneksi berhasil.

**Screenshot:**

![Koneksi Berhasil](screenshot/koneksi berhasil.png)

### D. Menampilkan Data Barang (Read)

Membuat file `index.php` untuk menampilkan seluruh data barang dari database menggunakan perintah SQL SELECT.

**Screenshot:**

![Data Barang Index](screenshot/data barang index.png)

### E. Menambahkan Data Barang (Create)

Membuat file `tambah.php` yang berfungsi untuk menambahkan barang baru melalui formulir input pada website.

**Screenshot:**

![Tambah Barang](screenshot/tambah barang.png)

### F. Validasi Data

Melakukan pengujian formulir dan memastikan data yang dimasukkan sesuai dengan kebutuhan aplikasi.

**Screenshot:**

![Data Valid](screenshot/data valid.png)

### G. Mengubah Data Barang (Update)

Membuat file `ubah.php` untuk mengubah informasi barang yang sudah tersimpan di dalam database.

**Screenshot:**

![Edit Barang](screenshot/edit barang.png)

### H. Menghapus Data Barang (Delete)

Membuat file `hapus.php` untuk menghapus data barang berdasarkan ID barang yang dipilih.

**Screenshot:**

![Hapus Barang](screenshot/hapus barang.png)

## 4. Struktur Folder

```text
Lab8Web/
│
├── koneksi.php
├── index.php
├── tambah.php
├── ubah.php
├── hapus.php
├── style.css
├── README.md
│
├── gambar/
│
└── screenshot/
    ├── data barang index.png
    ├── data valid.png
    ├── data_barang.png
    ├── edit barang.png
    ├── hapus barang.png
    ├── koneksi berhasil.png
    ├── nambahin data barang.png
    └── tambah barang.png
```

## 5. Cara Menjalankan Program

1. Jalankan XAMPP Control Panel.
2. Aktifkan Apache dan MySQL.
3. Pastikan database `latihan1` sudah tersedia.
4. Simpan folder proyek di dalam direktori `htdocs`.
5. Buka browser.
6. Masukkan alamat berikut:

```text
http://localhost/lab8_php_database/
```

7. Website Data Barang akan ditampilkan dan dapat digunakan untuk melakukan operasi CRUD.

## 6. Hasil Praktikum

Praktikum ini menghasilkan aplikasi pengelolaan data barang berbasis web menggunakan PHP dan MySQL.

Aplikasi memiliki empat fungsi utama CRUD:

- **Create:** Menambahkan data barang.
- **Read:** Menampilkan data barang.
- **Update:** Mengubah data barang.
- **Delete:** Menghapus data barang.

## 7. Kesimpulan

Melalui praktikum ini, mahasiswa dapat memahami penggunaan PHP untuk mengelola database MySQL. Aplikasi Data Barang yang dibuat menerapkan konsep CRUD sehingga pengguna dapat menambahkan, melihat, mengubah, dan menghapus data melalui halaman website.
