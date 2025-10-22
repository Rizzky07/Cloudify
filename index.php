<?php
session_start();

// --- AWAL KODE MODIFIKASI UNTUK MEMAKSA LOGIN ---
// Periksa apakah pengguna sudah login
if (!isset($_SESSION['id_pengguna'])) {
    // Jika belum login, arahkan ke halaman login
    header('Location: Model/login.php');
    exit(); // Penting: Hentikan eksekusi skrip setelah pengalihan
}
// --- AKHIR KODE MODIFIKASI UNTUK MEMAKSA LOGIN ---
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cloudify</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="app-container">
    <aside class="sidebar">
        <div class="logo-section">
            <img src="Gambar/Logo Cloudify.png" alt="Cloudify Logo" class="logo-icon">
            <span class="logo-text">CLOUDIFY</span>
        </div>

        <button class="new-button">
            <i class="fas fa-plus"></i>
            <span>Baru</span>
        </button>

        <nav class="sidebar-nav">
            <ul>
                <li class="nav-item active">
                    <i class="fas fa-home"></i>
                    <span>Beranda</span>
                </li>
                <li class="nav-item">
                    <i class="fas fa-folder"></i>
                    <span>Cloud Saya</span>
                </li>
                <li class="nav-item">
                    <i class="fas fa-history"></i>
                    <span>Terbaru</span>
                </li>
                <li class="nav-item">
                    <i class="fas fa-star"></i>
                    <span>Favorit</span>
                </li>
                <li class="nav-item">
                    <i class="fas fa-trash-alt"></i>
                    <span>Sampah</span>
                </li>
            </ul>
        </nav>

        <div class="storage-section">
            <i class="fas fa-cloud"></i>
            <span>Penyimpanan</span>
            <div class="progress-bar-container">
                <div class="progress-bar" style="width: 31.66%;"></div> </div>
            <p class="storage-info">1.9 GB dari 6 GB Terpakai</p>
        </div>
    </aside>

    <main class="main-content">
        <div class="main-header">
            <div class="search-container">
                <i class="fas fa-search"></i>
            </div>
        </div>
        <h2 class="welcome-text">Selamat Datang</h2>
        <div class="content-cards">
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
        </div>
    </main>
</div>

<div class="container-fluid">
  <?php
    $page = 'pages/Menu-Utama.php'; // Halaman default
    if (isset($_GET['module']) && isset($_GET['pages'])) {
      $page = 'pages/' . $_GET['module'] . '/' . $_GET['pages'] . '.php';
    }
    if (file_exists($page)) {
      require($page);
    } else {
      echo "<h2 style='padding: 20px; color: red;'>Halaman tidak ditemukan: <code>$page</code></h2>";
    }
  ?>
</div>

</body>
</html>
