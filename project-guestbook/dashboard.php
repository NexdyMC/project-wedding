<?php
include 'app/koneksi.php';
include 'app/title.php';
session_start();
if (!isset($_SESSION['login'])) {
  header('location: login.php');
}

// Hitung Hadir
$d_hadir = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tamu WHERE keterangan='hadir'"));
$total_hadir = $d_hadir['total'];

// Hitung Tidak Hadir
$d_tidak = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tamu WHERE keterangan='tidak_hadir' or keterangan='belum_konfirmasi'"));
$total_tidak = $d_tidak['total'];

// Hitung Total Semua
$d_total = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tamu"));
$total_semua = $d_total['total'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?= $title ?></title>
    
    <!-- everything default and using `weight: 100` -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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


      <!-- CONTENT -->
      <div class="dashboard-content">
        <div class="content ">
          <div class="icon animate__animated animate__fadeInDown" data-aos="fade-down" >
              <span class="material-symbols-outlined icon-box">home</span>
              <h2 class="animate__animated animate__fadeInDown">Dashboard</h2>
          </div>
          <!-- <h2>Dashboard</h2> -->
          <h4 class="animate__animated animate__fadeInDown">Welcome back, User!!</h4>
          <p class="animate__animated animate__fadeInDown">Here's an overview of the wedding attendance</p>

          <div class="card-container" data-aos="fade-up">
            
            <!-- card : hadir -->
            <div class="rectangle rectangle-green"  data-aos-duration="1000" data-aos-anchor-placement="center-center">
              <div class="card-title">
                <div class="icon">
                  <span class="material-symbols-outlined icon-circle">check</span>
                  <h3>Attend</h3>
                </div>
                <h1><?= $total_hadir; ?></h1>
              </div>
            </div>

            <!-- card : tidak hadir -->
            <div class="rectangle rectangle-red"  data-aos-duration="1000" data-aos-anchor-placement="center-center">
              <div class="card-title">
                <div class="icon">
                  <span class="material-symbols-outlined icon-circle">close</span>
                  <h3>Not Attend</h3>
                </div>
                <h1><?= $total_tidak; ?></h1>
              </div>
            </div>

            <!-- card : belun konfirmasi -->
            <div class="rectangle rectangle-gray"  data-aos-duration="1000" data-aos-anchor-placement="center-center">
              <div class="card-title">
                <div class="icon">
                  <span class="material-symbols-outlined icon-circle">person</span>
                  <h3>Total Attendance</h3>
                </div>
                <h1><?= $total_semua; ?></h1>
              </div>
            </div>
          </div>

          <!-- Buku Tamu -->
          <div class="attendance" data-aos="fade-up" data-aos-duration="1000">
              <div class="attendance-header">
              <div class="icon">
                  <span class="material-symbols-outlined icon-box">history</span>
                  <h2>Recent Attendance</h2>
              </div>
              <a href="view.php">View All<span class="material-symbols-outlined">expand_content</span></a>
            </div>

            <div class="list-attendance">

              <table >
                <tr>
                  <th>Nama Tamu</th>
                  <th>No HP</th>
                  <th>Alamat</th>
                  <!-- <th>Ucapan</th> -->
                  <th>Keterangan</th>
                  <th>Email</th>
                  <th>Waktu Datang</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>

                <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM $tb_tamu ORDER BY waktu_datang DESC");
                  while ($data = mysqli_fetch_array($query)) {
                    $status =  $data['keterangan'];
                    $value = $status === 'hadir' ? 'Check' : ($status === 'tidak_hadir' ? 'Close' : 'Help');
                    echo "<tr>";
                    echo "<td>" . $data['nama_tamu'] . "</td>";
                    echo "<td>" . $data['no_hp'] . "</td>";
                    echo "<td>" . $data['alamat'] . "</td>";
                    // echo "<td>" . $data['ucapan'] . "</td>";
                    echo "<td class=\"text-center\"> <div class=\"material-symbols-outlined status-icon\"> $value </div> </td>";
                    echo "<td>" . $data['email'] . "</td>";
                    echo "<td>" . $data['waktu_datang'] . "</td>";
                    echo "<td> <a href='edit.php?id=" . $data['id_tamu'] .
                    "'class='icon-edit'  style='display: flex; justify-content: center;'>
                    <span class='material-symbols-outlined icon'>edit</span>
                    </a>
                    </td>";
                    echo "<td> <a href='app/crud.php?id=" . $data['id_tamu'] . "'class='icon-edit btn-delete'  style='display: flex; justify-content: center;'>
                    <span class='material-symbols-outlined icon'>delete</span>
                    </a>
                    </td>";
                  }
                  ?>
              </table>
            </div>
            
            <h3>Keterangan</h3>
            <div class="item-keterangan">
              <div class="material-symbols-outlined status-icon">Check</div> 
              <p>Hadir</p>
            
              <div class="material-symbols-outlined status-icon">Close</div> 
              <p>Tidak Hadir</p>
            
              <div class="material-symbols-outlined status-icon">Help</div> 
              <p>Belum Konfirmasi</p>
            </div>

          </div>

          <!-- Akun Admin -->
          <div class="attendance"  data-aos-duration="1000">
              <div class="attendance-header">
                <div class="icon">
                    <span class="material-symbols-outlined icon-box">history</span>
                    <h2>Admin Attendance</h2>
                </div>
                <a href="view.php">View All<span class="material-symbols-outlined">expand_content</span></a>
              </div>

            <div class="list-attendance">
              
              <!-- table petugas -->
              <table>
                <tr>
                  <th>UID Petugas</th>
                  <th>Nama Petugas</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>

                <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM $tb_petugas ");
                  while ($data = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>" . $data['id_petugas'] . "</td>";
                    echo "<td>" . $data['nama_petugas'] . "</td>";
                    echo "<td>" . $data['username'] . "</td>";
                    echo "<td>" . $data['password'] . "</td>";
                    // echo "<td>" . $data['ucapan'] . "</td>";
                    echo "<td> <a href='edit_admin.php?id=" . $data['id_petugas'] .
                    "'class='icon-edit'  style='display: flex; justify-content: center;'>
                    <span class='material-symbols-outlined icon'>edit</span>
                    </a>
                    </td>";
                    echo "<td> <a href='app/crud.php?id=" . $data['id_petugas'] . "'class='icon-edit btn-delete' style='display: flex; justify-content: center;'>
                    <span class='material-symbols-outlined icon'>delete</span>
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
    

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  const tombolHapus = document.querySelectorAll('.btn-delete');

  tombolHapus.forEach(tombol => {
    tombol.addEventListener('click', function (e) {      
      e.preventDefault();

      const urlTarget = this.getAttribute('href');

      Swal.fire({
        title: 'Apakah kamu yakin?',
        text: "Data ini akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonColor: '#3085d6',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = urlTarget;
        }
      })
    });
  });

  function toggleMenu() {
    document.getElementById("sidebar").classList.toggle("active");
    document.getElementById("overlay").classList.toggle("active");
  }


  // mengubah background, warna, dan border pada icon sesuai dengan status 
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
        icon.style.border = "2px solid #E98FA1";
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
