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

          <div class="attendance">

            <div class="herois">
              <div class="icon" data-aos="fade-right" data-aos-duration="800">
                <span class="material-symbols-outlined icon-box">person</span>
                <h2>Quests</h2>
              </div>

              <a href="form.php" data-aos="fade-left" data-aos-duration="800">Add Quests <span class="material-symbols-outlined">add</span></a>
            </div>

            <!-- panel : search data tabel -->
            <div class="rectangle-search" data-aos="fade-top" data-aos-duration="800">
              <div class="search">
                <input type="text" name="keyword" id="input-search" placeholder="Search Name ........">
                <button id="btn-search">
                  <span class="material-symbols-outlined">search</span>
                </button>
              </div>
            </div>

            <!-- table : message -->
            <div class="list-attendance" data-aos="fade-top" data-aos-duration="800">
              <table id="guestTable">
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

            <h3>Keterangan</h3>
            <div class="item-keterangan">
              <!-- keterangan : hadir -->
              <div class="material-symbols-outlined status-icon">Check</div> 
              <p>Hadir</p>
              
              <!-- keterangan : tidak hadir -->
              <div class="material-symbols-outlined status-icon">Close</div> 
              <p>Tidak Hadir</p>
              
              <!-- keterangan : belum konfirmasi -->
              <div class="material-symbols-outlined status-icon">Help</div> 
              <p>Belum Konfirmasi</p>
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

      // Menangkap elemen input dan semua baris di dalam tbody
      const searchInput = document.getElementById('input-search');
      const tableRows = document.querySelectorAll('#guestTable tbody tr');

      // Menambahkan event listener 'input' agar merespon setiap kali ada ketikan
      searchInput.addEventListener('input', function(e) {
          // Ubah teks pencarian menjadi huruf kecil semua agar case-insensitive
          const searchString = e.target.value.toLowerCase();

          // Lakukan perulangan untuk setiap baris tabel
          tableRows.forEach(row => {
              // Ambil sel pertama dari baris tersebut (kolom 'Nama Tamu')
              // Gunakan td:nth-child(1) karena Nama Tamu ada di kolom pertama
              const nameCell = row.querySelector('td:nth-child(1)');

              if (nameCell) {
                  // Ambil teks dari dalam sel dan ubah ke huruf kecil
                  const nameText = nameCell.textContent.toLowerCase();

                  // Cek apakah teks pada kolom nama mengandung kata kunci pencarian
                  if (nameText.includes(searchString)) {
                      // Jika cocok, tampilkan barisnya
                      row.style.display = '';
                  } else {
                      // Jika tidak cocok, sembunyikan barisnya
                      row.style.display = 'none';
                  }
              }
          });
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
