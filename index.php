<?php
session_start();

// Hitung total item di keranjang dari session 'cart'
$total_keranjang = 0;
if (!empty($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        if (isset($item['quantity'])) {
            $total_keranjang += $item['quantity'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gramedia Clone</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <div class="header-top-links">
    <ul>
      <li><a href="index.php?module=produk&pages=promo">Promo</a></li>
      <li><a href="index.php?module=produk&pages=toko1">Toko Kami</a></li>
      <li><a href="index.php?module=produk&pages=hubungi">Hubungi Kami</a></li>
    </ul>
  </div>

  <div class="container">
    <div class="top-nav">
      <div class="logo">
        <a href="index.php">Gramedia.com</a>
      </div>

      <div class="search-bar">
        <select><option>Kategori</option></select>
        <div class="input-wrapper">
          <img src="img/search-interface-symbol.png" alt="search">
          <input type="text" placeholder="Cari Produk, Judul Buku, atau Penulis">
        </div>

        <?php if (isset($_SESSION['id_pengguna'])): ?>
          <a href="index.php?module=produk&pages=keranjang" class="cart-link" style="position: relative;">
            <img src="img/shopping-cart.png" alt="keranjang">
            <?php if ($total_keranjang > 0): ?>
              <span style="
                position: absolute;
                top: -5px;
                right: -10px;
                background-color: red;
                color: white;
                font-size: 12px;
                padding: 2px 6px;
                border-radius: 50%;
              ">
                <?= $total_keranjang ?>
              </span>
            <?php endif; ?>
          </a>
        <?php else: ?>
          <a href="admin/login.php" class="cart-link">
            <img src="img/shopping-cart.png" alt="keranjang">
          </a>
        <?php endif; ?>
      </div>

      <div class="auth-buttons">
        <?php if (isset($_SESSION['id_pengguna'])): ?>
          <span>Halo, <?= htmlspecialchars($_SESSION['nama_pengguna'] ?? 'Pengguna'); ?> | 
            <a href="admin/logout.php">Logout</a>
          </span>
        <?php else: ?>
          <a href="admin/login.php"><button class="btn-login">Masuk</button></a>
          <a href="admin/daftar.php"><button class="btn-register">Daftar</button></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</header>

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
