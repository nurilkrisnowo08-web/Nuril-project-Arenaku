<?php 
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit;
} 
include('koneksi.php');
?>

<!doctype html> 
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arena Ku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <style>
        .bg-black-glow {
            background-color: #000 !important;
            box-shadow: 0 0 15px rgba(243, 156, 18, 0.3);
        }
        .glowing-text {
            text-shadow: 0 0 10px #f39c12, 0 0 20px #f39c12;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .custom-link {
            position: relative;
            margin-right: 1rem;
            color: #fff !important;
            transition: all 0.3s ease;
            font-weight: 500;
            letter-spacing: 0.5px;
        }
        .custom-link::after {
            content: "";
            position: absolute;
            width: 0%;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #f39c12;
            transition: width 0.3s ease-in-out;
            border-radius: 2px;
        }
        .custom-link:hover {
            color: #f39c12 !important;
            text-shadow: 0 0 5px #f39c12;
        }
        .custom-link:hover::after {
            width: 100%;
        }
    </style>
</head>
<body>

<!-- Jumbotron -->
<div class="jumbotron d-flex align-items-center justify-content-center text-center" 
     style="background-image: url('images/Background/Formula.jpg'); background-size: cover; height: 350px; color: white;">
    <div class="container">
        <h1 class="display-4 font-weight-bold">Super Sport Community App</h1>
        <hr>
        <p class="lead font-weight-bold">Selamat Datang Di Arena Ku</p>
    </div>
</div>
<!-- Akhir Jumbotron -->

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-black-glow shadow-lg">
    <div class="container">
        <a class="navbar-brand glowing-text" href="customer.php"><strong>Arena</strong> Ku</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link custom-link" href="customer.php">HOME</a></li>
                <li class="nav-item"><a class="nav-link custom-link" href="lapangan.php">DAFTAR LAPANGAN</a></li>
                <li class="nav-item"><a class="nav-link custom-link" href="pesanan_pembeli.php">PESANAN ANDA</a></li>
                <li class="nav-item"><a class="nav-link custom-link" href="logout.php">LOGOUT</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Akhir Navbar -->

<!-- Filter Jenis Menu -->
<div class="container mb-3">
    <form method="GET" class="form-inline">
        <label class="mr-2 font-weight-bold">Pilih Jenis Lapangan:</label>
        <select name="jenis_menu" class="form-control mr-2">
            <option value="">Semua</option>
            <option value="Futsal" <?php if(isset($_GET['jenis_menu']) && $_GET['jenis_menu']=='Futsal') echo 'selected'; ?>>Futsal</option>
            <option value="Badminton" <?php if(isset($_GET['jenis_menu']) && $_GET['jenis_menu']=='Badminton') echo 'selected'; ?>>Badminton</option>
            <option value="Basket" <?php if(isset($_GET['jenis_menu']) && $_GET['jenis_menu']=='Basket') echo 'selected'; ?>>Basket</option>
            <option value="Minisoccer" <?php if(isset($_GET['jenis_menu']) && $_GET['jenis_menu']=='Minisoccer') echo 'selected'; ?>>Minisoccer</option>
        </select>
        <button type="submit" class="btn btn-primary">Cari Venue</button>
    </form>
</div>

<!-- Menu Produk -->
<div class="container">
    <div class="row mt-3">

    <?php
    $where = "";
    if (isset($_GET['jenis_menu']) && $_GET['jenis_menu'] != "") {
        $jenis_menu = mysqli_real_escape_string($koneksi, $_GET['jenis_menu']);
        $where = "WHERE jenis_menu = '$jenis_menu'";
    }
    $query = mysqli_query($koneksi, "SELECT * FROM produk $where");
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    ?>

    <?php foreach($result as $produk) : ?>
    <div class="col-md-3 mt-4">
        <div class="card brder-dark">
            <img src="upload/<?php echo $produk['gambar'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title font-weight-bold"><?php echo $produk['nama_menu'] ?></h5>
                <p class="card-text"><strong>Jenis:</strong> <?php echo $produk['jenis_menu'] ?></p>
                <label class="card-text harga"><strong>Rp.</strong> <?php echo number_format($produk['harga']); ?></label><br>
                <a href="beli.php?id_menu=<?php echo $produk['id_menu']; ?>" class="btn btn-success btn-sm btn-block">PESAN</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    </div>
</div>
<!-- Akhir Menu -->

<!-- Footer -->
<hr class="footer">
<div class="container">
    <div class="row footer-body">
        <div class="col-md-6">
            <div class="copyright">
                <strong>Copyright</strong> <i class="far fa-copyright"></i> © 2025 Arena KU. All rights reserved. Powered by Arena Group.
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <div class="icon-contact">
                <label class="font-weight-bold">Follow Us</label>
                <a href="#"><img src="images/icon/fb.png" class="mr-3 ml-4" data-toggle="tooltip" title="Facebook"></a>
                <a href="#"><img src="images/icon/ig.png" class="mr-3" data-toggle="tooltip" title="Instagram"></a>
                <a href="#"><img src="images/icon/twitter.png" data-toggle="tooltip" title="Twitter"></a>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Footer -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
