<?php 
include 'koneksi.php'; 
?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Menu Lapangan - Arena KU</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/css/bootstrap.min.css">

  <style>
    body {
      background: linear-gradient(135deg, #fff, #f8f8f8);
      min-height: 100vh;
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .form-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 16px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.1);
      padding: 40px;
      width: 100%;
      max-width: 450px;
      animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
      from { transform: translateY(-20px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    .form-card h3 {
      color: #C3002F;
      font-weight: 700;
      margin-bottom: 30px;
      text-align: center;
    }

    label {
      font-weight: 600;
      color: #333;
    }

    .form-control, .form-control-file, select {
      border-radius: 8px;
      padding: 12px;
      border: 1px solid #ddd;
      transition: all 0.3s ease;
    }

    .form-control:focus, select:focus {
      border-color: #C3002F;
      box-shadow: 0 0 8px rgba(195, 0, 47, 0.3);
      outline: none;
    }

    .btn-primary {
      background-color: #C3002F;
      border: none;
      border-radius: 8px;
      padding: 12px;
      width: 100%;
      font-weight: 600;
      transition: background 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #a50027;
    }

    .btn-secondary {
      background-color: #eee;
      border: none;
      border-radius: 8px;
      padding: 12px;
      width: 100%;
      font-weight: 600;
      color: #333;
      margin-top: 10px;
      transition: background 0.3s ease;
    }

    .btn-secondary:hover {
      background-color: #ddd;
    }

    .alert {
      margin-top: 20px;
    }
  </style>
</head>
<body>

<div class="form-card">
  <h3>Tambah Menu Lapangan</h3>

  <form method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label>Nama Lapangan</label>
      <input type="text" class="form-control" name="nama_menu" required placeholder="Contoh: Arena Futsal 1">
    </div>

    <div class="form-group">
      <label>Jenis Lapangan</label>
      <select class="form-control" name="jenis_menu" required>
        <option value="">-- Pilih Jenis --</option>
        <option value="Futsal">Futsal</option>
        <option value="Mini Soccer">Mini Soccer</option>
        <option value="Basket">Basket</option>
        <option value="Badminton">Badminton</option>
        <option value="Volly">Volly</option>
      </select>
    </div>

    <div class="form-group">
      <label>Harga Sewa (Rp)</label>
      <input type="number" class="form-control" name="harga" required placeholder="Contoh: 150000">
    </div>

    <div class="form-group">
      <label>Gambar Lapangan</label>
      <input type="file" class="form-control-file" name="gambar" required>
    </div>

    <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
  </form>

  <?php 
  if (isset($_POST['tambah'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_menu']);
    $jenis = mysqli_real_escape_string($koneksi, $_POST['jenis_menu']);
    $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $folder = './upload/';

    if (move_uploaded_file($tmp, $folder.$gambar)) {
      $insert = mysqli_query($koneksi, "INSERT INTO produk (nama_menu, jenis_menu, harga, gambar) VALUES ('$nama', '$jenis', '$harga', '$gambar')");

      if ($insert) {
        echo "<div class='alert alert-success'>Data berhasil ditambahkan!</div>";
        echo "<meta http-equiv='refresh' content='1;url=daftar_lapangan.php'>";
      } else {
        echo "<div class='alert alert-danger'>Gagal menambahkan ke database!</div>";
      }
    } else {
      echo "<div class='alert alert-danger'>Gagal mengupload gambar!</div>";
    }
  }
  ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
