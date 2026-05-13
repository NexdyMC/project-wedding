<?php
include 'app/koneksi.php';
include 'app/title.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="components/beranda.css" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap");
    </style>
  </head>


  <body>
    <!-- halaman utama -->
    <div class="layar" id="layar">
      <div class="container">
        <div class="animasi-1">
          <img src="/images/bunga-kiri-atas.png" alt="" width="100px" />
        </div>

        <div class="animasi-2">
          <img src="/images/bunga-kiri-atas.png" alt="" width="100px" />
        </div>

        <div class="judul">
          <h4>The Wedding Of</h4>
          <h1>Boy & Girl</h1>
        </div>
        <div class="container-image">
          <img src="https://picsum.photos/148" alt="" />
          <p>
            "They say life is about the destination, it's about the journey. I
            think it's about the traveling companions who you go through life
            with. It doesn't matter where you end up or how you got there if you
            didn't enjoy who you traveled with. It's about choosing the right
            traveling companion in life.
          </p>
        </div>

        <!-- button  -->
        <div class="tombol">
          <div class="btn">
            <div class="teks-atas">
              <a href="form.php" class="form">Form</a>
            </div>

            <div class="teks-atas">
              <a href="login.php" class="sign">Sign In</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div></div>
  </body>
</html>
