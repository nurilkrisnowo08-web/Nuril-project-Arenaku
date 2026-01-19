# ⚡ Quick Start Guide - Arena KU

Panduan cepat untuk menjalankan Arena KU dalam 5 menit!

---

## 🚀 Super Quick Start (Windows + XAMPP)

### Step 1: Install XAMPP (2 menit)
```
1. Download XAMPP dari https://www.apachefriends.org
2. Install dengan PHP 8.x
3. Jalankan XAMPP Control Panel
4. Start Apache dan MySQL
```

### Step 2: Setup Project (1 menit)
```
1. Extract project ke: C:\xampp\htdocs\arena-ku
2. Atau clone: git clone <repo-url> C:\xampp\htdocs\arena-ku
```

### Step 3: Setup Database (1 menit)
```
1. Buka browser: http://localhost/phpmyadmin
2. Klik "New" → Nama: dbpemesanan
3. Klik "Import" → Pilih file: dbpemesanan.sql
4. Klik "Go"
```

### Step 4: Jalankan! (30 detik)
```
1. Buka browser: http://localhost/arena-ku
2. Klik "Masuk"
3. Login:
   - Admin: username: admin, password: admin
   - User: username: user, password: user
```

**🎉 Done! Aplikasi sudah berjalan!**

---

## 🐧 Quick Start (Linux)

### One-Line Install
```bash
# Install LAMP
sudo apt update && sudo apt install -y apache2 mysql-server php php-mysql

# Clone project
cd /var/www/html && sudo git clone <repo-url> arena-ku

# Setup database
sudo mysql -e "CREATE DATABASE dbpemesanan;"
sudo mysql dbpemesanan < arena-ku/dbpemesanan.sql

# Set permissions
sudo chown -R www-data:www-data arena-ku
sudo chmod -R 755 arena-ku

# Done! Access: http://localhost/arena-ku
```

---

## 🍎 Quick Start (macOS)

### Using MAMP
```bash
# Install MAMP from https://www.mamp.info
# Clone to MAMP htdocs
cd /Applications/MAMP/htdocs
git clone <repo-url> arena-ku

# Import database via phpMyAdmin
# Access: http://localhost:8888/arena-ku
```

---

## 🐳 Quick Start (Docker)

### Using Docker Compose
```bash
# Create docker-compose.yml (see INSTALL.md)
docker-compose up -d

# Import database
docker exec -i <mysql_container> mysql -uroot -proot dbpemesanan < dbpemesanan.sql

# Access: http://localhost:8080
```

---

## ✅ Verification Checklist

Setelah instalasi, cek:

- [ ] Homepage muncul (http://localhost/arena-ku)
- [ ] Bisa login sebagai admin
- [ ] Bisa login sebagai user
- [ ] Bisa lihat daftar lapangan
- [ ] Bisa tambah ke keranjang
- [ ] Bisa checkout
- [ ] Admin bisa tambah lapangan

---

## 🎯 First Steps After Installation

### As Admin
```
1. Login dengan: admin/admin
2. Klik "DAFTAR LAPANGAN"
3. Coba tambah lapangan baru
4. Lihat pesanan di menu "PESANAN"
```

### As Customer
```
1. Login dengan: user/user
2. Klik "DAFTAR LAPANGAN"
3. Pilih lapangan → Klik "PESAN"
4. Lihat keranjang di "PESANAN ANDA"
5. Konfirmasi pesanan
6. Pilih metode pembayaran
7. Cetak nota
```

---

## 🔧 Common Issues & Quick Fixes

### Issue 1: "Koneksi Gagal"
```
Fix: Pastikan MySQL running
     Cek username/password di koneksi.php
```

### Issue 2: "Access Denied"
```
Fix: Reset MySQL password
     Update koneksi.php
```

### Issue 3: "404 Not Found"
```
Fix: Pastikan folder di htdocs
     Cek URL: http://localhost/arena-ku (bukan arena-ku/)
```

### Issue 4: "Upload folder error"
```
Fix: chmod 777 upload/
     Atau beri full permission via GUI
```

---

## 📚 Next Steps

### Learn More
- Read full documentation: [README.md](README.md)
- Detailed installation: [INSTALL.md](INSTALL.md)
- API documentation: [API_DOCUMENTATION.md](API_DOCUMENTATION.md)

### Customize
- Change logo: Replace `images/logobaru.png`
- Add fields: Admin → Daftar Lapangan → Tambah
- Modify colors: Edit CSS files

### Contribute
- Read: [CONTRIBUTING.md](CONTRIBUTING.md)
- Fix bugs
- Add features
- Improve documentation

---

## 🆘 Need Help?

### Quick Links
- 📖 Full docs: [DOCUMENTATION_INDEX.md](DOCUMENTATION_INDEX.md)
- 🔧 Troubleshooting: [INSTALL.md](INSTALL.md#troubleshooting)
- 🔒 Security: [SECURITY.md](SECURITY.md)
- 🐛 Report bug: GitHub Issues

---

## ⚡ Speed Tips

### Faster Development
```bash
# Use VS Code with extensions:
- PHP Intelephense
- MySQL
- GitLens

# Enable error reporting
# Add to koneksi.php:
error_reporting(E_ALL);
ini_set('display_errors', 1);
```

### Faster Testing
```bash
# Use browser dev tools
F12 → Console (check errors)
F12 → Network (check requests)

# Test different users
- Open incognito for different session
- Use different browsers
```

---

## 🎓 Learning Path

### Day 1: Setup & Explore
- [ ] Install aplikasi
- [ ] Login sebagai admin dan user
- [ ] Coba semua fitur
- [ ] Baca README.md

### Day 2: Understand Code
- [ ] Baca API_DOCUMENTATION.md
- [ ] Explore database structure
- [ ] Trace code flow
- [ ] Understand session handling

### Day 3: Make Changes
- [ ] Modify CSS
- [ ] Add new field
- [ ] Fix a bug
- [ ] Read CONTRIBUTING.md

### Day 4: Security
- [ ] Read SECURITY.md
- [ ] Understand vulnerabilities
- [ ] Try to implement fixes
- [ ] Test security

### Day 5: Contribute
- [ ] Fork repository
- [ ] Make improvements
- [ ] Submit pull request
- [ ] Help others

---

## 🏆 Achievement Unlocked!

Setelah quick start ini, Anda sudah bisa:
- ✅ Install Arena KU
- ✅ Login dan explore
- ✅ Understand basic flow
- ✅ Ready to customize

**Next Level:** Read full documentation dan mulai berkontribusi!

---

## 📊 Quick Reference

### Default Accounts
| Role | Username | Password |
|------|----------|----------|
| Admin | admin | admin |
| User | user | user |

### Important URLs
| Page | URL |
|------|-----|
| Homepage | http://localhost/arena-ku/ |
| Login | http://localhost/arena-ku/login.php |
| Admin | http://localhost/arena-ku/admin.php |
| Customer | http://localhost/arena-ku/customer.php |
| phpMyAdmin | http://localhost/phpmyadmin |

### Database Info
| Item | Value |
|------|-------|
| Database | dbpemesanan |
| Host | localhost |
| User | root |
| Password | (empty) |

---

## 🎯 Quick Commands

### Git
```bash
git clone <repo-url>
git pull origin main
git checkout -b feature/my-feature
```

### MySQL
```bash
mysql -u root -p
CREATE DATABASE dbpemesanan;
USE dbpemesanan;
SOURCE dbpemesanan.sql;
```

### Apache
```bash
# Linux
sudo systemctl start apache2
sudo systemctl restart apache2

# Check status
sudo systemctl status apache2
```

---

## 💡 Pro Tips

1. **Bookmark phpMyAdmin** untuk akses cepat database
2. **Use browser dev tools** untuk debugging
3. **Enable error reporting** saat development
4. **Backup database** sebelum testing
5. **Read SECURITY.md** sebelum production

---

## 🚀 Ready to Go!

Anda sekarang siap untuk:
- ✅ Develop
- ✅ Test
- ✅ Learn
- ✅ Contribute

**Selamat coding! 🎉**

---

**Estimated Time:** 5-10 minutes  
**Difficulty:** ⭐ Easy  
**Last Updated:** 2025-01-06

---

**Questions?** Check [DOCUMENTATION_INDEX.md](DOCUMENTATION_INDEX.md) for more help!
