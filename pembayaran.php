<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_pemesanan = $_POST['id_pemesanan'];
  $metode = $_POST['metode_pembayaran'];

  $query = "UPDATE pemesanan SET metode_pembayaran = '$metode' WHERE id_pemesanan = '$id_pemesanan'";
  $update = mysqli_query($koneksi, $query);

  if ($update) {
    header("Location: notacetak.php?id_pemesanan=$id_pemesanan");
    exit;
  } else {
    echo "<script>alert('Gagal menyimpan metode pembayaran');history.back();</script>";
    exit;
  }
}

$id_pemesanan = $_GET['id_pemesanan'] ?? $_GET['id'] ?? 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pilih Metode Pembayaran</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Poppins:wght@600&display=swap" rel="stylesheet">
  <style>
    * { box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(to bottom right, #ff0000, #ffffff);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
    }
    .container {
      background: #fff;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      max-width: 500px;
      width: 100%;
      margin-top: 40px;
    }
    h2 {
      text-align: center;
      color: #d80000;
      margin-bottom: 30px;
    }
    .payment-option {
      border: 2px solid #eee;
      padding: 15px;
      border-radius: 12px;
      margin-bottom: 15px;
      cursor: pointer;
      display: flex;
      align-items: center;
      transition: 0.3s;
    }
    .payment-option:hover {
      border-color: #d80000;
      background: #fff3f3;
    }
    .payment-option input[type="radio"] {
      margin-right: 12px;
      transform: scale(1.3);
    }
    .payment-option i {
      color: #d80000;
      margin-right: 10px;
    }
    .payment-info {
      background: #fdf2f2;
      border: 2px dashed #d80000;
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 20px;
      display: none;
    }
    .payment-info p {
      margin: 5px 0;
      font-weight: 500;
      color: #444;
    }
    .payment-info img {
      max-width: 80%;
      margin-top: 10px;
    }
    button {
      width: 100%;
      padding: 12px;
      background: #d80000;
      color: #fff;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 10px;
      cursor: pointer;
    }
    button:hover {
      background: #a00000;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Metode Pembayaran</h2>
  <form method="POST">
    <input type="hidden" name="id_pemesanan" value="<?= htmlspecialchars($id_pemesanan) ?>">

    <label class="payment-option">
      <input type="radio" name="metode_pembayaran" value="Transfer Bank" required onclick="showInfo('bank')">
      <i class="fas fa-university"></i> Transfer Bank (BCA, BRI, Mandiri)
    </label>

    <div class="payment-info" id="info-bank">
      <p><strong>BCA:</strong> 1234567890 a.n PT ArenaKU</p>
      <p><strong>BRI:</strong> 0987654321 a.n PT ArenaKU</p>
      <p><strong>Mandiri:</strong> 1122334455 a.n PT ArenaKU</p>
    </div>

    <label class="payment-option">
      <input type="radio" name="metode_pembayaran" value="E-Wallet" required onclick="showInfo('ewallet')">
      <i class="fas fa-wallet"></i> E-Wallet (DANA, OVO, GoPay)
    </label>

    <div class="payment-info" id="info-ewallet">
      <p><strong>DANA:</strong> 085712345678 a.n ArenaKU</p>
      <p><strong>OVO:</strong> 085798765432 a.n ArenaKU</p>
      <p><strong>GoPay:</strong> 081234567890 a.n ArenaKU</p>
    </div>

    <label class="payment-option">
      <input type="radio" name="metode_pembayaran" value="COD" required onclick="showInfo('none')">
      <i class="fas fa-money-bill-wave"></i> Bayar di Tempat (COD)
    </label>

    <label class="payment-option">
      <input type="radio" name="metode_pembayaran" value="QRIS" required onclick="showInfo('qris')">
      <i class="fas fa-qrcode"></i> Pembayaran via QRIS
    </label>

    <div class="payment-info" id="info-qris">
      <p>Scan kode QR di bawah ini menggunakan aplikasi DANA / OVO / GoPay:</p>
      <img src="images/qris1.png" alt="QRIS">
    </div>

    <button type="submit">Lanjutkan</button>
  </form>
</div>

<script>
  function showInfo(type) {
    // Sembunyikan semua info dulu
    document.getElementById('info-bank').style.display = 'none';
    document.getElementById('info-ewallet').style.display = 'none';
    document.getElementById('info-qris').style.display = 'none';

    // Tampilkan sesuai yang dipilih
    if (type === 'bank') {
      document.getElementById('info-bank').style.display = 'block';
    } else if (type === 'ewallet') {
      document.getElementById('info-ewallet').style.display = 'block';
    } else if (type === 'qris') {
      document.getElementById('info-qris').style.display = 'block';
    }
  }
</script>

</body>
</html>