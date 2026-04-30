# 🚆 Sistem Pemesanan Tiket Kereta Api

Website sistem pemesanan tiket kereta api berbasis web yang dibuat menggunakan **PHP Native**, **Tailwind CSS**, dan **MySQL**.  
Project ini memungkinkan user untuk mencari jadwal, memesan tiket, melakukan booking kursi, serta menyediakan dashboard admin untuk mengelola data.

## 📌 Teknologi yang Digunakan

- **PHP Native**
- **Tailwind CSS**
- **MySQL**
- **JavaScript**
- **XAMPP / Apache**

## ✨ Fitur Utama

### User
- Registrasi akun
- Login user
- Cari tiket kereta
- Lihat jadwal kereta
- Pemesanan tiket
- Booking kursi
- Riwayat pemesanan
- Informasi tiket

### Admin
- Login admin
- Dashboard admin
- Kelola data user (CRUD)
- Kelola data kereta (CRUD)
- Kelola data stasiun (CRUD)
- Kelola jadwal kereta (CRUD)
- Verifikasi pembayaran
- Kelola data pemesanan

## 🔐 Hak Akses
Project memiliki 2 role utama:

- **Admin**
  - Mengelola seluruh data sistem
  - Memverifikasi pembayaran
  - Mengelola jadwal, user, kereta, dan stasiun

- **User**
  - Melakukan pemesanan tiket
  - Booking kursi
  - Melihat riwayat pemesanan

## 📂 Struktur Folder

```bash
projectpkktiketkereta/
│── admin/
│── user/
│── img/
│── src/
│── koneksi.php
│── index.php
│── ceklogin.php
│── registrasi.php
│── package.json
```

## ⚙️ Cara Menjalankan Project

1. Clone repository
```bash
git clone https://github.com/SalomoOn7/PKK-Pemesanan-Tiket-Kereta-Api.git
```

2. Pindahkan project ke folder `htdocs`
```bash
C:/xampp/htdocs/
```

3. Import database MySQL ke phpMyAdmin

4. Konfigurasi database pada file `koneksi.php`

```php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_tiket_kereta";
```

5. Jalankan Apache dan MySQL melalui XAMPP

6. Akses project melalui browser
```bash
http://localhost/projectpkktiketkereta
```

## 📸 Screenshot
Tambahkan screenshot project di sini.

## 👨‍💻 Developer
**Salomo Halomoan**

GitHub: https://github.com/SalomoOn7
