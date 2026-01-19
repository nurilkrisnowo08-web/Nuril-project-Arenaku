<?php 
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }else{
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

     <title>Arena Ku</title>
     <style>
  /* Warna latar belakang navbar dengan efek glow */
  .bg-black-glow {
    background-color: #000 !important;
    box-shadow: 0 0 15px rgba(243, 156, 18, 0.3);
    transition: background-color 0.5s ease;
  }

  /* Efek teks merek glowing */
  .glowing-text {
    text-shadow: 0 0 10px #f39c12, 0 0 20px #f39c12;
    font-weight: bold;
    letter-spacing: 1px;
  }

  /* Link nav dengan efek garis dan glowing saat hover */
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

  /* Smooth responsif transisi collapse */
  .navbar-collapse {
    transition: all 0.3s ease;
  }
</style>
  </head>
  <body>

<!-- Jumbotron -->
      <div class="jumbotron d-flex align-items-center justify-content-center text-center" 
     style="background-image: url('images/Background/Formula.jpg'); background-size: cover; height: 350px; color: white;">
  <div class="container">
    <h1 class="display-4"><span class="font-weight-bold">Super Sport Community App</span></h1>
    <hr>
    <p class="lead font-weight-bold">Selamat Datang Di Arena Ku</p>
  </div>
</div>
  <!-- Akhir Jumbotron -->

  <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-black-glow shadow-lg">
  <div class="container">
    <a class="navbar-brand text-white fw-bold glowing-text" href="admin.php"><strong>Arena</strong> Ku</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link custom-link" href="admin.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-link" href="daftar_lapangan.php">DAFTAR LAPANGAN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-link" href="pesanan.php">PESANAN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-link" href="logout.php">LOGOUT</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

  <!-- Akhir Navbar -->

  <!-- Menu -->    
      <div class="container">
  <div class="judul text-center mt-5">
    <!-- Judul bisa ditambahkan di sini -->
  </div>

  <div class="row mb-5 mt-5">
    <!-- Kartu Daftar Menu -->
    <div class="col-md-6 d-flex justify-content-end">
      <div class="card bg-dark text-white border-light">
        <img src="images/background/manado.jpg" class="card-img" alt="Lihat Daftar Menu">
        <div class="card-img-overlay d-flex align-items-center justify-content-center">
          <a href="daftar_lapangan.php" class="btn btn-primary">LIHAT DAFTAR LAPANGAN</a>
        </div>
      </div>
    </div>

    <!-- Kartu Pesanan -->
    <div class="col-md-6 d-flex justify-content-start">
      <div class="card bg-dark text-white border-light">
        <img src="images/background/relone.jpg" class="card-img" alt="Lihat Pesanan">
        <div class="card-img-overlay d-flex align-items-center justify-content-center">
          <a href="pesanan.php" class="btn btn-primary">LIHAT PESANAN</a>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- Akhir Menu -->

  <!-- Awal Footer -->
      <hr class="footer">
      <div class="container">
        <div class="row footer-body">
          <div class="col-md-6">
          <div class="copyright">
            <strong>Copyright</strong> <i class="far fa-copyright"></i> © 2025 Arena KU - Developed by Ahmad Syauki & Zulfan Lutfiansyah</p>
          </div>
          </div>

          <div class="col-md-6 d-flex justify-content-end">
          <div class="icon-contact">
          <label class="font-weight-bold">Follow Us </label>
          <a href="#"><img src="images/icon/fb.png" class="mr-3 ml-4" data-toggle="tooltip" title="Facebook"></a>
          <a href="#"><img src="images/icon/ig.png" class="mr-3" data-toggle="tooltip" title="Instagram"></a>
          <a href="#"><img src="images/icon/twitter.png" class="" data-toggle="tooltip" title="Twitter"></a>
        </div>
          </div>
        </div>
      </div>
  <!-- Akhir Footer -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
  </body>
</html>
<?php } ?>