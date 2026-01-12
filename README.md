# 🚗 Aplikasi Sewa Kendaraan Berbasis Web

**Nama:** Manuel Johansen Dolok Saribu  
**NIM:** 312410493  
**Kelas:** TI.24.A5

## Deskripsi
Aplikasi Sewa Kendaraan adalah aplikasi berbasis web yang dibuat untuk memenuhi **UAS Pemrograman Web**.  
Aplikasi ini digunakan untuk membantu pengelolaan penyewaan kendaraan, mulai dari manajemen data kendaraan, data pelanggan, hingga transaksi sewa.

Aplikasi dikembangkan menggunakan konsep **OOP dan Modular**, dilengkapi dengan **routing menggunakan .htaccess**, tampilan **responsive (mobile first)**, serta sistem **login dengan role Admin dan Operator/Staff**.

---

## Teknologi yang Digunakan
- HTML5
- CSS3
- JavaScript
- PHP (OOP & Modular)
- MySQL
- Bootstrap (Responsive Design)
- Apache (.htaccess untuk routing)

---

## Fitur Aplikasi

### 1. Sistem Login & Hak Akses
Aplikasi memiliki dua role pengguna:

#### 🔹 Admin
- Login ke dashboard admin
- Mengelola data kendaraan (CRUD)
- Mengelola data pelanggan
- Mengelola data operator/staff
- Mengelola transaksi sewa
- Fitur pencarian dan pagination

#### 🔹 Operator / Staff
- Login ke dashboard operator
- Melihat dan mengelola data pelanggan
- Melihat data kendaraan
- Mengelola proses penyewaan
- Fitur pencarian dan pagination

---

### 2. Manajemen Data Kendaraan
- Tambah data kendaraan
- Edit data kendaraan
- Hapus data kendaraan
- Lihat daftar kendaraan
- Pencarian dan pagination data

---

### 3. Manajemen Data Pelanggan
- Tambah data pelanggan
- Edit data pelanggan
- Hapus data pelanggan
- Lihat data pelanggan
- Digunakan oleh admin dan operator

---

### 4. Transaksi / Penyewaan Kendaraan
- Input data penyewaan kendaraan
- Menghubungkan data kendaraan dan pelanggan
- Mempermudah proses pengelolaan sewa

---

### 5. Responsive Design
- Tampilan mobile friendly
- Dapat diakses melalui smartphone dan desktop
- Menggunakan framework Bootstrap

---

## Struktur Folder Project (Contoh)
```
rental-kendaraan/
│
├── app/
│   ├── controllers/
│   │   ├── AuthController.php
│   │   ├── DashboardController.php
│   │   ├── HomeController.php
│   │   ├── KendaraanController.php
│   │   ├── PelangganController.php
│   │   ├── TransaksiController.php
│   │   └── LaporanController.php
│   │
│   ├── models/
│   │   ├── User.php
│   │   ├── Kendaraan.php
│   │   ├── Pelanggan.php
│   │   ├── Transaksi.php
│   │   └── Denda.php
│   │
│   ├── views/
│   │   ├── auth/
│   │   │   └── login.php
│   │   ├── layouts/
│   │   │   ├── header.php
│   │   │   ├── sidebar.php
│   │   │   └── footer.php
│   │   ├── dashboard/
│   │   │   └── index.php
│   │   ├── kendaraan/
│   │   │   ├── index.php
│   │   │   ├── create.php
│   │   │   └── edit.php
│   │   ├── pelanggan/
│   │   │   ├── index.php
│   │   │   ├── create.php
│   │   │   └── edit.php
│   │   ├── transaksi/
│   │   │   ├── index.php
│   │   │   ├── create.php
│   │   │   ├── detail.php
│   │   │   └── pengembalian.php
│   │   └── laporan/
│   │       └── index.php
│   │
│   └── core/
│       ├── App.php
│       └── Controller.php
│
├── config/
│   └── Database.php
│
├── public/
│   ├── assets/
│   │   ├── css/
│   │   │   └── style.css
│   │   └──  js/
│   │        └── script.js 
│   │       
│   ├── .htaccess
│   └── index.php
│
└── database/
    └── rental_kendaraan.sql
```
---

## Screenshot Aplikasi

### 1. Halaman Login
![Login](https://github.com/Manueljds2311105/UASWEB1/blob/6ed7f2c496217f0e3f825099cff953ad7984e22f/Screenshots/Screenshot%202026-01-12%20214631.png)

### 2. Dashboard Admin
![Dashboard Admin](https://github.com/Manueljds2311105/UASWEB1/blob/6ed7f2c496217f0e3f825099cff953ad7984e22f/Screenshots/Screenshot%202026-01-12%20214817.png)

### 3. Dashboard Operator
![Dashboard Operator](https://github.com/Manueljds2311105/UASWEB1/blob/6ed7f2c496217f0e3f825099cff953ad7984e22f/Screenshots/Screenshot%202026-01-12%20214902.png)

### 4. Data Kendaraan
![Data Kendaraan](https://github.com/Manueljds2311105/UASWEB1/blob/6ed7f2c496217f0e3f825099cff953ad7984e22f/Screenshots/Screenshot%202026-01-12%20214936.png)
![Data Kendaraan](https://github.com/Manueljds2311105/UASWEB1/blob/6ed7f2c496217f0e3f825099cff953ad7984e22f/Screenshots/Screenshot%202026-01-12%20215220.png)

### 5. Tambah / Edit Kendaraan
![Form Kendaraan](https://github.com/Manueljds2311105/UASWEB1/blob/6ed7f2c496217f0e3f825099cff953ad7984e22f/Screenshots/Screenshot%202026-01-12%20215105.png)
![Form Kendaraan](https://github.com/Manueljds2311105/UASWEB1/blob/6ed7f2c496217f0e3f825099cff953ad7984e22f/Screenshots/Screenshot%202026-01-12%20215137.png)

### 6. Data Pelanggan
![Data Pelanggan](https://github.com/Manueljds2311105/UASWEB1/blob/6ed7f2c496217f0e3f825099cff953ad7984e22f/Screenshots/Screenshot%202026-01-12%20214953.png)
![Data Pelanggan](https://github.com/Manueljds2311105/UASWEB1/blob/6ed7f2c496217f0e3f825099cff953ad7984e22f/Screenshots/Screenshot%202026-01-12%20215237.png)

### 7. Transaksi Penyewaan
![Transaksi](https://github.com/Manueljds2311105/UASWEB1/blob/6ed7f2c496217f0e3f825099cff953ad7984e22f/Screenshots/Screenshot%202026-01-12%20215011.png)
![Transaksi](https://github.com/Manueljds2311105/UASWEB1/blob/6ed7f2c496217f0e3f825099cff953ad7984e22f/Screenshots/Screenshot%202026-01-12%20215317.png)


---

## Cara Menjalankan Aplikasi
1. Pastikan web server (Apache) dan database MySQL sudah aktif
2. Import database ke MySQL
3. Simpan project ke dalam folder `htdocs`
4. Atur konfigurasi database pada folder `public/indek.php`
```php
<?php
// Configuration
define('BASE_URL', 'http://localhost/rental-kendaraan/public/');

// Autoload core files
require_once '../app/core/App.php';
require_once '../app/core/Controller.php';
require_once '../config/Database.php';

// Run application
$app = new App();
?>
```
6. Jalankan aplikasi melalui browser

---

## Akun Login 
**Admin**
- Username: admin
- Password: admin

**Operator**
- Username: operator
- Password: user123

---

## Dokumentasi
- 📄 Dokumentasi PDF (penjelasan & screenshot)
- 🎥 Video dokumentasi (https://youtu.be/NFqFjV-8wBY?si=6ZTQaRnlVqARRmX4)

---

## Penutup
Aplikasi Sewa Kendaraan ini dibuat untuk memenuhi seluruh ketentuan **UAS Pemrograman Web**.  
Diharapkan aplikasi ini dapat membantu proses pengelolaan penyewaan kendaraan secara efektif dan terstruktur.

