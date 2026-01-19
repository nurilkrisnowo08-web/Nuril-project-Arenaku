<?php 
session_start();
include 'koneksi.php';

$popup = "";

if (isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($koneksi, trim($_POST['username']));
    $password = mysqli_real_escape_string($koneksi, trim($_POST['password']));

    $cek_username = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$user'");

    if (mysqli_num_rows($cek_username) > 0) {
        // Username ditemukan, cek password
        $cek_data = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$user' AND password = '$password'");
        
        if (mysqli_num_rows($cek_data) > 0) {
            $hasil = mysqli_fetch_array($cek_data);
            $status = $hasil['status'];
            $login_user = $hasil['username'];

            $_SESSION['login_user'] = $login_user;

            if ($status == 'admin') {
                header('location: admin.php');
                exit;
            } elseif ($status == 'user') {
                header('location: customer.php');
                exit;
            }
        } else {
            $popup = "salah";
        }
    } else {
        $popup = "belum";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Arena KU</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        body {
            height: 100vh;
            background: linear-gradient(135deg, #d50000, #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background: #fff;
            padding: 40px;
            width: 320px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #d50000;
        }
        .form-group {
            text-align: left;
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #333;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 2px solid #d50000;
            border-radius: 6px;
            outline: none;
            font-size: 16px;
        }
        .form-group input:focus {
            border-color: #ff5252;
            box-shadow: 0 0 5px rgba(213,0,0,0.5);
        }
        .login-btn {
            width: 100%;
            padding: 12px;
            background: #d50000;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.3s;
        }
        .login-btn:hover {
            background: #ff1744;
        }
        .reset-btn {
            width: 100%;
            padding: 12px;
            background: #bdbdbd;
            color: #333;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.3s;
        }
        .reset-btn:hover {
            background: #9e9e9e;
        }
        .register-link {
            display: block;
            margin-top: 15px;
            color: #d50000;
            text-decoration: none;
            font-size: 14px;
        }
        .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login Arena KU</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan Username" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan Password" required>
        </div>
        <button type="submit" name="submit" class="login-btn">LOGIN</button>
        <button type="reset" class="reset-btn">RESET</button>
        <a href="register.php" class="register-link">Belum punya akun? Daftar sekarang</a>
    </form>
</div>

<?php 
if ($popup == "salah") {
    echo "<script>alert('Username atau Password yang Anda masukkan salah!');</script>";
} elseif ($popup == "belum") {
    echo "<script>alert('Akun Anda belum terdaftar!');</script>";
}
?>

</body>
</html>
