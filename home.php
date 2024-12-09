<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Top-Up Website</title>
    <link rel="icon" href="images/logo.jpeg" type="image/icon type">
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>
    <!-- Modal Alert -->
<div id="alertModal" class="modal">
  <div class="modal-content">
    <span class="close-btn" id="closeModal">&times;</span>
    <h2>Website ini masih dalam tahap uji coba!</h2>
    <br>
    <p>Mohon maaf jika ada kesalahan. Terima kasih atas pengertiannya.</p>
  </div>
</div>

    <header class="header">
  <div class="logo">
    <img src="images/logo.jpeg" alt="Logo" />
  </div>
  <div class="language-dropdown">
  <button id="language-btn">
    <img src="images/ico/indonesia.png" alt="Selected Language" class="flag-icon" />
    <span>Indonesia</span>
    <i class="arrow-icon">▼</i>
  </button>
  <div id="language-list" class="language-list hidden">
    <div class="language-item">
      <img src="images/ico/indonesia.png" alt="Indonesia" class="flag-icon" />
      <span>Indonesia</span>
    </div>
    <div class="language-item">
      <img src="images/ico/indonesia.png" alt="United States" class="flag-icon" />
      <span>Malaysia</span>
    </div>
    <div class="language-item">
      <img src="images/ico/indonesia.png" alt="Japan" class="flag-icon" />
      <span>Singapur</span>
    </div>
    <div class="language-item">
      <img src="images/ico/indonesia.png" alt="Germany" class="flag-icon" />
      <span>Brazil</span>
    </div>
    <div class="language-item">
      <img src="images/ico/indonesia.png" alt="France" class="flag-icon" />
      <span>Philippines</span>
    </div>
    <!-- Tambahkan negara lain -->
  </div>
</div>


  <button class="menu-btn" id="menu-btn">☰</button>
  <nav class="nav-menu" id="nav-menu">
  <button class="close-btn" id="close-btn">✖</button>
  <!-- Tambahkan Logo di Sidebar -->
  <div class="sidebar-logo">
    <img src="images/logo.jpeg" alt="Logo" />
  </div>
  
  <!-- Sidebar Items di bagian atas -->
  <ul>
  <li><a href="#"><img src="images/ico/ico-topup.png" alt="Top Up"> Top Up</a></li>
  <li><a href="#"><img src="images/ico/ico-transaction.png" alt="Cek Transaksi"> Cek Transaksi</a></li>
  <li><a href="#"><img src="images/ico/ico-calculator.png" alt="Kalkulator"> Kalkulator</a></li>
  <br><br>
  <?php
  session_start(); // Mulai sesi

  if (isset($_SESSION['username'])) { 
      // Jika pengguna sudah login, tampilkan nama pengguna
      echo '<li><a href="#"><img src="images/ico/ico-user.png" alt="Profile"> ' . htmlspecialchars($_SESSION['username']) . '</a></li>';
      echo '<li><a href="auth/public/logout.php"><img src="https://png.pngtree.com/png-vector/20190505/ourmid/pngtree-vector-logout-icon-png-image_1022628.jpg" alt="Logout"> Logout</a></li>';
  } else {
      // Jika belum login, tampilkan menu default
      echo '<li><a href="auth/public/login.php"><img src="images/ico/ico-login.png" alt="Masuk"> Masuk</a></li>';
      echo '<li><a href="auth/public/register.php"><img src="" alt="Daftar"> Daftar</a></li>';
  }
  ?>
</ul>


</nav>
</header>

    <!-- Banner -->
    <section class="banner">
  <div class="carousel">
    <div class="carousel-images">
      <img src="images/banner-test.jpg" alt="Banner 1" />
      <img src="images/test-banner.jpg" alt="Banner 2" />
      <img src="images/banner-test.jpg" alt="Banner 3" />
    </div>
  </div>
</section>


    <!-- Flash Sale -->
    <section class="flash-sale">
      <h2>⚡ FLASH SALE</h2>
      <br>
      <h1>COMING SOON</h1>
    </section>

    <!-- Popular Products -->
    
<section class="product-section">
  <h2>Berikut adalah beberapa produk yang paling populer saat ini.</h2>
  <div class="product-grid">
    <div class="product-card">
      <img src="images/hok-product-card.jpg" alt="Joki Rank Honor Of Kings" />
      <div class="product-info">
        <p class="game-title">Joki Rank Honor Of Kings</p>
        <p class="game-developer">Shadow</p>
      </div>
    </div>
    <div class="product-card">
      <img src="images/ml-product-card.jpg" alt="Joki Rank Honor Of Kings" />
      <div class="product-info">
        <p class="game-title">Mobile Legends</p>
        <p class="game-developer">Shadow</p>
      </div>
    </div>
    <div class="product-card">
      <img src="images/mabar-product-card.png" alt="Joki Rank Honor Of Kings" />
      <div class="product-info">
        <p class="game-title">Jasa Main Bareng</p>
        <p class="game-developer">Shadow</p>
      </div>
    </div>
    <div class="product-card">
      <img src="images/ff-product-card.png" alt="Joki Rank Honor Of Kings" />
      <div class="product-info">
        <p class="game-title">Free Fire</p>
        <p class="game-developer">Shadow</p>
      </div>
    </div>
    <!-- Tambahkan kartu produk lainnya sesuai kebutuhan -->
  </div>
</section>


    

    <!-- Game Grid -->
    <section class="game-grid">
  <button onclick="displayMessage()">Top Up</button>
  <button onclick="displayJoki()">Joki Mobile Legends</button>
  <div id="joki-info" style="display: none; margin-top: 20px; color: white;">
    <p>Jasa Joki Mobile Legends tersedia! Hubungi kami untuk detail lebih lanjut.</p>
  </div>
  <div class="grid-container">
    <div class="grid-item">
      <img src="images/card-ml.jpg" alt="Game 1" />
    </div>
    <div class="grid-item">
      <img src="images/card-gi.jpg" alt="Game 2" />
    </div>
    <div class="grid-item">
      <img src="images/card-hok.jpg" alt="Game 3" />
    </div>
  </div>
</section>


    <!-- Footer -->
    <footer class="footer">
      <div class="wave"></div>
    </footer>

    <!-- Scripts -->
    <script src="javascript/script.js"></script>
  </body>
</html>