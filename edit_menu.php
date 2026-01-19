<?php 
include('koneksi.php');

if (isset($_POST['edit'])) {
    $id_menu = $_POST['id_menu'];
    $nama_menu = $_POST['nama_menu'];
    $jenis_menu = $_POST['jenis_menu'];
    $harga = $_POST['harga'];

    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        $lokasi = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($lokasi, "images/" . $gambar);
        mysqli_query($koneksi, "UPDATE produk SET nama_menu='$nama_menu', jenis_menu='$jenis_menu', harga='$harga', gambar='$gambar' WHERE id_menu='$id_menu'");
    } else {
        mysqli_query($koneksi, "UPDATE produk SET nama_menu='$nama_menu', jenis_menu='$jenis_menu', harga='$harga' WHERE id_menu='$id_menu'");
    }

    echo "<script>alert('Data berhasil diubah'); window.location='daftar_lapangan.php';</script>";
    exit;
}

$id_menu = $_GET['id_menu'];
$ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_menu='$id_menu'");
$result = mysqli_fetch_assoc($ambil);
?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Menu Lapangan - Arena KU</title>

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
  </style>
</head>
<body>

<div class="form-card">
  <h3>Edit Menu Lapangan</h3>

  <form method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_menu" value="<?= $result['id_menu'] ?>">

    <div class="form-group">
      <label>Nama Lapangan</label>
      <input type="text" class="form-control" name="nama_menu" value="<?= $result['nama_menu'] ?>" required>
    </div>

    <div class="form-group">
      <label>Jenis Lapangan</label>
      <select class="form-control" name="jenis_menu" required>
        <option value="">-- Pilih Jenis Lapangan --</option>
        <option value="Futsal" <?= $result['jenis_menu'] == 'Futsal' ? 'selected' : '' ?>>Futsal</option>
        <option value="Mini Soccer" <?= $result['jenis_menu'] == 'Mini Soccer' ? 'selected' : '' ?>>Mini Soccer</option>
        <option value="Basket" <?= $result['jenis_menu'] == 'Basket' ? 'selected' : '' ?>>Basket</option>
        <option value="Badminton" <?= $result['jenis_menu'] == 'Badminton' ? 'selected' : '' ?>>Badminton</option>
        <option value="Volly" <?= $result['jenis_menu'] == 'Volly' ? 'selected' : '' ?>>Volly</option>
      </select>
    </div>

    <div class="form-group">
      <label>Harga</label>
      <input type="number" class="form-control" name="harga" value="<?= $result['harga'] ?>" required>
    </div>

    <div class="form-group">
      <label>Gambar Baru (Opsional)</label>
      <input type="file" class="form-control-file" name="gambar">
    </div>

    <button type="submit" class="btn btn-primary" name="edit">Simpan Perubahan</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
