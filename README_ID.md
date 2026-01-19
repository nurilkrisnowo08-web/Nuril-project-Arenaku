# 🏟️ Arena KU - Sistem Pemesanan Lapangan Olahraga

<div align="center">
  <img src="images/logobaru.png" alt="Arena KU Logo" width="200"/>
  <h3>Super Sport Community App</h3>
  <p><em>Selamat Datang Di Arena Ku</em></p>
  
  [![PHP Version](https://img.shields.io/badge/PHP-8.0%2B-blue)](https://www.php.net/)
  [![MySQL](https://img.shields.io/badge/MySQL-8.0-orange)](https://www.mysql.com/)
  [![Bootstrap](https://img.shields.io/badge/Bootstrap-4.5-purple)](https://getbootstrap.com/)
  [![License](https://img.shields.io/badge/License-Proprietary-red)](LICENSE)
</div>

---

## 📋 Tentang Proyek

**Arena KU** adalah aplikasi web berbasis PHP untuk pemesanan lapangan olahraga secara online. Aplikasi ini memudahkan pengguna untuk memesan berbagai jenis lapangan olahraga seperti Futsal, Badminton, Basket, dan Mini Soccer dengan sistem pembayaran yang fleksibel.

### 🎯 Tujuan Proyek
- Memudahkan pemesanan lapangan olahraga
- Digitalisasi manajemen venue olahraga
- Menyediakan platform komunitas olahraga
- Meningkatkan efisiensi booking lapangan

---

## ✨ Fitur Utama

### 👤 Untuk Pelanggan
- 🔐 **Registrasi & Login** - Sistem autentikasi user
- 🏟️ **Daftar Lapangan** - Browse lapangan berdasarkan jenis olahraga
- 🔍 **Filter Lapangan** - Cari lapangan sesuai kebutuhan
- 🛒 **Keranjang Pesanan** - Sistem shopping cart
- 💳 **Multiple Payment** - 4 metode pembayaran (Bank, E-Wallet, COD, QRIS)
- 📄 **Cetak Nota** - Download bukti booking
- 📱 **Responsive Design** - Akses dari berbagai device

### 👨‍💼 Untuk Admin
- 📊 **Dashboard Admin** - Overview sistem
- ➕ **Manajemen Lapangan** - Tambah, edit, hapus lapangan
- 📋 **Kelola Pesanan** - Lihat dan manage booking
- 👥 **Data Customer** - Informasi pelanggan
- 🗑️ **Hapus Data** - Delete pesanan jika diperlukan
- 📈 **Laporan** - Data pemesanan

### 🌟 Fitur Tambahan
- 📝 **Blog Olahraga** - Artikel tips dan informasi
- 🤝 **Main Bareng** - Cari partner olahraga
- ⚔️ **Sparring** - Jadwalkan pertandingan antar tim
- 🎨 **Modern UI** - Desain menarik dengan efek glowing

---

## 🛠️ Teknologi yang Digunakan

### Backend
- **PHP** 8.0+ - Server-side scripting
- **MySQL** 8.0 - Database management
- **Session** - User authentication

### Frontend
- **HTML5** - Markup language
- **CSS3** - Styling
- **Bootstrap 4.5** - Responsive framework
- **JavaScript** - Client-side scripting
- **jQuery** - JavaScript library
- **DataTables** - Table plugin

### Tools & Libraries
- **Font Awesome** - Icon library
- **Google Fonts** - Typography
- **XAMPP/LAMP/MAMP** - Development environment

---

## 📦 Instalasi

### Prasyarat
- XAMPP/WAMP/LAMP (PHP 8.x + MySQL 8.0)
- Web Browser modern (Chrome, Firefox, Edge)
- Git (optional)

### Langkah Cepat (5 Menit)

#### 1. Download & Extract
```bash
# Via Git
git clone <repository-url> arena-ku

# Atau download ZIP dan extract ke htdocs
```

#### 2. Setup Database
```sql
1. Buka phpMyAdmin (http://localhost/phpmyadmin)
2. Buat database: dbpemesanan
3. Import file: dbpemesanan.sql
```

#### 3. Konfigurasi (Optional)
```php
// File: koneksi.php
$host = "localhost";
$user = "root";
$pass = "";  // Sesuaikan jika ada password
$db = "dbpemesanan";
```

#### 4. Jalankan
```
1. Start Apache & MySQL di XAMPP
2. Buka browser: http://localhost/arena-ku
3. Login dengan akun default
```

**📚 Panduan Lengkap:** Lihat [INSTALL.md](INSTALL.md) atau [QUICKSTART.md](QUICKSTART.md)

---

## 👤 Akun Default

### Admin
```
Username: admin
Password: admin
Akses: Manajemen lapangan & pesanan
```

### User/Pelanggan
```
Username: user
Password: user
Akses: Booking lapangan
```

⚠️ **Penting:** Ganti password default setelah instalasi!

---

## 📁 Struktur Database

### Tabel Utama

#### 1. `user` - Data Pengguna
```sql
- id_user (PK)
- username
- password
- nama_lengkap
- jenis_kelamin
- tanggal_lahir
- alamat
- hp
- status (admin/user)
```

#### 2. `produk` - Data Lapangan
```sql
- id_menu (PK)
- nama_menu
- jenis_menu (Futsal/Badminton/Basket/Minisoccer)
- harga
- gambar
```

#### 3. `pemesanan` - Data Booking
```sql
- id_pemesanan (PK)
- tanggal_pemesanan
- total_belanja
- metode_pembayaran
```

#### 4. `pemesanan_produk` - Detail Booking
```sql
- id_pemesanan_produk (PK)
- id_pemesanan (FK)
- id_menu (FK)
- jumlah
```

**📚 Detail Lengkap:** Lihat [API_DOCUMENTATION.md](API_DOCUMENTATION.md)

---

## 🎯 Cara Penggunaan

### Untuk Pelanggan

#### 1. Registrasi
```
1. Klik "Daftar" di halaman utama
2. Isi form registrasi
3. Submit
```

#### 2. Login
```
1. Klik "Masuk"
2. Input username & password
3. Login
```

#### 3. Booking Lapangan
```
1. Browse "Daftar Lapangan"
2. Filter berdasarkan jenis (optional)
3. Klik "PESAN" pada lapangan pilihan
4. Cek "Pesanan Anda"
5. Klik "Konfirmasi Pesanan"
6. Pilih metode pembayaran
7. Cetak nota booking
```

### Untuk Admin

#### 1. Manajemen Lapangan
```
1. Login sebagai admin
2. Klik "Daftar Lapangan"
3. Tambah/Edit/Hapus lapangan
```

#### 2. Kelola Pesanan
```
1. Klik "Pesanan"
2. Lihat semua booking
3. Klik "Detail" untuk info lengkap
4. Konfirmasi pembayaran
5. Hapus jika diperlukan
```

---

## 💳 Metode Pembayaran

### 1. Transfer Bank
- **BCA:** 1234567890 a.n PT ArenaKU
- **BRI:** 0987654321 a.n PT ArenaKU
- **Mandiri:** 1122334455 a.n PT ArenaKU

### 2. E-Wallet
- **DANA:** 085712345678 a.n ArenaKU
- **OVO:** 085798765432 a.n ArenaKU
- **GoPay:** 081234567890 a.n ArenaKU

### 3. QRIS
- Scan QR code yang tersedia
- Support semua e-wallet

### 4. COD (Cash on Delivery)
- Bayar di tempat saat booking

---

## 📸 Screenshot

### Halaman Utama
Landing page dengan hero section, fitur Main Bareng, Sparring, dan Blog

### Dashboard User
Akses ke daftar lapangan dan pesanan

### Dashboard Admin
Manajemen lapangan dan pesanan

### Halaman Pembayaran
Multiple metode pembayaran dengan QRIS

---

## 🔒 Keamanan

### ⚠️ Peringatan Penting

Aplikasi ini memiliki beberapa vulnerability yang perlu diperbaiki sebelum production:

1. **Password Plain Text** (CRITICAL)
   - Password tidak dienkripsi
   - Perlu implementasi `password_hash()`

2. **SQL Injection** (CRITICAL)
   - Query tidak menggunakan prepared statements
   - Perlu refactor semua query

3. **XSS Vulnerability** (HIGH)
   - Output tidak di-escape
   - Perlu `htmlspecialchars()` pada semua output

4. **CSRF Protection** (HIGH)
   - Tidak ada token CSRF
   - Perlu implementasi CSRF token

5. **File Upload Security** (HIGH)
   - Validasi file terbatas
   - Perlu validasi lebih ketat

**📚 Detail Lengkap:** Baca [SECURITY.md](SECURITY.md) sebelum production!

---

## 🐛 Bug Fixes (Versi 2.0.0)

### Yang Telah Diperbaiki
- ✅ Copyright year updated (2020 → 2025)
- ✅ Broken navigation links fixed
- ✅ Typo pada button fixed
- ✅ Redirect URL corrected
- ✅ SQL injection partially mitigated

### Known Issues
- ⚠️ Security vulnerabilities (documented)
- ⚠️ No automated tests
- ⚠️ Limited input validation

**📚 Detail:** Lihat [CHANGELOG.md](CHANGELOG.md)

---

## 📝 Roadmap

### Version 2.1.0 (Q1 2025)
- [ ] Password hashing
- [ ] Prepared statements
- [ ] CSRF protection
- [ ] Input validation
- [ ] Email notifications

### Version 2.2.0 (Q2 2025)
- [ ] Rating & review system
- [ ] Calendar booking
- [ ] Payment gateway integration
- [ ] Admin analytics

### Version 3.0.0 (Q3 2025)
- [ ] Mobile app
- [ ] Real-time notifications
- [ ] Multi-language support
- [ ] Advanced reporting

---

## 🤝 Kontribusi

Kami menerima kontribusi dari siapa saja! 

### Cara Berkontribusi
1. Fork repository
2. Buat branch baru (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

**📚 Panduan Lengkap:** Baca [CONTRIBUTING.md](CONTRIBUTING.md)

### Yang Bisa Dikontribusi
- 🐛 Fix bugs
- ✨ Add features
- 📝 Improve documentation
- 🧪 Add tests
- 🎨 Improve UI/UX
- 🔒 Security improvements

---

## 📚 Dokumentasi

### Dokumentasi Tersedia
- **[README.md](README.md)** - Overview proyek (English)
- **[README_ID.md](README_ID.md)** - Overview proyek (Bahasa Indonesia)
- **[QUICKSTART.md](QUICKSTART.md)** - Panduan cepat 5 menit
- **[INSTALL.md](INSTALL.md)** - Panduan instalasi lengkap
- **[API_DOCUMENTATION.md](API_DOCUMENTATION.md)** - Dokumentasi teknis
- **[SECURITY.md](SECURITY.md)** - Informasi keamanan
- **[CONTRIBUTING.md](CONTRIBUTING.md)** - Panduan kontribusi
- **[CHANGELOG.md](CHANGELOG.md)** - Riwayat perubahan
- **[DOCUMENTATION_INDEX.md](DOCUMENTATION_INDEX.md)** - Index dokumentasi

**Total:** 65+ KB dokumentasi profesional

---

## 🆘 Bantuan & Support

### Dokumentasi
- 📖 Baca [DOCUMENTATION_INDEX.md](DOCUMENTATION_INDEX.md)
- 🚀 Quick start: [QUICKSTART.md](QUICKSTART.md)
- 🔧 Troubleshooting: [INSTALL.md](INSTALL.md#troubleshooting)

### Issues
- 🐛 Report bug: GitHub Issues
- 💡 Feature request: GitHub Issues
- ❓ Questions: GitHub Discussions

### Contact
- 📧 Email: dev@arenaku.com
- 📱 WhatsApp: +62 812-3456-789
- 📷 Instagram: [@arena.ku](https://instagram.com/arena.ku)

---

## 👨‍💻 Developer

### Developers
- **Ahmad Syauki**
- **Zulfan Lutfiansyah**

### Contributors
- [List of contributors]

---

## 🙏 Acknowledgments

Terima kasih kepada:
- **Bootstrap Team** - Framework CSS
- **Font Awesome** - Icon library
- **DataTables** - Table plugin
- **jQuery Team** - JavaScript library
- **Open Source Community** - Inspiration & support

---

## 📄 Lisensi

© 2025 Arena KU. All rights reserved. Powered by Arena Group.

**Catatan:** Proyek ini untuk tujuan edukasi dan portfolio. Tidak untuk penggunaan komersial tanpa izin.

---

## 📊 Statistik Proyek

- **Total Files:** 50+ files
- **Lines of Code:** 5,000+ lines
- **Documentation:** 65+ KB
- **Database Tables:** 4 tables + 1 view
- **Features:** 15+ features
- **Supported Sports:** 4 types
- **Payment Methods:** 4 options

---

## 🌟 Fitur Unggulan

### 1. Multiple Payment Methods
Mendukung 4 metode pembayaran berbeda termasuk QRIS untuk kemudahan transaksi.

### 2. Responsive Design
Tampilan yang optimal di berbagai device (desktop, tablet, mobile).

### 3. Modern UI
Desain modern dengan efek glowing dan animasi smooth.

### 4. Community Features
Fitur Main Bareng dan Sparring untuk membangun komunitas olahraga.

### 5. Easy Management
Dashboard admin yang user-friendly untuk manajemen lapangan dan pesanan.

---

## 🎓 Untuk Pembelajaran

Proyek ini cocok untuk:
- ✅ Belajar PHP & MySQL
- ✅ Memahami sistem booking
- ✅ Praktik web development
- ✅ Portfolio project
- ✅ Tugas akhir/skripsi

---

## ⚡ Quick Links

- 🏠 [Homepage](index.html)
- 🔐 [Login](login.php)
- 📝 [Register](register.php)
- 👨‍💼 [Admin Dashboard](admin.php)
- 👤 [Customer Dashboard](customer.php)
- 📚 [Full Documentation](DOCUMENTATION_INDEX.md)

---

## 🎯 Status Proyek

| Aspect | Status |
|--------|--------|
| Development | ✅ Active |
| Documentation | ✅ Complete |
| Testing | ⚠️ Manual Only |
| Security | ⚠️ Needs Improvement |
| Production Ready | ❌ Not Yet |

---

## 💡 Tips

1. **Backup Database** sebelum testing
2. **Baca SECURITY.md** sebelum production
3. **Follow CONTRIBUTING.md** untuk berkontribusi
4. **Check CHANGELOG.md** untuk update terbaru
5. **Use QUICKSTART.md** untuk instalasi cepat

---

**Dibuat dengan ❤️ oleh Ahmad Syauki & Zulfan Lutfiansyah**

**Last Updated:** 2025-01-06  
**Version:** 2.0.0  
**Status:** ✅ Ready for Development

---

**Selamat menggunakan Arena KU! 🎉**

*Untuk versi English, lihat [README.md](README.md)*
