<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_wedding");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Seed Filter</title>
    <!-- everything default and using `weight: 100` -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- <link rel="stylesheet" href="components/layout.css"> -->
    
    <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" /> -->
    <style>
      <?php include "components/dashboard.css"; ?>
      /* @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"); */
    
    </style>
  </head>

  <style>

  .attendance {
    height: 100%;
  }


  .list-attendance {
    height: 80vh;
  }

  .herois {
    display: flex;
    justify-content: space-between;
    padding-bottom: 0.5rem;
  }


  .herois a {
    display: flex;
    justify-content: center;
    align-items: center;  
    color: #4a3f35;
    text-decoration: none;
    transition: 0.3s;

    &:hover {
      color: #c47b82;
    }
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
    /* margin: 15px; */
    background-color: white;
    padding: 0.5rem;
    border-radius: 50px;
  }

  input[type="text"] {
    background-color: white;
    width: 100%;
    padding: 0.5em;
    margin: 0 0.5em 0 0;
    border-radius: 0.5em;
    border: none;
    font-size: 1rem;
    transition: 0.5s ease;
  }

  input[type="text"]::placeholder {
    font-size: 1rem;
    display: flex;
    align-items: center;
  }

  .rectangle-search {
    padding: 0.5em;
    border-radius: 8px;
    background-color: gray;
  }
  #btn-search {
    background-color: transparent;
    border: none;
    cursor: pointer;

    span {
      padding: 0.25rem;
    }
  }


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

          <!-- <h4 data-aos="fade-right" data-aos-duration="1000">
            Welcome back, User!!
          </h4>
        -->
        <!-- <p data-aos="fade-right" data-aos-duration="1500">Admin Session!</p> -->
        
        <div class="attendance" data-aos="fade-up" data-aos-duration="2000">
          <div class="herois">
            <!-- <h3>Quests</h3> -->
            <div class="icon ">
                <span class="material-symbols-outlined icon-box">person</span>
                <h2>Quests</h2>
            </div>
            <a href="form.php">Add Quests <span class="material-symbols-outlined" >add</span></a>
            
            </div>

            <div class="rectangle-search">
              <div class="search">
                <input type="text" name="keyword" id="search" placeholder="Search Name ........">
                
                <button id="btn-search" >
                  <span class="material-symbols-outlined" >search</span>
                </button>
              </div>
            </div>
            <div class="list-attendance">
              
              <table border="1" cellspacing="0" cellpadding="0">
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
                    </tbody>
              </table>
            </div>
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

    <!-- AJAXX-->
  <script>
document.getElementById("search").addEventListener("keyup", function() {
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
</script>
    <!-- END AJAXX -->
  </body>
</html>
