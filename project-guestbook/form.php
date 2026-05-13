<?php
include 'app/koneksi.php';
include 'app/title.php';

if (isset($_POST['submit'])) {

  $nama_tamu =  $_POST['name'];
  $no_hp =  $_POST['phoneNumber'];
  $alamat =  $_POST['address'];
  $ucapan =  $_POST['message'];
  $email =  $_POST['email'];
  
  $waktu_datang = date('Y-m-d H:i:s');

  // TANPA id_tamu (biarin AUTO_INCREMENT)
  $query = "INSERT INTO tamu 
            (nama_tamu, no_hp, alamat, ucapan, keterangan, email, waktu_datang) 
            VALUES 
            ('$nama_tamu', '$no_hp', '$alamat', '$ucapan', 'hadir', '$email', '$waktu_datang')";

  if (mysqli_query($koneksi, $query)) {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data berhasil disimpan!',
            icon: 'success'
        }).then(() => {
            window.location='dashboardmember.php';
        });
    });
    </script>
    ";
  } else {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Gagal!',
            text: 'Data gagal disimpan!',
            icon: 'error'
        });
    });
    </script>
    ";
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
    <?php include 'components/form.css';?>

    .form-grup {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }
  </style>
  <title><? $title; ?></title>
</head>

<body>
  <div class="container">
    <div class="hero-input ">
      
      <div class="hero-title">
        <h1>Enter Your Data</h1>
      </div>

      <form action="" method="POST" class="grid">

        <!-- input : Username -->
        <div class="form-grup">
          <label for="name">Full Name</label >
          <input type="text" name="name" id="name" class="inputs name" placeholder="Enter Your Full Name Here" required />
        </div>

        <!-- input : Phone Number -->
        <div class="form-grup">
          <label for="phoneNumber">Phone Number</label >
          <input type="tel" name="phoneNumber" id="phoneNumber" class="inputs number" placeholder="Enter Your Number Here" required />
        </div>
        
        <!-- input : Email -->
        <div class="form-grup">
          <label for="email">Email</label >
          <input type="email" name="email" id="email" class="inputs email" placeholder="Enter Your Email Here" required />
        </div>
        
        <!-- input : Address -->
        <div class="form-grup">
          <label for="address">Address</label >
          <textarea name="address" id="address" class="inputs address" placeholder="Enter Your Address Here" required></textarea>
        </div>

        <!-- input : Message -->
        <div class="form-grup">
          <label for="message">Message</label >
          <textarea name="message" id="message" class="inputs message" placeholder="Enter Your Message Here" required></textarea>
        </div>
        
        <!-- button : submit -->
        <div class="hero-submit">
          <button name="submit" class="submit">Submit</button>
        </div>

      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
