<?php
include 'app/koneksi.php';
include 'app/title.php'; 

if (isset($_POST['register'])) {

  $nama_petugas = mysqli_real_escape_string($koneksi, $_POST['nama_petugas']);
  $username     = mysqli_real_escape_string($koneksi, $_POST['username']);
  $password     = $_POST['password'];

  // Hash password biar aman
  $password_hash = password_hash($password, PASSWORD_DEFAULT);

  // Cek username sudah ada atau belum
  $cek = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='$username'");
  
  if (mysqli_num_rows($cek) > 0) {
      echo "<script>alert('Username sudah digunakan!');</script>";
  } else {

      $query = "INSERT INTO petugas (nama_petugas, username, password) 
                VALUES ('$nama_petugas', '$username', '$password_hash')";

      if (mysqli_query($koneksi, $query)) {
          echo "<script>alert('Register berhasil!'); window.location='login.php';</script>";
      } else {
          echo "<script>alert('Register gagal!');</script>";
      }
  }
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?= $title; ?></title>

<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>

<style>
@import url("https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap");
<?php include 'components/register.css'; ?>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Lato", sans-serif;
}

</style>
</head>

<body>

<div class="container">
  <div class="card">
    <h2>Register</h2>

    <form method="POST">

      <!-- Nama Petugas -->
      <div class="form-grup">
        <label>Nama Petugas</label>
        <div class="input-wrapper">
          <input type="text" name="nama_petugas" placeholder="Nama Lengkap" required />
        </div>
      </div>

      <!-- Username -->
      <div class="form-grup">
        <label>Username</label>
        <div class="input-wrapper">
          <input type="text" name="username" placeholder="Username" required />
        </div>
      </div>

      <!-- Password -->
      <div class="form-grup">
        <label>Password</label>
        <div class="input-wrapper">
          <input type="password" name="password" id="password" placeholder="Password" required />
          <button type="button" id="btnToggle">
            <span class="material-symbols-outlined">visibility</span>
          </button>
        </div>
      </div>

      <button class="btn-register" type="submit" name="register">
        Register
      </button>

      <div class="form-footer">
        <p>Sudah punya akun? <a href="login.php">Login</a></p>
      </div>

    </form>
  </div>
</div>

<script>
const passwordInput = document.getElementById("password");
const btnToggle = document.getElementById("btnToggle");

btnToggle.addEventListener("click", function () {
  const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
  passwordInput.setAttribute("type", type);

  this.innerHTML =
    type === "password"
      ? '<span class="material-symbols-outlined">visibility</span>'
      : '<span class="material-symbols-outlined">visibility_off</span>';
});
</script>

</body>
</html>