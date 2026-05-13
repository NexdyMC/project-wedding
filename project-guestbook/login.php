  <?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "db_guest_book");


if (isset($_POST['submit'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='$username'");
  $data = mysqli_fetch_assoc($query);

  if ($data) {

    if (password_verify($password, $data['password'])) {

      // ⬇ SET SESSION DI SINI (SETELAH LOGIN BERHASIL)
      $_SESSION['username'] = $data['username'];
      $_SESSION['id'] = $data['id'];

      header("Location: dashboard.php");
      exit();

    } else {
      echo "Password salah";
    }

  } else {
    echo "Username tidak ditemukan";
  }
}
?>


  <!doctype html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Wedding Invitation</title>
      <!-- icons google -->
      <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
        rel="stylesheet"
      />
      <style>
        @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap");
      </style>
      <!-- link style -->
      <style>
      <?php include 'components/login.css'?>
      </style>
    </head>
    <body>
      <div class="container">
        <div class="card grid">
          <h2>Login as Admin</h2>
          <form method="POST" class="grid">
            <!-- input : Username -->
            <div class="form-grup">
              <label for="username">Username</label>
              <div class="input-wrapper">
                <input
                  type="text"
                  name="username"
                  id="username"
                  placeholder="Username"
                  required
                />
              </div>
            </div>

            <!-- input : Password -->
            <div class="form-grup">
              <label for="password">Password</label>
              <div class="input-wrapper">
                <input
                  type="password"
                  name="password"
                  id="password"
                  placeholder="Password"
                  required
                />
                <button class="toggle-password" id="btnToggle" type="button">
                  <span class="material-symbols-outlined">visibility</span>
                </button>
              </div>
            </div>

            
            <div class="divider"></div>
            
            <button class="btn-login" type="submit" name="submit">Login</button>
            <div class="info-warning">
              </div>
            <!-- bantuan  -->
            <div class="form-footer">
              <p><a href="#">Forgot Password?</a></p>
            </div>

            <!-- Metode masuk -->
          </form>
        </div>
      </div>

      <script>
        const passwordInput = document.getElementById("password");
        const btnToggle = document.getElementById("btnToggle");

        btnToggle.addEventListener("click", function () {
          // Cek tipe input saat ini
          const type =
            passwordInput.getAttribute("type") === "password"
              ? "text"
              : "password";

          // Ubah tipe input
          passwordInput.setAttribute("type", type);

          // Ubah teks tombol
          this.innerHTML =
            type === "password"
              ? '<span class="material-symbols-outlined">visibility</span>'
              : '<span class="material-symbols-outlined">visibility_off</span>';
        });
      </script>
    </body>
  </html>
