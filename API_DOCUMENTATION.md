# 📚 API & Database Documentation - Arena KU

## 📊 Database Schema

### Tabel: `user`
Menyimpan data pengguna (admin dan customer)

| Field | Type | Null | Key | Default | Extra |
|-------|------|------|-----|---------|-------|
| id_user | int | NO | PRI | NULL | auto_increment |
| username | varchar(25) | NO | | NULL | |
| password | varchar(25) | NO | | NULL | |
| nama_lengkap | varchar(25) | NO | | NULL | |
| jenis_kelamin | varchar(25) | NO | | NULL | |
| tanggal_lahir | date | NO | | NULL | |
| alamat | varchar(25) | NO | | NULL | |
| hp | varchar(25) | NO | | NULL | |
| status | enum('admin','user') | NO | | NULL | |

**Indexes:**
- PRIMARY KEY: `id_user`

---

### Tabel: `produk`
Menyimpan data lapangan olahraga

| Field | Type | Null | Key | Default | Extra |
|-------|------|------|-----|---------|-------|
| id_menu | int | NO | PRI | NULL | auto_increment |
| nama_menu | varchar(50) | NO | | NULL | |
| jenis_menu | varchar(50) | NO | | NULL | |
| harga | int | NO | | NULL | |
| gambar | varchar(100) | NO | | NULL | |

**Jenis Menu:**
- Futsal
- Badminton
- Basket
- Minisoccer

**Indexes:**
- PRIMARY KEY: `id_menu`

---

### Tabel: `pemesanan`
Menyimpan data pemesanan utama

| Field | Type | Null | Key | Default | Extra |
|-------|------|------|-----|---------|-------|
| id_pemesanan | int | NO | PRI | NULL | auto_increment |
| tanggal_pemesanan | date | NO | | NULL | |
| total_belanja | int | NO | | NULL | |
| metode_pembayaran | varchar(50) | YES | | NULL | |

**Metode Pembayaran:**
- Transfer Bank
- E-Wallet
- COD
- QRIS

**Indexes:**
- PRIMARY KEY: `id_pemesanan`

---

### Tabel: `pemesanan_produk`
Menyimpan detail item pemesanan (relasi many-to-many)

| Field | Type | Null | Key | Default | Extra |
|-------|------|------|-----|---------|-------|
| id_pemesanan_produk | int | NO | PRI | NULL | auto_increment |
| id_pemesanan | int | NO | | NULL | |
| id_menu | varchar(50) | NO | | NULL | |
| jumlah | int | NO | | NULL | |

**Indexes:**
- PRIMARY KEY: `id_pemesanan_produk`

**Relations:**
- `id_pemesanan` → `pemesanan.id_pemesanan`
- `id_menu` → `produk.id_menu`

---

### View: `vwuser`
View untuk menampilkan data user dengan masking informasi sensitif

**Columns:**
- id_user
- Username
- Nama_Lengkap (masked: first 3 chars + ***)
- Jenis_Kelamin
- Tanggal Lahir (masked: YYYY-**-**)
- Alamat
- NO HP (masked: *******XXX)
- Status

---

## 🔌 PHP Files & Functions

### Authentication Files

#### `login.php`
**Purpose:** Handle user login

**POST Parameters:**
- `username` (string, required)
- `password` (string, required)

**Process:**
1. Validate username exists
2. Validate password match
3. Create session `$_SESSION['login_user']`
4. Redirect based on status:
   - admin → `admin.php`
   - user → `customer.php`

**Response:**
- Success: Redirect to dashboard
- Error: Alert popup

---

#### `register.php`
**Purpose:** Handle user registration

**POST Parameters:**
- `username` (string, required)
- `password` (string, required)
- `nama_lengkap` (string, required)
- `jenis_kelamin` (enum: Laki-Laki/Perempuan, required)
- `tanggal_lahir` (date, required)
- `alamat` (string, required)
- `hp` (string, required)

**Process:**
1. Insert new user with status='user'
2. Redirect to login page

**Response:**
- Success: Alert + redirect to login
- Error: Display error message

---

#### `logout.php`
**Purpose:** Destroy session and logout

**Process:**
1. `session_start()`
2. `session_destroy()`
3. Redirect to `index.html`

---

### Product/Lapangan Files

#### `lapangan.php`
**Purpose:** Display field list for customers

**GET Parameters:**
- `jenis_menu` (string, optional) - Filter by field type

**Query:**
```sql
SELECT * FROM produk WHERE jenis_menu = '$jenis_menu'
```

**Features:**
- Filter by field type
- Display all fields
- "PESAN" button → `beli.php?id_menu=X`

---

#### `daftar_lapangan.php`
**Purpose:** Admin page to manage fields

**Features:**
- Display all fields
- TAMBAH button → `tambah_menu.php`
- EDIT button → `edit_menu.php?id_menu=X`
- HAPUS button → `hapus_menu.php?id_menu=X`

---

#### `tambah_menu.php`
**Purpose:** Add new field

**POST Parameters:**
- `nama_menu` (string)
- `jenis_menu` (string)
- `harga` (int)
- `gambar` (file upload)

**Process:**
1. Upload image to `/upload/`
2. Insert to `produk` table

---

#### `edit_menu.php`
**Purpose:** Edit existing field

**GET Parameter:**
- `id_menu` (int)

**POST Parameters:**
- Same as tambah_menu.php

**Process:**
1. Load existing data
2. Update with new data
3. Handle image upload if changed

---

#### `hapus_menu.php`
**Purpose:** Delete field

**GET Parameter:**
- `id_menu` (int)

**Query:**
```sql
DELETE FROM produk WHERE id_menu='$id_menu'
```

---

### Order/Pesanan Files

#### `beli.php`
**Purpose:** Add item to cart (session)

**GET Parameter:**
- `id_menu` (int)

**Process:**
```php
if (isset($_SESSION['pesanan'][$id_menu])) {
    $_SESSION['pesanan'][$id_menu] += 1;
} else {
    $_SESSION['pesanan'][$id_menu] = 1;
}
```

**Response:**
- Alert: "Lapangan telah masuk ke pesanan anda"
- Redirect to `pesanan_pembeli.php`

---

#### `pesanan_pembeli.php`
**Purpose:** Display customer's cart

**Session Data:**
- `$_SESSION['pesanan']` - Array of [id_menu => quantity]

**Features:**
- Display cart items
- Calculate total
- "Tambah Jadwal" button
- "Konfirmasi Pesanan" button

**POST Action (konfirm):**
1. Insert to `pemesanan` table
2. Get last insert ID
3. Insert each item to `pemesanan_produk`
4. Clear session cart
5. Redirect to `pembayaran.php?id=X`

---

#### `hapus_pesanan.php`
**Purpose:** Remove item from cart

**GET Parameter:**
- `id_menu` (int)

**Process:**
```php
unset($_SESSION["pesanan"][$id_menu]);
```

---

#### `pembayaran.php`
**Purpose:** Select payment method

**GET Parameter:**
- `id_pemesanan` or `id` (int)

**POST Parameters:**
- `id_pemesanan` (int)
- `metode_pembayaran` (string)

**Query:**
```sql
UPDATE pemesanan 
SET metode_pembayaran = '$metode' 
WHERE id_pemesanan = '$id_pemesanan'
```

**Response:**
- Success: Redirect to `notacetak.php?id_pemesanan=X`
- Error: Alert + history.back()

---

#### `notacetak.php`
**Purpose:** Print booking receipt

**GET Parameter:**
- `id_pemesanan` (int)

**Query:**
```sql
SELECT * FROM pemesanan WHERE id_pemesanan = '$id_pemesanan'

SELECT pp.jumlah, p.nama_menu, p.harga 
FROM pemesanan_produk pp 
JOIN produk p ON pp.id_menu = p.id_menu 
WHERE pp.id_pemesanan = '$id_pemesanan'
```

**Features:**
- Display booking details
- Auto print on load
- Print button
- Back to menu button

---

#### `pesanan.php` (Admin)
**Purpose:** Admin view all orders

**Query:**
```sql
SELECT * FROM pemesanan
```

**Features:**
- Display all orders
- Detail button → `detail_pesanan.php?id=X`
- Hapus button → `clear_pesanan.php?id=X`
- DataTables integration

---

#### `detail_pesanan.php`
**Purpose:** Admin view order details

**GET Parameter:**
- `id` (int) - id_pemesanan

**Query:**
```sql
SELECT * FROM pemesanan_produk 
JOIN produk ON pemesanan_produk.id_menu = produk.id_menu 
WHERE pemesanan_produk.id_pemesanan = '$_GET[id]'
```

**Features:**
- Display order items
- Calculate total
- "Konfirmasi Pembayaran" button

---

#### `clear_pesanan.php`
**Purpose:** Delete order (admin)

**GET Parameter:**
- `id` (int) - id_pemesanan

**Query:**
```sql
DELETE FROM pemesanan WHERE id_pemesanan='$id'
```

**Note:** Should also delete from `pemesanan_produk` (cascade)

---

## 🔒 Security Considerations

### Current Issues
1. ⚠️ **Plain text passwords** - No hashing
2. ⚠️ **SQL Injection risk** - No prepared statements
3. ⚠️ **XSS vulnerability** - Limited input sanitization
4. ⚠️ **CSRF** - No token protection
5. ⚠️ **File upload** - Limited validation

### Recommended Improvements

#### 1. Password Hashing
```php
// Register
$hashed = password_hash($password, PASSWORD_DEFAULT);

// Login
if (password_verify($password, $hashed)) {
    // Success
}
```

#### 2. Prepared Statements
```php
$stmt = $koneksi->prepare("SELECT * FROM user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
```

#### 3. Input Validation
```php
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
```

#### 4. CSRF Protection
```php
// Generate token
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

// Validate
if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    die('CSRF token mismatch');
}
```

---

## 📝 Session Variables

### User Session
```php
$_SESSION['login_user'] = $username;
```

### Cart Session
```php
$_SESSION['pesanan'] = [
    'id_menu_1' => quantity,
    'id_menu_2' => quantity,
    // ...
];
```

---

## 🔄 Data Flow

### Customer Booking Flow
```
1. Login → customer.php
2. Browse → lapangan.php
3. Select → beli.php (add to cart)
4. View Cart → pesanan_pembeli.php
5. Confirm → pembayaran.php
6. Pay → notacetak.php (receipt)
```

### Admin Management Flow
```
1. Login → admin.php
2. Manage Fields → daftar_lapangan.php
3. Add/Edit/Delete → tambah_menu.php / edit_menu.php / hapus_menu.php
4. View Orders → pesanan.php
5. Order Details → detail_pesanan.php
6. Delete Order → clear_pesanan.php
```

---

## 🧪 Testing Endpoints

### Test User Registration
```
POST /register.php
{
    username: "testuser",
    password: "test123",
    nama_lengkap: "Test User",
    jenis_kelamin: "Laki-Laki",
    tanggal_lahir: "2000-01-01",
    alamat: "Test Address",
    hp: "08123456789"
}
```

### Test Login
```
POST /login.php
{
    username: "admin",
    password: "admin"
}
```

### Test Add to Cart
```
GET /beli.php?id_menu=7
```

### Test Filter Fields
```
GET /lapangan.php?jenis_menu=Futsal
```

---

**Last Updated:** 2025-01-06
**Version:** 2.0.0
