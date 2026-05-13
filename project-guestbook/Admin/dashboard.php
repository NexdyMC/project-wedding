<?php
include '../app/koneksi.php';

$q_hadir = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tamu WHERE keterangan='hadir'");
$d_hadir = mysqli_fetch_assoc($q_hadir);
$total_hadir = $d_hadir['total'];

// Hitung Tidak Hadir
$q_tidak = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tamu WHERE keterangan='tidak_hadir'");
$d_tidak = mysqli_fetch_assoc($q_tidak);
$total_tidak = $d_tidak['total'];

// Hitung Total Semua
$q_total = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tamu");
$d_total = mysqli_fetch_assoc($q_total);
$total_semua = $d_total['total'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Seed Filter</title>
    <!-- everything default and using `weight: 100` -->
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
      rel="stylesheet"
    />

    <style>
      <?php include "../components/dashboard.css";?>
      /* @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"); */
    /* icons */
    .icon {
      margin: 0.5rem 0;
      display: flex;
      align-items: center;
      cursor: default;
      
    }
    .icon-box {
      margin: 0 0.5rem 0 0;
      border-radius: 0.5rem;
      font-size: 1.5rem;
      padding: 0.35em;
      background: linear-gradient(#FF8EAA, #E79BAB);
      border: 2px solid #FF85A2;
      /* color: #fff; */
    }
    .icon-circle {
      border-radius: 50%;
      margin: 0 0.5rem 0 0;
      padding: 0.35rem;
      background: #0005;
    }

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
        <div class="burger" onclick="toggleMenu()">
          <span class="material-symbols-outlined">menu</span>
        </div>

        <!-- navbar | profile -->
        <div class="navbar-profile">
          <img src="person-1.jpg" alt="profile" width="100"  height="100" />
          <p>Wercome</p>
          <h2>Ringo Start</h2>
        </div>

        <ul>
          <li data-aos="fade-left" data-aos-duration="1000">
            <a href="dashboard.php">
              <span class="material-symbols-outlined">home</span>Dashboard
            </a>
          </li>
          <li data-aos="fade-left" data-aos-duration="1200">
            <a href="quest.php">
              <span class="material-symbols-outlined">person</span>Quests
            </a>
          </li>
          <li data-aos="fade-left" data-aos-duration="1400">
            <a href="messages.php">
              <span class="material-symbols-outlined">comment</span>Messages
            </a>
          </li>
          <li data-aos="fade-left" data-aos-duration="1600">
            <a href="login.php">
              <span class="material-symbols-outlined">logout</span>logout
            </a>
          </li>
        </ul>

      </div>

      <!-- OVERLAY -->
      <!-- <div class="overlay" id="overlay" onclick="toggleMenu()"></div> -->

      <!-- CONTENT -->
      <div class="dashboard-content">
        <div class="content">
          <div class="icon ">
              <span class="material-symbols-outlined icon-box">home</span>
              <h2>Dashboard</h2>
          </div>
          <!-- <h2>Dashboard</h2> -->
          <h4>Welcome back, User!!</h4>
          <p>Here's an overview of the wedding attendance</p>

          <div class="card-container">
            <div class="rectangle background-1">
              <div class="card-title">
                <div class="icon">

                  <span class="material-symbols-outlined icon-circle">check</span>
                  <h3>Attend</h3>
                </div>
                <h1><?= $total_hadir; ?></h1>
              </div>
            </div>

            <div class="rectangle background-2">
              <div class="card-title">
                <div class="icon">
                  <span class="material-symbols-outlined icon-circle">close</span>
                  <h3>Not Attend</h3>
                </div>
                <h1><?= $total_tidak; ?></h1>
              </div>
            </div>

            <div class="rectangle background-3">
              <div class="card-title">
                <div class="icon">
                  <span class="material-symbols-outlined icon-circle">person</span>
                  <h3>Total Attendance</h3>
                </div>
                <h1><?= $total_semua; ?></h1>
              </div>
            </div>
          </div>

          <div class="attendance">
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
                    echo "<tr>";
                    echo "<td>" . $data['nama_tamu'] . "</td>";
                    echo "<td>" . $data['no_hp'] . "</td>";
                    echo "<td>" . $data['alamat'] . "</td>";
                    echo "<td>" . $data['ucapan'] . "</td>";
                    echo "<td>" . $data['keterangan'] . "</td>";
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

    <!-- <script>
      window.print()
    </script> -->
  </body>
</html>
