<?php
include 'Model/auth.php';
include 'Model/proses-login.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MyCloud</title>
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Poppins', sans-serif;
        }

        .form-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-card {
            background: white;
            padding: 40px 35px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 380px;
        }

        .form-card img {
            width: 80px;
            display: block;
            margin: 0 auto 15px;
        }

        .form-card h4 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 600;
            color: #007bff;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px 15px;
        }

        .btn-primary-custom {
            background-color: #0056d2;
            border: none;
            border-radius: 10px;
            padding: 10px;
            width: 100%;
            color: white;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-primary-custom:hover {
            background-color: #0041a8;
        }

        .footer-text {
            text-align: center;
            margin-top: 15px;
            font-size: 0.9em;
        }

        .footer-text a {
            color: #0056d2;
            text-decoration: none;
            font-weight: 500;
        }
    </style>
</head>
<body>

<div class="form-container">
    <div class="form-card">
        <img src=".png" alt="Logo Cloudify">
        <h4>Masuk ke MyCloud</h4>

        <?php if ($error): ?>
            <div class="alert alert-danger py-2"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary-custom">Masuk</button>
        </form>

        <div class="footer-text">
            Belum punya akun? <a href="register.php">Daftar disini</a>
        </div>
    </div>
</div>

</body>
</html>