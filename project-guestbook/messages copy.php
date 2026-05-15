<?php
include 'app/koneksi.php';
include 'app/title.php';
session_start();
if (!isset($_SESSION['login'])) {
  header('location: login.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    
    <!-- Frame Work -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300..700;1,300..700&family=IM+Fell+Double+Pica:ital@0;1&display=swap');
      <?php include "components/dashboard.css"; include "components/messages copy.css"; ?>
    </style>
  </head>
  <body>
    <main class="dashboard-container">
      <!-- dashboard : header -->
      <div class="dashboard-header">
        <?php include 'layout/header.html'?>
      </div>

      <!-- dashboard : navbar -->
      <div class="dashboard-navbar" id="sidebar">
        <?php include "layout/navbar.php"?>
      </div>

  <!-- <div class="overlay" id="overlay" onclick="toggleMenu()"></div> -->
      <!-- dashboard : content -->
      <div class="dashboard-content">
        <div class="content">
          <div class="rectangle-messages" data-aos="fade-up" data-aos-duration="2000">
            <div class="messages-header">
              <div class="icon animate__animated animate__fadeInDown">
                <span class="material-symbols-outlined icon-box">comment</span>
                <h2 class="animate__animated animate__fadeInDown">Message</h2>
              </div>
              <div class="messages-body">
                <?php
                  $query = mysqli_query($koneksi, "SELECT nama_tamu, ucapan, alamat FROM $tb_tamu ORDER BY waktu_datang DESC");
                  while ($data = mysqli_fetch_array($query)) {
                ?>
                <div class="profile-account">
                  <span class="material-symbols-outlined person">person</span>
                  <p> <?php echo " " . $data['nama_tamu'] . " - " . $data["alamat"] ; ?>  </p>    
                </div>
                <div class="messages-1 msg">
                  <p class="message-account "><?php echo $data['ucapan']; ?></p>
                </div>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

    <script>
      function toggleMenu() {
        document.getElementById("sidebar").classList.toggle("active");
        document.getElementById("overlay").classList.toggle("active");
      }
    </script>
  </body>
</html>
