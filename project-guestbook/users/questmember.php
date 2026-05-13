<?php require __DIR__ . '../app/koneksi.php'; 

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

    <link rel="stylesheet" href="components/layout.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap");
    </style>
    <link rel="stylesheet" href="components/dashboard.css" />
  </head>

  <style>
    .attendance {
      height: 100%;
      margin-top: 30px;
    }


    .list-attendance {
      height: 80vh;
    }

    .herois {
      font-size: 30px;
      display: flex;
      justify-content: space-between;
      padding-bottom: 15px;
    }


    .herois a {
      color: #4a3f35;;
    }
    .search {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .search span:hover {
      background-color: rgb(199, 199, 199);
    }

    .search span {
      margin: 15px;
      background-color: white;
      padding: 10px;
      border-radius: 50px;
    }

    input[type="text"] {
      background-color: white;
      width: 100%;
      padding: 17px;
      border-radius: 25px;
      border: none;
      font-size: 20px;
      transition: 0.5s ease;
    }

    input[type="text"]:hover {
      transform: scale(1.01);
    }

  

    input[type="text"]::placeholder {
      font-size: 15px;
      display: flex;
      align-items: center;
    }
    .rectangle-search {
      padding: 9px;
      border-radius: 8px;
      background-color: gray;
    }


  </style>
  <body>
    <main>
      <!-- dashboard : header -->
      <div class="dashboard-header">
        <?php include "layout/header.html"?>
      </div>

      <!-- dashboard : navbar -->
      <div class="dashboard-navbar" id="sidebar">
        <?php include "layout/navbar.html"?>
      </div>
        
      <!-- dashboard : content -->
      <div class="dashboard-content">
        <div class="content">
          <h2 data-aos="fade-right">Dashboard</h2>
          <h4 data-aos="fade-right" data-aos-duration="1000">
            Welcome back, User!!
          </h4>
          <p data-aos="fade-right" data-aos-duration="1500">Admin Session!</p>
          <div class="attendance" data-aos="fade-up" data-aos-duration="2000">
            <div class="herois">
              <h3>Quests</h3>
              <a href="form.html">Add Quests</a>
            </div>

            <div class="rectangle-search">
              <div class="search">
                <span class="material-symbols-outlined" class="src-1">search</span>
                <input type="text" name="keyword" id="keyword" placeholder="Cari Nama........">
              </div>
            </div>
            <div class="list-attendance"></div>
          </div>
        </div>
      </div>
    </main>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
      function toggleMenu() {
        document.getElementById("sidebar").classList.toggle("active");
        document.getElementById("overlay").classList.toggle("active");
      }
    </script>
  </body>
</html>
