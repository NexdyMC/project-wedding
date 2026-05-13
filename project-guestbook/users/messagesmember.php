<?php
include 'app/koneksi.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seed Filter</title>
    <!-- everything default and using `weight: 100` -->
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
      rel="stylesheet"
    />

<style><?php include 'components/messagesONLY.css' ?></style>
    <link rel="stylesheet" href="components/layout.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300..700;1,300..700&display=swap");
    </style>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=La+Belle+Aurore&display=swap");
    </style>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap");
    </style>
    <link rel="stylesheet" href="components/dashboard.css">
  </head>
  <body>
    <main>
      <!-- dashboard : header -->
      <div class="dashboard-header">
        <div class="burger" onclick="toggleMenu()">
          <span class="material-symbols-outlined">menu</span>
        </div>
        <h1>Boy & Girl</h1>
      </div>

      <!-- dashboard : navbar -->
      <div class="dashboard-navbar" id="sidebar">
        <?php include 'layout/navbarmember.html'?>
      </div>
      
  <div class="overlay" id="overlay" onclick="toggleMenu()"></div>
      <!-- dashboard : content -->
      <div class="dashboard-content">
        <div class="content">
          <div
            class="rectangle-messages"
            data-aos="fade-up"
            data-aos-duration="2000">
            <div class="messages-header">
              <h1>Messages</h1>
            </div>

            <div class="messages-body">
                              <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM tamu");
                  while ($data = mysqli_fetch_array($query)) {
                    ?>
              <div class="messages-1 msg">


                    
                    <?php echo "<td>" . $data['ucapan'] . "</td>"; ?>
                    
              
              </div>
                   <?php   
                  }
                  ?>

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
