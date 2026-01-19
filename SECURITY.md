# 🔒 Security Policy - Arena KU

## 🚨 Current Security Status

**Security Level:** ⚠️ **DEVELOPMENT ONLY**

This application is currently **NOT PRODUCTION READY** due to several security vulnerabilities. Please read this document carefully before deploying.

---

## ⚠️ Known Vulnerabilities

### 1. Password Storage (CRITICAL)
**Status:** 🔴 **VULNERABLE**

**Issue:**
- Passwords stored in plain text
- No encryption or hashing

**Current Code:**
```php
// register.php
$password = $_POST['password']; // Plain text!
INSERT INTO user (..., password) VALUES (..., '$password')
```

**Risk:**
- Database breach exposes all passwords
- Admin can see user passwords
- Password reuse attacks

**Fix Required:**
```php
// Use password_hash()
$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Verify with password_verify()
if (password_verify($input_password, $stored_hash)) {
    // Login success
}
```

---

### 2. SQL Injection (CRITICAL)
**Status:** 🔴 **VULNERABLE**

**Issue:**
- Direct string concatenation in SQL queries
- No prepared statements
- Limited use of `mysqli_real_escape_string()`

**Vulnerable Code Examples:**
```php
// login.php
$cek_username = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$user'");

// clear_pesanan.php
$hapus = mysqli_query($koneksi, "DELETE FROM pemesanan WHERE id_pemesanan='$id'");

// lapangan.php
$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE jenis_menu = '$jenis_menu'");
```

**Attack Example:**
```
username: admin' OR '1'='1
password: anything
```

**Fix Required:**
```php
// Use prepared statements
$stmt = $koneksi->prepare("SELECT * FROM user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
```

---

### 3. Cross-Site Scripting (XSS) (HIGH)
**Status:** 🟠 **PARTIALLY VULNERABLE**

**Issue:**
- Limited output escaping
- User input displayed without sanitization

**Vulnerable Areas:**
```php
// Displaying user data without escaping
echo $result['nama_menu'];
echo $pecah['nama_menu'];
```

**Attack Example:**
```
nama_menu: <script>alert('XSS')</script>
```

**Fix Required:**
```php
// Always escape output
echo htmlspecialchars($result['nama_menu'], ENT_QUOTES, 'UTF-8');

// Or use
echo htmlentities($data, ENT_QUOTES, 'UTF-8');
```

---

### 4. Session Security (MEDIUM)
**Status:** 🟡 **NEEDS IMPROVEMENT**

**Issues:**
- No session regeneration after login
- No session timeout
- No secure/httponly flags
- Session fixation possible

**Current Code:**
```php
session_start();
$_SESSION['login_user'] = $login_user;
```

**Fix Required:**
```php
// After successful login
session_regenerate_id(true);
$_SESSION['login_user'] = $login_user;
$_SESSION['last_activity'] = time();

// Set secure session parameters
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1); // HTTPS only
ini_set('session.use_strict_mode', 1);

// Check timeout
if (time() - $_SESSION['last_activity'] > 1800) {
    session_destroy();
    header('location: login.php');
}
$_SESSION['last_activity'] = time();
```

---

### 5. CSRF Protection (HIGH)
**Status:** 🔴 **NOT IMPLEMENTED**

**Issue:**
- No CSRF tokens in forms
- State-changing operations vulnerable

**Vulnerable Forms:**
- Login form
- Registration form
- Add/Edit/Delete lapangan
- Checkout form

**Fix Required:**
```php
// Generate token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// In form
<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

// Validate
if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    die('CSRF token validation failed');
}
```

---

### 6. File Upload Security (HIGH)
**Status:** 🟠 **BASIC VALIDATION ONLY**

**Issues:**
- Limited file type validation
- No file size limit
- Uploaded files directly accessible
- No virus scanning

**Current Code:**
```php
// tambah_menu.php (assumed)
move_uploaded_file($_FILES['gambar']['tmp_name'], 'upload/' . $_FILES['gambar']['name']);
```

**Risks:**
- PHP shell upload
- Malware distribution
- Directory traversal

**Fix Required:**
```php
// Validate file type
$allowed = ['jpg', 'jpeg', 'png', 'gif'];
$ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));

if (!in_array($ext, $allowed)) {
    die('Invalid file type');
}

// Validate file size (5MB max)
if ($_FILES['gambar']['size'] > 5 * 1024 * 1024) {
    die('File too large');
}

// Generate random filename
$new_name = bin2hex(random_bytes(16)) . '.' . $ext;

// Validate image
if (!getimagesize($_FILES['gambar']['tmp_name'])) {
    die('Not a valid image');
}

// Move with new name
move_uploaded_file($_FILES['gambar']['tmp_name'], 'upload/' . $new_name);
```

---

### 7. Access Control (MEDIUM)
**Status:** 🟡 **BASIC IMPLEMENTATION**

**Issues:**
- Session check only
- No role-based access control (RBAC)
- Direct URL access possible

**Current Code:**
```php
if(!isset($_SESSION['login_user'])) {
    header("location: login.php");
}
```

**Problems:**
- User can access admin pages if they know URL
- No distinction between admin/user permissions

**Fix Required:**
```php
// Check role
function checkAdmin() {
    if (!isset($_SESSION['login_user']) || $_SESSION['status'] != 'admin') {
        header('location: login.php');
        exit;
    }
}

// In admin pages
checkAdmin();
```

---

### 8. Information Disclosure (LOW)
**Status:** 🟡 **MINOR ISSUES**

**Issues:**
- Error messages reveal system info
- Database connection errors exposed

**Current Code:**
```php
if (!$koneksi) {
    die("Koneksi Gagal:".mysqli_connect_error());
}
```

**Fix Required:**
```php
if (!$koneksi) {
    error_log("Database connection failed: " . mysqli_connect_error());
    die("System error. Please contact administrator.");
}

// In production
ini_set('display_errors', 0);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', '/path/to/error.log');
```

---

## 🛡️ Security Checklist

### Before Production Deployment

- [ ] Implement password hashing (password_hash/password_verify)
- [ ] Convert all queries to prepared statements
- [ ] Add XSS protection (htmlspecialchars on all output)
- [ ] Implement CSRF tokens
- [ ] Secure session configuration
- [ ] File upload validation
- [ ] Role-based access control
- [ ] Input validation and sanitization
- [ ] Error handling (hide sensitive info)
- [ ] HTTPS enforcement
- [ ] Security headers
- [ ] Rate limiting
- [ ] Logging and monitoring
- [ ] Regular security updates
- [ ] Database backup strategy

---

## 🔐 Recommended Security Headers

Add to `.htaccess` or PHP:

```apache
# .htaccess
Header set X-Content-Type-Options "nosniff"
Header set X-Frame-Options "SAMEORIGIN"
Header set X-XSS-Protection "1; mode=block"
Header set Referrer-Policy "strict-origin-when-cross-origin"
Header set Content-Security-Policy "default-src 'self'"
```

```php
// PHP
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: SAMEORIGIN");
header("X-XSS-Protection: 1; mode=block");
header("Referrer-Policy: strict-origin-when-cross-origin");
```

---

## 🚀 Quick Security Improvements

### Priority 1 (Critical - Do First)
1. Hash all passwords
2. Use prepared statements
3. Add CSRF protection
4. Implement proper access control

### Priority 2 (High - Do Soon)
1. XSS protection on all outputs
2. Secure file uploads
3. Session security improvements
4. Input validation

### Priority 3 (Medium - Do Later)
1. Rate limiting
2. Security logging
3. Error handling improvements
4. Security headers

---

## 📞 Reporting Security Issues

If you discover a security vulnerability:

1. **DO NOT** open a public issue
2. Email: security@arenaku.com (if available)
3. Include:
   - Description of vulnerability
   - Steps to reproduce
   - Potential impact
   - Suggested fix (if any)

---

## 📚 Security Resources

### Learning Resources
- [OWASP Top 10](https://owasp.org/www-project-top-ten/)
- [PHP Security Guide](https://www.php.net/manual/en/security.php)
- [MySQL Security](https://dev.mysql.com/doc/refman/8.0/en/security.html)

### Tools
- [SQLMap](http://sqlmap.org/) - SQL injection testing
- [OWASP ZAP](https://www.zaproxy.org/) - Security scanner
- [Burp Suite](https://portswigger.net/burp) - Web security testing

---

## ⚖️ Disclaimer

This application is provided "as is" for educational purposes. The developers are not responsible for any security breaches or data loss resulting from the use of this application in production without proper security hardening.

**DO NOT USE IN PRODUCTION WITHOUT IMPLEMENTING ALL SECURITY FIXES!**

---

**Last Updated:** 2025-01-06  
**Security Review:** Pending  
**Next Review:** TBD
