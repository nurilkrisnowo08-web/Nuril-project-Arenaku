# 🤝 Contributing to Arena KU

Terima kasih atas minat Anda untuk berkontribusi pada Arena KU! Dokumen ini berisi panduan untuk berkontribusi pada proyek ini.

---

## 📋 Table of Contents

1. [Code of Conduct](#code-of-conduct)
2. [Getting Started](#getting-started)
3. [How to Contribute](#how-to-contribute)
4. [Coding Standards](#coding-standards)
5. [Commit Guidelines](#commit-guidelines)
6. [Pull Request Process](#pull-request-process)
7. [Bug Reports](#bug-reports)
8. [Feature Requests](#feature-requests)

---

## 📜 Code of Conduct

### Our Pledge

Kami berkomitmen untuk menjadikan partisipasi dalam proyek ini sebagai pengalaman yang bebas dari pelecehan untuk semua orang, terlepas dari:
- Usia
- Ukuran tubuh
- Disabilitas
- Etnis
- Identitas dan ekspresi gender
- Tingkat pengalaman
- Kebangsaan
- Penampilan pribadi
- Ras
- Agama
- Identitas dan orientasi seksual

### Our Standards

**Perilaku yang Diharapkan:**
- ✅ Menggunakan bahasa yang ramah dan inklusif
- ✅ Menghormati sudut pandang dan pengalaman yang berbeda
- ✅ Menerima kritik konstruktif dengan baik
- ✅ Fokus pada apa yang terbaik untuk komunitas
- ✅ Menunjukkan empati terhadap anggota komunitas lainnya

**Perilaku yang Tidak Dapat Diterima:**
- ❌ Penggunaan bahasa atau gambar seksual
- ❌ Trolling, komentar menghina/merendahkan
- ❌ Pelecehan publik atau pribadi
- ❌ Mempublikasikan informasi pribadi orang lain
- ❌ Perilaku tidak profesional lainnya

---

## 🚀 Getting Started

### Prerequisites

Pastikan Anda sudah menginstall:
- Git
- PHP 8.0+
- MySQL 8.0+
- Composer (optional)
- Text editor (VS Code, Sublime, dll)

### Setup Development Environment

1. **Fork Repository**
   ```bash
   # Fork via GitHub UI, kemudian clone
   git clone https://github.com/YOUR_USERNAME/arena-ku.git
   cd arena-ku
   ```

2. **Setup Database**
   ```bash
   # Import database
   mysql -u root -p
   CREATE DATABASE dbpemesanan;
   USE dbpemesanan;
   SOURCE dbpemesanan.sql;
   ```

3. **Configure**
   ```bash
   # Edit koneksi.php sesuai environment Anda
   ```

4. **Create Branch**
   ```bash
   git checkout -b feature/your-feature-name
   ```

---

## 🛠️ How to Contribute

### Types of Contributions

1. **Bug Fixes** 🐛
   - Fix existing bugs
   - Improve error handling
   - Security patches

2. **New Features** ✨
   - Add new functionality
   - Improve existing features
   - UI/UX improvements

3. **Documentation** 📚
   - Improve README
   - Add code comments
   - Write tutorials

4. **Testing** 🧪
   - Write unit tests
   - Manual testing
   - Report bugs

5. **Code Review** 👀
   - Review pull requests
   - Suggest improvements
   - Test changes

---

## 📝 Coding Standards

### PHP Coding Style

#### 1. Naming Conventions

```php
// Variables: snake_case
$user_name = "John";
$total_price = 1000;

// Functions: camelCase
function getUserData() { }
function calculateTotal() { }

// Classes: PascalCase
class UserController { }
class OrderManager { }

// Constants: UPPER_CASE
define('MAX_UPLOAD_SIZE', 5242880);
const DB_HOST = 'localhost';
```

#### 2. Indentation & Spacing

```php
// Use 4 spaces for indentation (not tabs)
function example() {
    if ($condition) {
        // code here
    }
}

// Space after control structures
if ($x == $y) {
    // code
}

// No space before semicolon
$x = 5;  // ✅ Good
$x = 5 ; // ❌ Bad
```

#### 3. Braces

```php
// Opening brace on same line
if ($condition) {
    // code
}

// Functions: opening brace on new line
function myFunction() 
{
    // code
}
```

#### 4. Comments

```php
// Single line comment for brief explanations
$total = $price * $quantity;

/**
 * Multi-line comment for functions
 * 
 * @param string $username User's username
 * @param string $password User's password
 * @return bool True if login successful
 */
function login($username, $password) {
    // Implementation
}
```

#### 5. Security Best Practices

```php
// ✅ GOOD: Use prepared statements
$stmt = $koneksi->prepare("SELECT * FROM user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();

// ❌ BAD: Direct concatenation
$query = "SELECT * FROM user WHERE username = '$username'";

// ✅ GOOD: Escape output
echo htmlspecialchars($user_input, ENT_QUOTES, 'UTF-8');

// ❌ BAD: Direct output
echo $user_input;

// ✅ GOOD: Hash passwords
$hashed = password_hash($password, PASSWORD_DEFAULT);

// ❌ BAD: Plain text passwords
$password = $_POST['password'];
```

### HTML/CSS Standards

```html
<!-- Use semantic HTML -->
<header>
  <nav>
    <ul>
      <li><a href="#">Home</a></li>
    </ul>
  </nav>
</header>

<!-- Proper indentation -->
<div class="container">
  <div class="row">
    <div class="col-md-6">
      Content
    </div>
  </div>
</div>
```

```css
/* CSS: Use meaningful class names */
.navbar-custom { }
.btn-primary { }

/* Group related properties */
.element {
  /* Positioning */
  position: relative;
  top: 0;
  
  /* Display & Box Model */
  display: flex;
  width: 100%;
  padding: 10px;
  
  /* Typography */
  font-size: 16px;
  color: #333;
  
  /* Visual */
  background: #fff;
  border: 1px solid #ddd;
}
```

### SQL Standards

```sql
-- Use uppercase for SQL keywords
SELECT * FROM user WHERE status = 'active';

-- Proper indentation for complex queries
SELECT 
    u.username,
    u.nama_lengkap,
    COUNT(p.id_pemesanan) as total_orders
FROM user u
LEFT JOIN pemesanan p ON u.id_user = p.id_user
WHERE u.status = 'user'
GROUP BY u.id_user
ORDER BY total_orders DESC;
```

---

## 📝 Commit Guidelines

### Commit Message Format

```
<type>(<scope>): <subject>

<body>

<footer>
```

### Types

- `feat`: New feature
- `fix`: Bug fix
- `docs`: Documentation changes
- `style`: Code style changes (formatting, etc)
- `refactor`: Code refactoring
- `test`: Adding tests
- `chore`: Maintenance tasks

### Examples

```bash
# Good commit messages
git commit -m "feat(auth): add password hashing"
git commit -m "fix(payment): resolve QRIS display issue"
git commit -m "docs(readme): update installation guide"
git commit -m "style(navbar): improve responsive design"

# Bad commit messages
git commit -m "update"
git commit -m "fix bug"
git commit -m "changes"
```

### Detailed Example

```
feat(booking): add calendar-based booking system

- Implement date picker for booking
- Add availability checking
- Update database schema
- Add validation for past dates

Closes #123
```

---

## 🔄 Pull Request Process

### Before Submitting

1. **Update your fork**
   ```bash
   git remote add upstream https://github.com/ORIGINAL_OWNER/arena-ku.git
   git fetch upstream
   git merge upstream/main
   ```

2. **Test your changes**
   - Manual testing
   - Check for errors
   - Test on different browsers

3. **Update documentation**
   - Update README if needed
   - Add comments to code
   - Update CHANGELOG.md

### Submitting PR

1. **Push to your fork**
   ```bash
   git push origin feature/your-feature-name
   ```

2. **Create Pull Request**
   - Go to GitHub
   - Click "New Pull Request"
   - Fill in the template

3. **PR Template**
   ```markdown
   ## Description
   Brief description of changes
   
   ## Type of Change
   - [ ] Bug fix
   - [ ] New feature
   - [ ] Documentation update
   - [ ] Code refactoring
   
   ## Testing
   - [ ] Tested locally
   - [ ] Tested on multiple browsers
   - [ ] No console errors
   
   ## Screenshots (if applicable)
   Add screenshots here
   
   ## Related Issues
   Closes #123
   ```

### Review Process

1. Maintainer akan review PR Anda
2. Mungkin ada request untuk perubahan
3. Lakukan perubahan yang diminta
4. Setelah approved, PR akan di-merge

---

## 🐛 Bug Reports

### Before Reporting

1. Check existing issues
2. Try to reproduce the bug
3. Gather information

### Bug Report Template

```markdown
**Describe the bug**
A clear description of what the bug is.

**To Reproduce**
Steps to reproduce:
1. Go to '...'
2. Click on '...'
3. Scroll down to '...'
4. See error

**Expected behavior**
What you expected to happen.

**Screenshots**
If applicable, add screenshots.

**Environment:**
- OS: [e.g. Windows 10]
- Browser: [e.g. Chrome 90]
- PHP Version: [e.g. 8.1]
- MySQL Version: [e.g. 8.0]

**Additional context**
Any other context about the problem.
```

---

## ✨ Feature Requests

### Feature Request Template

```markdown
**Is your feature request related to a problem?**
A clear description of the problem.

**Describe the solution you'd like**
What you want to happen.

**Describe alternatives you've considered**
Other solutions you've thought about.

**Additional context**
Any other context or screenshots.

**Would you like to implement this feature?**
- [ ] Yes, I can work on this
- [ ] No, just suggesting
```

---

## 🏆 Recognition

Contributors akan diakui di:
- README.md (Contributors section)
- CHANGELOG.md
- Release notes

---

## 📞 Questions?

Jika ada pertanyaan:
- Open an issue dengan label "question"
- Email: dev@arenaku.com
- Discord: [Link jika ada]

---

## 📄 License

Dengan berkontribusi, Anda setuju bahwa kontribusi Anda akan dilisensikan di bawah lisensi yang sama dengan proyek ini.

---

**Terima kasih telah berkontribusi! 🎉**
