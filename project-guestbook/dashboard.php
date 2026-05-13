<?php
include 'app/koneksi.php';
include 'app/title.php';

// Hitung Hadir
$d_hadir = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tamu WHERE keterangan='hadir'"));
$total_hadir = $d_hadir['total'];

// Hitung Tidak Hadir
$d_tidak = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tamu WHERE keterangan='tidak_hadir'"));
$total_tidak = $d_tidak['total'];

// Hitung Total Semua
$d_total = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tamu"));
$total_semua = $d_total['total'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <title><?= $title ?></title>

    <!-- everything default and using `weight: 100` -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    

    <style>
      <?php include "components/dashboard.css";?>
    </style>
  </head>

  <body>
    <main class="dashboard-container">
      <!-- dashboard : header -->
      <div class="dashboard-header">
        <?php include "layout/header.html"; ?>
      </div>

      <!-- dashboard : navbar -->
      <div class="dashboard-navbar" id="sidebar">
        <?php include "layout/navbar.php"?>
      </div>


      <!-- OVERLAY -->
      <!-- <div class="overlay" id="overlay" onclick="toggleMenu()"></div> -->

      <!-- CONTENT -->
      <div class="dashboard-content">
        <div class="content ">
          <div class="icon animate__animated animate__fadeInDown">
              <span class="material-symbols-outlined icon-box">home</span>
              <h2 class="animate__animated animate__fadeInDown">Dashboard</h2>
          </div>
          <!-- <h2>Dashboard</h2> -->
          <h4 class="animate__animated animate__fadeInDown">Welcome back, User!!</h4>
          <p class="animate__animated animate__fadeInDown">Here's an overview of the wedding attendance</p>

          <div class="card-container">
            <div class="rectangle background-1" data-aos="fade-up" data-aos-duration="3000"
              data-aos-anchor-placement="center-center">
              <div class="card-title">
                <div class="icon">

                  <span class="material-symbols-outlined icon-circle">check</span>
                  <h3>Attend</h3>
                </div>
                <h1><?= $total_hadir; ?></h1>
              </div>
            </div>

            <div class="rectangle background-2" data-aos="fade-up" data-aos-duration="3000"
            data-aos-anchor-placement="center-center">
              <div class="card-title">
                <div class="icon">
                  <span class="material-symbols-outlined icon-circle">close</span>
                  <h3>Not Attend</h3>
                </div>
                <h1><?= $total_tidak; ?></h1>
              </div>
            </div>

            <div class="rectangle background-3" data-aos="fade-up" data-aos-duration="3000" data-aos-anchor-placement="center-center">
              <div class="card-title">
                <div class="icon">
                  <span class="material-symbols-outlined icon-circle">person</span>
                  <h3>Total Attendance</h3>
                </div>
                <h1><?= $total_semua; ?></h1>
              </div>
            </div>
          </div>

          <div class="attendance" data-aos="fade-up" data-aos-duration="3000">
              <div class="attendance-header">
              <div class="icon">
                  <span class="material-symbols-outlined icon-box">history</span>
                  <h2>Recent Attendance</h2>
              </div>
              <a href="view.php">View All<span class="material-symbols-outlined">expand_content</span></a>
            </div>

            <div class="list-attendance">

              <table border="1" cellspacing="0" cellpadding="0">
                <tr>
                  <th>Nama Tamu</th>
                  <th>No HP</th>
                  <th>Alamat</th>
                  <th>Ucapan</th>
                  <th>Keterangan</th>
                  <th>Email</th>
                  <th>Waktu Datang</th>
                  <th>edit</th>
                </tr>

                <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM tamu");
                  while ($data = mysqli_fetch_array($query)) {
                    $status =  $data['keterangan'];
                     $value = $status === 'hadir' ? 'Check' : ($status === 'tidak_hadir' ? 'Close' : 'Help');
                    echo "<tr>";
                    echo "<td>" . $data['nama_tamu'] . "</td>";
                    echo "<td>" . $data['no_hp'] . "</td>";
                    echo "<td>" . $data['alamat'] . "</td>";
                    echo "<td>" . $data['ucapan'] . "</td>";
                    echo "<td class=\"material-symbols-outlined status-icon \">" . $value . "</td>";
                    echo "<td>" . $data['email'] . "</td>";
                    echo "<td>" . $data['waktu_datang'] . "</td>";
                    echo "<td> <a href='edit.php?id=" . $data['id_tamu'] .
                    "'class='icon-edit'  style='display: flex; justify-content: center;'>
                    <span class='material-symbols-outlined icon'>edit</span>
                    </a>
                    </td>";
                  }
                  ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
    

    <script>
      function toggleMenu() {
        document.getElementById("sidebar").classList.toggle("active");
        document.getElementById("overlay").classList.toggle("active");
      }
    </script>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script>
      document.addEventListener("DOMContentLoaded", function () {
        const icons = document.querySelectorAll(".status-icon");

        icons.forEach(icon => {
          const status = icon.textContent.trim();

          if (status === "Check") {
            icon.style.color = "green";
            icon.style.background = "#d9e1d1";
            icon.style.border = "2px solid #b6c1aa";
          } 
          else if (status === "Close") {
            icon.style.color = "red";
            icon.style.background = "#ffbaba";
            icon.style.border = "2px solid #f4b0b0";
          } 
          else {
            icon.style.color = "black";
            icon.style.background = "gray";
            icon.style.border = "2px solid #b8b3b0";
          }
        });
      });
      AOS.init();
    </script>
<!-- ANIME JS -->



<!-- END ANIME JS -->
    <!-- <script>
      window.print()
    </script> -->
  </body>
</html>
