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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?></title>
    <!-- everything default and using `weight: 100` -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <style>
      <?php include "components/dashboard.css"; include 'components/quest.css'; ?>
    
    </style>
  </head>

  <style>



  </style>
  <body>
    <main class="dashboard-container">

      <!-- dashboard : header -->
      <div class="dashboard-header">
        <?php include "layout/header.html"?>
      </div>

      <!-- dashboard : navbar -->
      <div class="dashboard-navbar" id="sidebar">
        <?php include "layout/navbar.php"?>
      </div>

      <!-- dashboard : content -->
      <div class="dashboard-content">
        <div class="content">

          <div class="attendance" data-aos="fade-up" data-aos-duration="2000">
            <div class="herois">
              <div class="icon">
                <span class="material-symbols-outlined icon-box">person</span>
                <h2>Quests</h2>
              </div>
              <a href="form.php">Add Quests <span class="material-symbols-outlined">add</span></a>
            </div>

            <!-- panel : search data tabel -->
            <div class="rectangle-search">
              <div class="search">
                <input type="text" name="keyword" id="input-search" placeholder="Search Name ........">
                <button id="btn-search">
                  <span class="material-symbols-outlined">search</span>
                </button>
              </div>
            </div>

            <!-- table : message -->
            <div class="list-attendance">
              <table>
                <thead>
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
                </thead>

                <tbody id="result">
                  <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM $tb_tamu ORDER BY waktu_datang DESC");
                    while ($data = mysqli_fetch_array($query)) {
                      $status =  $data['keterangan'];
                      $value = $status === 'hadir' ? 'Check' : ($status === 'tidak_hadir' ? 'Close' : 'Help');
                      echo "<tr>";
                      echo "<td>" . $data['nama_tamu'] . "</td>";
                      echo "<td>" . $data['no_hp'] . "</td>";
                      echo "<td>" . $data['alamat'] . "</td>";
                      echo "<td>" . $data['ucapan'] . "</td>";
                      echo "<td class=\"text-center\"> <div class=\"material-symbols-outlined status-icon\"> $value </div> </td>";
                      echo "<td>" . $data['email'] . "</td>";
                      echo "<td>" . $data['waktu_datang'] . "</td>";
                      echo "<td> <a href='edit.php?id=" . $data['id_tamu'] .
                      "'class='icon-edit'  style='display: flex; justify-content: center;'>
                      <span class='material-symbols-outlined icon'>edit</span>
                      </a>
                      </td>";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- script js -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
      function toggleMenu() {
          document.getElementById("sidebar").classList.toggle("active");
          document.getElementById("overlay").classList.toggle("active");
      }

      document.getElementById("input-search").addEventListener("input", function() {
          let keyword = this.value;

          let xhr = new XMLHttpRequest();
          xhr.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("result").innerHTML = this.responseText;
              }
          };

          xhr.open("GET", "search.php?keyword=" + keyword, true);
          xhr.send();
      });

      document.addEventListener("DOMContentLoaded", function () {
        const icons = document.querySelectorAll(".status-icon");

        icons.forEach(icon => {
          const status = icon.textContent.trim();

          if (status === "Check") {
            icon.style.color = "green";
            icon.style.background = "#d9e1d1";
            icon.style.border = "2px solid #b6c1aa";
          } else if (status === "Close") {
            icon.style.color = "red";
            icon.style.background = "#ffbaba";
            icon.style.border = "2px solid #f4b0b0";
          } else {
            icon.style.color = "#202020";
            icon.style.background = "#b8b3b0";
            icon.style.border = "2px solid #808080";
          }
        });
      });
    </script>
  </body>
</html>
