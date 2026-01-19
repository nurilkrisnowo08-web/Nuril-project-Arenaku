<?php
include 'koneksi.php';

$id_pemesanan = $_GET['id_pemesanan'] ?? 0;

$pemesanan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id_pemesanan = '$id_pemesanan'"));
if (!$pemesanan) {
  echo "<script>alert('Data pemesanan tidak ditemukan'); window.location='customer.php';</script>";
  exit;
}

$tanggal = $pemesanan['tanggal_pemesanan'] ?? null;
$tanggal_formatted = $tanggal ? date('d M Y', strtotime($tanggal)) : 'Tidak tersedia';
$metode_pembayaran = $pemesanan['metode_pembayaran'] ?? 'Belum dipilih';

$produk = mysqli_query($koneksi, "
  SELECT pp.jumlah, p.nama_menu, p.harga 
  FROM pemesanan_produk pp 
  JOIN produk p ON pp.id_menu = p.id_menu 
  WHERE pp.id_pemesanan = '$id_pemesanan'
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Bukti Booking Lapangan</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Poppins:wght@600&display=swap" rel="stylesheet">
  <style>
    * { box-sizing: border-box; }
    body {
      margin: 0;
      padding: 20px;
      background-color: #ffffff;
      color: #333;
      font-family: 'Inter', sans-serif;
    }
    .nota {
      max-width: 700px;
      margin: auto;
      background: #fff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
      border-top: 5px solid #e74c3c;
    }
    .logo {
      text-align: center;
      margin-bottom: 15px;
    }
    .logo img {
      max-width: 120px;
      height: auto;
    }
    h1 {
      text-align: center;
      margin-bottom: 20px;
      font-size: 26px;
      font-family: 'Poppins', sans-serif;
      color: #e74c3c;
    }
    .header-info {
      display: flex;
      justify-content: space-between;
      font-size: 14px;
      border-bottom: 2px solid #e74c3c;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 14px;
    }
    thead {
      background-color: #fceaea;
    }
    th, td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }
    th {
      color: #c0392b;
    }
    tfoot td {
      font-weight: bold;
      font-size: 16px;
      text-align: right;
      background: #f9f9f9;
    }
    .buttons {
      text-align: center;
      margin-top: 30px;
    }
    .buttons a, .buttons button {
      display: inline-block;
      margin: 10px;
      padding: 12px 24px;
      border-radius: 8px;
      font-weight: bold;
      text-decoration: none;
      border: none;
      font-size: 15px;
      cursor: pointer;
    }
    .btn-back {
      background-color: #3498db;
      color: white;
    }
    .btn-print {
      background-color: #2ecc71;
      color: white;
    }
    @media print {
      .buttons { display: none; }
      body {
        background: white;
        padding: 0;
      }
      .nota {
        box-shadow: none;
        margin: 0;
      }
    }
  </style>
</head>
<body onload="window.print()">
  <div class="nota">
    <div class="logo">
      <img src="images/logobaru.png" alt="Logo ArenaKU">
    </div>
    <h1>BUKTI BOOKING LAPANGAN</h1>

    <div class="header-info">
      <div>
        <strong>ID Pemesanan:</strong><br>
        <?= $id_pemesanan ?><br><br>

        <strong>Metode Pembayaran:</strong><br>
        <?= htmlspecialchars($metode_pembayaran) ?>
      </div>
      <div style="text-align: right;">
        <strong>Tanggal:</strong><br>
        <?= $tanggal_formatted ?>
      </div>
    </div>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Lapangan</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $total = 0;
        while ($row = mysqli_fetch_assoc($produk)) {
          $subtotal = $row['harga'] * $row['jumlah'];
          $total += $subtotal;
        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $row['nama_menu'] ?></td>
          <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
          <td><?= $row['jumlah'] ?></td>
          <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
        </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4">Total</td>
          <td>Rp <?= number_format($total, 0, ',', '.') ?></td>
        </tr>
      </tfoot>
    </table>
  </div>

  <div class="buttons">
    <a href="customer.php" class="btn-back">Kembali ke Menu</a>
    <button onclick="window.print()" class="btn-print">Cetak</button>
  </div>
</body>
</html>
