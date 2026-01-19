# 🏟️ Arena KU - Sistem Pemesanan Lapangan Olahraga

<div align="center">
  <img src="images/logobaru.png" alt="Arena KU Logo" width="200"/>
  <h3>Super Sport Community App</h3>
  <p><em>Selamat Datang Di Arena Ku</em></p>
</div>

---

## 📋 Deskripsi Proyek

**Arena KU** adalah aplikasi web berbasis PHP untuk pemesanan lapangan olahraga seperti Futsal, Badminton, Basket, dan Mini Soccer. Aplikasi ini memudahkan pengguna untuk memesan lapangan secara online dengan berbagai metode pembayaran yang fleksibel.

## ✨ Fitur Utama

### Untuk User/Pelanggan:
- 🔐 Registrasi dan Login
- 🏟️ Melihat daftar lapangan berdasarkan jenis olahraga
- 🛒 Sistem keranjang pesanan
- 💳 Multiple metode pembayaran (Transfer Bank, E-Wallet, COD, QRIS)
- 📄 Cetak nota pemesanan
- 📱 Responsive design

### Untuk Admin:
- 📊 Dashboard admin
- ➕ Tambah, edit, dan hapus lapangan
- 📋 Kelola data pemesanan
- 👥 Lihat data customer
- 🗑️ Hapus data pesanan

### Fitur Tambahan:
- 📝 Blog artikel olahraga
- 🤝 Fitur "Main Bareng" untuk mencari partner olahraga
- ⚔️ Fitur "Sparring" untuk pertandingan antar tim
- 🔍 Filter lapangan berdasarkan jenis

## 🛠️ Teknologi yang Digunakan

- **Backend:** PHP 8.x
- **Database:** MySQL 8.0
- **Frontend:** 
  - HTML5
  - CSS3
  - Bootstrap 4.5
  - JavaScript
  - jQuery
  - DataTables
- **Icons:** Font Awesome

## 📦 Instalasi

### Prasyarat
- XAMPP/WAMP/LAMP (PHP 8.x + MySQL 8.0)
- Web Browser (Chrome, Firefox, Edge)

### Langkah Instalasi

1. **Clone atau Download Project**
   ```bash
   git clone <repository-url>
   ```
   atau download ZIP dan extract ke folder `htdocs` (XAMPP) atau `www` (WAMP)

2. **Import Database**
   - Buka phpMyAdmin (http://localhost/phpmyadmin)
   - Buat database baru dengan nama `dbpemesanan`
   - Import file `dbpemesanan.sql` ke database tersebut

3. **Konfigurasi Database**
   - Buka file `koneksi.php`
   - Sesuaikan konfigurasi jika diperlukan:
   ```php
   $host = "localhost";
   $user = "root";
   $pass = "";
   $db = "dbpemesanan";
   ```

4. **Jalankan Aplikasi**
   - Start Apache dan MySQL di XAMPP/WAMP
   - Buka browser dan akses: `http://localhost/arena-ku/`

## 👤 Akun Default

### Admin
- **Username:** admin
- **Password:** admin

### User
- **Username:** user
- **Password:** user

## 📁 Struktur Database

### Tabel `user`
- id_user (Primary Key)
- username
- password
- nama_lengkap
- jenis_kelamin
- tanggal_lahir
- alamat
- hp
- status (admin/user)

### Tabel `produk`
- id_menu (Primary Key)
- nama_menu
- jenis_menu (Futsal/Badminton/Basket/Minisoccer)
- harga
- gambar

### Tabel `pemesanan`
- id_pemesanan (Primary Key)
- tanggal_pemesanan
- total_belanja
- metode_pembayaran

### Tabel `pemesanan_produk`
- id_pemesanan_produk (Primary Key)
- id_pemesanan (Foreign Key)
- id_menu (Foreign Key)
- jumlah

## 🎯 Cara Penggunaan

### Untuk Pelanggan:
1. Daftar akun baru melalui halaman registrasi
2. Login dengan akun yang telah dibuat
3. Pilih jenis lapangan yang diinginkan
4. Klik "PESAN" pada lapangan pilihan
5. Cek keranjang pesanan
6. Konfirmasi pesanan
7. Pilih metode pembayaran
8. Cetak nota pemesanan

### Untuk Admin:
1. Login dengan akun admin
2. Kelola daftar lapangan (tambah/edit/hapus)
3. Lihat dan kelola data pemesanan
4. Hapus data pesanan jika diperlukan

## 📸 Screenshot

### Halaman Utama
Landing page dengan hero section, fitur Main Bareng, Sparring, dan Blog

### Dashboard User
Akses ke daftar lapangan dan pesanan

### Dashboard Admin
Manajemen lapangan dan pesanan

### Halaman Pembayaran
Multiple metode pembayaran dengan QRIS

## 🔒 Keamanan

⚠️ **Catatan Penting:**
- Password disimpan dalam plain text (tidak dienkripsi)
- Untuk production, gunakan `password_hash()` dan `password_verify()`
- Implementasikan prepared statements untuk mencegah SQL Injection
- Tambahkan validasi input yang lebih ketat

## 🐛 Bug Fixes yang Telah Dilakukan

1. ✅ Perbaikan SQL Injection vulnerability dengan `mysqli_real_escape_string()`
2. ✅ Perbaikan session handling
3. ✅ Perbaikan redirect setelah login
4. ✅ Perbaikan copyright footer (2020 → 2025)

## 📝 To-Do / Improvement

- [ ] Implementasi password hashing
- [ ] Prepared statements untuk semua query
- [ ] Upload bukti pembayaran
- [ ] Notifikasi email setelah booking
- [ ] Rating dan review lapangan
- [ ] Sistem booking dengan kalender
- [ ] Integrasi payment gateway
- [ ] Dashboard analytics untuk admin

## 📄 Lisensi

© 2025 Arena KU. All rights reserved. Powered by Arena Group.

## 📞 Kontak

- Instagram: [@arena.ku](https://instagram.com/arena.ku)
- WhatsApp: +62 812-3456-789

## 🙏 Acknowledgments

- Bootstrap Team
- Font Awesome
- DataTables
- jQuery Team

---

**Happy Coding! 🚀**
