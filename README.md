# 🚗 Aplikasi Sewa Kendaraan Berbasis Web

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
│   ├── models/
│   └── views/
│
├── config/
│   └── database.php
│
├── public/
│   ├── css/
│   ├── js/
│   └── images/
│
├── .htaccess
├── index.php
└── README.md
```

---

## Screenshot Aplikasi

### 1. Halaman Login
![Login](screenshots/login.png)

### 2. Dashboard Admin
![Dashboard Admin](screenshots/dashboard-admin.png)

### 3. Dashboard Operator
![Dashboard Operator](screenshots/dashboard-operator.png)

### 4. Data Kendaraan
![Data Kendaraan](screenshots/data-kendaraan.png)

### 5. Tambah / Edit Kendaraan
![Form Kendaraan](screenshots/form-kendaraan.png)

### 6. Data Pelanggan
![Data Pelanggan](screenshots/data-pelanggan.png)

### 7. Transaksi Penyewaan
![Transaksi](screenshots/transaksi.png)

> 📌 *Catatan:* Screenshot disimpan pada folder **screenshots/** sesuai dengan proses aplikasi.

---

## Cara Menjalankan Aplikasi
1. Pastikan web server (Apache) dan database MySQL sudah aktif
2. Import database ke MySQL
3. Simpan project ke dalam folder `htdocs`
4. Atur konfigurasi database pada folder `config/database.php`
5. Jalankan aplikasi melalui browser

---

## Akun Login (Contoh)
**Admin**
- Username: admin
- Password: admin123

**Operator**
- Username: operator
- Password: operator123

---

## Dokumentasi
- 📄 Dokumentasi PDF (penjelasan & screenshot)
- 🎥 Video dokumentasi (YouTube, durasi < 10 menit)

---

## Penutup
Aplikasi Sewa Kendaraan ini dibuat untuk memenuhi seluruh ketentuan **UAS Pemrograman Web**.  
Diharapkan aplikasi ini dapat membantu proses pengelolaan penyewaan kendaraan secara efektif dan terstruktur.

---

**Nama:** [Isi Nama Mahasiswa]  
**NIM:** [Isi NIM]  
**Kelas:** [Isi Kelas]
