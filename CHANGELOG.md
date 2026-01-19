# Changelog

All notable changes to Arena KU project will be documented in this file.

## [2.0.0] - 2025-01-06

**Developers:** Ahmad Syauki & Zulfan Lutfiansyah

## [2.0.0] - 2025-01-06

### Added
- ✨ Multiple payment methods (Transfer Bank, E-Wallet, COD, QRIS)
- 📱 Responsive design improvements
- 🎨 Modern UI with glowing effects on navbar
- 🔍 Filter lapangan berdasarkan jenis olahraga
- 📝 Blog section dengan 6 artikel
- 🤝 Fitur "Main Bareng" untuk mencari partner olahraga
- ⚔️ Fitur "Sparring" untuk pertandingan antar tim
- 📄 Sistem cetak nota pemesanan
- 🎯 QRIS payment integration

### Fixed
- 🐛 Fixed copyright year (2020 → 2025)
- 🐛 Fixed broken navigation links in detail_pesanan.php
- 🐛 Fixed navbar brand link consistency
- 🔒 Added mysqli_real_escape_string() for better security
- 🔐 Improved session handling

### Changed
- 🎨 Updated footer design across all pages
- 💄 Enhanced navbar with glow effects
- 🖼️ Improved jumbotron styling
- 📊 Better table layouts with DataTables

### Security
- ⚠️ Note: Password still stored in plain text (needs improvement)
- 🔒 Added input sanitization with mysqli_real_escape_string()

## [1.0.0] - 2020

### Initial Release
- 👤 User registration and login
- 🏟️ Basic field listing
- 🛒 Shopping cart system
- 📋 Order management
- 👨‍💼 Admin dashboard
- 📊 Basic reporting

---

## Upcoming Features (Roadmap)

### Version 2.1.0 (Planned)
- [ ] Password hashing implementation
- [ ] Prepared statements for all queries
- [ ] Upload bukti pembayaran
- [ ] Email notifications

### Version 2.2.0 (Planned)
- [ ] Rating dan review system
- [ ] Calendar-based booking
- [ ] Payment gateway integration
- [ ] Admin analytics dashboard

### Version 3.0.0 (Future)
- [ ] Mobile app (React Native)
- [ ] Real-time notifications
- [ ] Multi-language support
- [ ] Advanced reporting

---

**Legend:**
- ✨ New Feature
- 🐛 Bug Fix
- 🔒 Security
- 💄 UI/UX
- 📝 Documentation
- 🔧 Configuration
