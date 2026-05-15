<?php
// 1. Inisialisasi & Pengaturan Waktu (Letakkan paling atas)
date_default_timezone_set('Asia/Jakarta');
include 'app/koneksi.php';
include 'app/title.php';
include 'app/cuid.php';


$alert_status = ""; // Variabel khusus untuk trigger SweetAlert

// 2. Proses Form Submit (Pastikan mengecek name="submit" dari button)
if (isset($_POST['submit'])) {

    // 3. Keamanan: Bersihkan input dari karakter berbahaya (Anti SQL Injection & XSS)
    $nama_tamu =  htmlspecialchars($_POST['name']);
    $no_hp     =  htmlspecialchars($_POST['phoneNumber']);
    $alamat    =  htmlspecialchars($_POST['address']);
    $ucapan    =  htmlspecialchars($_POST['message']);
    $email     =  htmlspecialchars($_POST['email']);
    
    // 4. Logika Waktu & Kehadiran
    $waktu_datang   = date('Y-m-d H:i:s');
    $waktu_sekarang = strtotime(date('H:i:s'));
    $batas_waktu    = strtotime("11:30:00");
    
    // Gunakan variabel $keterangan agar tidak bentrok dengan alert
    if ($waktu_sekarang < $batas_waktu) {
        $keterangan = "hadir";
    } else {
        $keterangan = "tidak_hadir";
    }

    // 5. Eksekusi Database
    $query = "INSERT INTO $tb_tamu 
              (id_tamu, nama_tamu, no_hp, alamat, ucapan, keterangan, email, waktu_datang) 
              VALUES 
              ('$cuid', '$nama_tamu', '$no_hp', '$alamat', '$ucapan', '$keterangan', '$email', '$waktu_datang')";

    if (mysqli_query($koneksi, $query)) {
        $alert_status = "success"; // Trigger alert sukses
    } else {
        $alert_status = "error";   // Trigger alert error
    }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap");
    <?php include 'components/form.css'; ?>

    .form-grup {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }
  </style>
  <title><?= $title; ?></title>
  
  <!-- Muat SweetAlert Library di Head agar langsung siap dipakai -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div class="container">
    <div class="hero-input">
      
      <div class="hero-title">
        <h1>Enter Your Data</h1>
      </div>

      <form method="POST" class="grid">

        <div class="form-grup">
          <label for="name">Full Name</label>
          <input type="text" name="name" id="name" class="inputs name" placeholder="Enter Your Full Name Here" required />
        </div>

        <div class="form-grup">
          <label for="phoneNumber">Phone Number</label>
          <input type="tel" name="phoneNumber" id="phoneNumber" class="inputs number" placeholder="Enter Your Number Here" required />
        </div>
        
        <div class="form-grup">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="inputs email" placeholder="Enter Your Email Here" required />
        </div>
        
        <div class="form-grup">
          <label for="address">Address</label>
          <textarea name="address" id="address" class="inputs address" placeholder="Enter Your Address Here" required></textarea>
        </div>

        <div class="form-grup">
          <label for="message">Message</label>
          <textarea name="message" id="message" class="inputs message" placeholder="Enter Your Message Here" required></textarea>
        </div>
        
        <div class="hero-submit">
          <!-- UBAH: name="BtnUpdate" menjadi name="submit" agar terbaca oleh PHP di atas -->
          <button type="submit" name="submit" class="btn-update">Simpan Data</button>
        </div>

      </form>
    </div>
  </div>

  <!-- 6. Script Manajemen Alert (Tampil jika form disubmit) -->
  <?php if ($alert_status !== "") : ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      
      <?php if ($alert_status == "success") : ?>
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data tamu berhasil disimpan.',
            icon: 'success',
            background: '#FFF6F8',
            color: '#5f4b53',
            confirmButtonColor: '#ff6b9a',
            confirmButtonText: 'Selesai',
            showClass: { popup: 'animate__animated animate__fadeInDown' },
            hideClass: { popup: 'animate__animated animate__fadeOutUp' }
        }).then(() => {
            window.location.href = 'dashboard.php';
        });

      <?php elseif ($alert_status == "error") : ?>
        Swal.fire({
            title: 'Gagal!',
            text: 'Terjadi kesalahan saat menyimpan data.',
            icon: 'error',
            background: '#FFF6F8',
            color: '#5f4b53',
            confirmButtonColor: '#ff4d8d',
            confirmButtonText: 'Coba Lagi'
        });
      <?php endif; ?>

    });
  </script>
  <?php endif; ?>

</body>
</html>