# 📦 Panduan Instalasi Arena KU

Dokumen ini berisi panduan lengkap untuk instalasi aplikasi Arena KU di berbagai environment.

---

## 📋 Prasyarat Sistem

### Minimum Requirements
- **PHP:** 8.0 atau lebih tinggi
- **MySQL:** 8.0 atau lebih tinggi
- **Web Server:** Apache 2.4+ atau Nginx
- **RAM:** 512 MB minimum
- **Storage:** 100 MB free space
- **Browser:** Chrome 90+, Firefox 88+, Edge 90+

### Recommended Requirements
- **PHP:** 8.1+
- **MySQL:** 8.0+
- **RAM:** 1 GB atau lebih
- **Storage:** 500 MB free space

---

## 🖥️ Instalasi di Windows (XAMPP)

### 1. Download dan Install XAMPP
1. Download XAMPP dari [https://www.apachefriends.org](https://www.apachefriends.org)
2. Install XAMPP dengan PHP 8.x
3. Jalankan XAMPP Control Panel

### 2. Clone/Download Project
```bash
# Via Git
cd C:\xampp\htdocs
git clone <repository-url> arena-ku

# Atau download ZIP dan extract ke C:\xampp\htdocs\arena-ku
```

### 3. Setup Database
1. Buka browser dan akses `http://localhost/phpmyadmin`
2. Klik "New" untuk membuat database baru
3. Nama database: `dbpemesanan`
4. Collation: `utf8mb4_general_ci`
5. Klik tab "Import"
6. Pilih file `dbpemesanan.sql` dari folder project
7. Klik "Go" untuk import

### 4. Konfigurasi Koneksi Database
Buka file `koneksi.php` dan pastikan konfigurasi sesuai:
```php
<?php 
$host = "localhost";
$user = "root";
$pass = "";  // Kosongkan jika tidak ada password
$db = "dbpemesanan"; 

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi Gagal:".mysqli_connect_error());
}
?>
```

### 5. Jalankan Aplikasi
1. Start Apache dan MySQL di XAMPP Control Panel
2. Buka browser
3. Akses: `http://localhost/arena-ku/`

---

## 🐧 Instalasi di Linux (Ubuntu/Debian)

### 1. Install LAMP Stack
```bash
# Update package list
sudo apt update

# Install Apache
sudo apt install apache2

# Install MySQL
sudo apt install mysql-server

# Install PHP dan extensions
sudo apt install php php-mysql php-mbstring php-xml php-gd

# Restart Apache
sudo systemctl restart apache2
```

### 2. Clone Project
```bash
cd /var/www/html
sudo git clone <repository-url> arena-ku
sudo chown -R www-data:www-data arena-ku
sudo chmod -R 755 arena-ku
```

### 3. Setup Database
```bash
# Login ke MySQL
sudo mysql -u root -p

# Buat database
CREATE DATABASE dbpemesanan CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

# Buat user (optional)
CREATE USER 'arenaku'@'localhost' IDENTIFIED BY 'password123';
GRANT ALL PRIVILEGES ON dbpemesanan.* TO 'arenaku'@'localhost';
FLUSH PRIVILEGES;
EXIT;

# Import database
sudo mysql -u root -p dbpemesanan < /var/www/html/arena-ku/dbpemesanan.sql
```

### 4. Konfigurasi Apache (Optional)
```bash
# Buat virtual host
sudo nano /etc/apache2/sites-available/arena-ku.conf
```

Isi dengan:
```apache
<VirtualHost *:80>
    ServerName arena-ku.local
    DocumentRoot /var/www/html/arena-ku
    
    <Directory /var/www/html/arena-ku>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    
    ErrorLog ${APACHE_LOG_DIR}/arena-ku-error.log
    CustomLog ${APACHE_LOG_DIR}/arena-ku-access.log combined
</VirtualHost>
```

```bash
# Enable site dan rewrite module
sudo a2ensite arena-ku.conf
sudo a2enmod rewrite
sudo systemctl restart apache2

# Edit hosts file
sudo nano /etc/hosts
# Tambahkan: 127.0.0.1 arena-ku.local
```

### 5. Set Permissions
```bash
sudo chown -R www-data:www-data /var/www/html/arena-ku
sudo chmod -R 755 /var/www/html/arena-ku
sudo chmod -R 777 /var/www/html/arena-ku/upload
```

---

## 🍎 Instalasi di macOS (MAMP)

### 1. Install MAMP
1. Download MAMP dari [https://www.mamp.info](https://www.mamp.info)
2. Install MAMP
3. Jalankan MAMP

### 2. Clone Project
```bash
cd /Applications/MAMP/htdocs
git clone <repository-url> arena-ku
```

### 3. Setup Database
1. Buka `http://localhost:8888/phpMyAdmin`
2. Buat database `dbpemesanan`
3. Import file `dbpemesanan.sql`

### 4. Jalankan
1. Start servers di MAMP
2. Akses: `http://localhost:8888/arena-ku/`

---

## 🐳 Instalasi dengan Docker (Advanced)

### 1. Buat docker-compose.yml
```yaml
version: '3.8'

services:
  web:
    image: php:8.1-apache
    ports:
      - "8080:80"
    volumes:
      - ./:/var/www/html
    depends_on:
      - db
    
  db:
    image: mysql:8.0
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: dbpemesanan
    ports:
      - "3306:3306"
    volumes:
      - db_data:/var/lib/mysql

volumes:
  db_data:
```

### 2. Jalankan
```bash
docker-compose up -d
docker exec -i <container_id> mysql -uroot -proot dbpemesanan < dbpemesanan.sql
```

---

## ✅ Verifikasi Instalasi

### 1. Cek Koneksi Database
Buka `http://localhost/arena-ku/koneksi.php`
- Jika berhasil: tidak ada error
- Jika gagal: akan muncul pesan "Koneksi Gagal"

### 2. Test Login
1. Akses halaman utama
2. Klik "Masuk"
3. Login dengan:
   - **Admin:** username: `admin`, password: `admin`
   - **User:** username: `user`, password: `user`

### 3. Test Fitur
- ✅ Registrasi user baru
- ✅ Login/Logout
- ✅ Lihat daftar lapangan
- ✅ Tambah ke keranjang
- ✅ Checkout dan pembayaran
- ✅ Admin: tambah/edit/hapus lapangan

---

## 🔧 Troubleshooting

### Error: "Koneksi Gagal"
**Solusi:**
1. Pastikan MySQL sudah running
2. Cek username dan password di `koneksi.php`
3. Pastikan database `dbpemesanan` sudah dibuat

### Error: "Call to undefined function mysqli_connect()"
**Solusi:**
```bash
# Windows (XAMPP)
- Edit php.ini
- Uncomment: extension=mysqli

# Linux
sudo apt install php-mysql
sudo systemctl restart apache2
```

### Error: "Access Denied"
**Solusi:**
1. Cek password MySQL
2. Reset password MySQL jika perlu
3. Update `koneksi.php` dengan password yang benar

### Upload Folder Permission Error
**Solusi:**
```bash
# Linux/Mac
chmod 777 upload/

# Windows
- Right click folder upload
- Properties > Security
- Give full control to Users
```

### Session Error
**Solusi:**
1. Pastikan `session_start()` ada di setiap halaman
2. Cek permission folder session PHP
3. Clear browser cookies

---

## 📞 Bantuan Lebih Lanjut

Jika mengalami masalah:
1. Cek file `CHANGELOG.md` untuk bug fixes terbaru
2. Baca dokumentasi di `README.md`
3. Hubungi developer

---

**Selamat Menggunakan Arena KU! 🎉**
