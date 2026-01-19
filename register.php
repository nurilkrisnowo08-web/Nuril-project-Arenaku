<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $koneksi = new mysqli("localhost", "root", "", "dbpemesanan");

    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    $username       = $_POST['username'];
    $password       = $_POST['password'];
    $nama_lengkap   = $_POST['nama_lengkap'];
    $jenis_kelamin  = $_POST['jenis_kelamin'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $alamat         = $_POST['alamat'];
    $hp             = $_POST['hp'];
    $status         = "user"; // Status otomatis "user"

    $sql = "INSERT INTO user (username, password, nama_lengkap, jenis_kelamin, tanggal_lahir, alamat, hp, status)
            VALUES ('$username', '$password', '$nama_lengkap', '$jenis_kelamin', '$tanggal_lahir', '$alamat', '$hp', '$status')";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Registrasi berhasil!'); window.location='login.php';</script>";
        exit;
    } else {
        echo "<p style='color:red; text-align:center;'>Error: " . $koneksi->error . "</p>";
    }

    $koneksi->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Olahraga</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #d50000, #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .reg-container {
            background: #fff;
            padding: 30px;
            width: 400px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
        }
        .reg-container h2 {
            text-align: center;
            color: #d50000;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #333;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 2px solid #d50000;
            border-radius: 6px;
            font-size: 15px;
            outline: none;
        }
        .form-group input:focus, .form-group select:focus {
            border-color: #ff5252;
            box-shadow: 0 0 5px rgba(213,0,0,0.5);
        }
        .radio-group {
            display: flex;
            gap: 10px;
            margin-top: 5px;
        }
        .radio-group label {
            margin-left: 5px;
            font-weight: normal;
        }
        .btn-container {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        .btn {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .btn-primary {
            background: #d50000;
            color: #fff;
        }
        .btn-primary:hover {
            background: #ff1744;
        }
        .btn-reset {
            background: #bdbdbd;
            color: #333;
        }
        .btn-reset:hover {
            background: #9e9e9e;
        }
    </style>
</head>
<body>

<div class="reg-container">
    <h2>Registrasi Arena KU</h2>
    <form method="POST">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" required>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <div class="radio-group">
                <div>
                    <input type="radio" name="jenis_kelamin" value="Laki-Laki" required>
                    <label>Laki-Laki</label>
                </div>
                <div>
                    <input type="radio" name="jenis_kelamin" value="Perempuan">
                    <label>Perempuan</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" required>
        </div>
        <div class="form-group">
            <label>No. Telepon</label>
            <input type="text" name="hp" required>
        </div>
        <div class="btn-container">
            <button type="submit" class="btn btn-primary">Register</button>
            <button type="reset" class="btn btn-reset">Reset</button>
        </div>
    </form>
</div>

</body>
</html>
