<?php
include 'app/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Data</title>
</head>

<style>
    <?php include "components/dashboard.css";?>
    
    h2 {
        text-align: center;
        padding: 10px;
    }

    td {
  padding: 5px;
  margin: 20px;
  max-width: 120px;      /* atur lebar sesuai kebutuhan */
  white-space: nowrap;   /* biar gak turun baris */
  overflow: hidden;      
  text-overflow: ellipsis;
  border: none;
}

/* Memberikan warna pada baris genap (even) */
tr:nth-child(even) {
  background-color: #f2f2f2; /* Warna abu-abu muda */
}

/* Kamu juga bisa mewarnai baris ganjil (odd) jika mau */
tr:nth-child(odd) {
  background-color: #ffffff; 
}

/* Tambahan: Efek saat baris disentuh (hover) agar lebih jelas */
tr:hover {
  background-color: #e2e8f0;
}

table {
  border-collapse: collapse;
    min-width: 600px; /* Memaksa tabel lebih lebar dari layar HP */
  overflow: hidden;
  
  width: 100%;
}
table tr th {
  background-color: #e8b4b8;
  padding: 0.5em;
}
table tr td {
  padding: 0.5em;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
}

.btn {
    padding-right: 25px;
}
.btn a {
    padding: 10px;
}

.btn a {
        align-items: center;
        color: #4a3f35;
        transition: 0.3s;
        text-decoration: none;

        &:hover {
            color: #c47b82;
        }
}
</style>
<body>

    <div class="header">
        <h2>View All Data</h2>
        
        <div class="btn">
            <a href="dashboard.php">Back ></a>
            <a href="print_report.php" target="_blank">Print ></a>
            <a href="excel_report.php">Excel ></a>
    </div>
    </div>

    <table>
        <tr>
            <th>Id Tamu</th>
            <th>Nama Tamu</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Ucapan</th>
            <th>Keterangan</th>
            <th>Email</th>
            <th>Waktu Datang</th>
        </tr>

        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM $tb_tamu");
        while ($data = mysqli_fetch_array($query)) {
            echo "<tr>";
            echo "<td>" . $data['id_tamu'] . "</td>";
            echo "<td>" . $data['nama_tamu'] . "</td>";
            echo "<td>" . $data['no_hp'] . "</td>";
            echo "<td>" . $data['alamat'] . "</td>";
            echo "<td>" . $data['ucapan'] . "</td>";
            echo "<td>" . $data['keterangan'] . "</td>";
            echo "<td>" . $data['email'] . "</td>";
            echo "<td>" . $data['waktu_datang'] . "</td>";
        }
            ?>
    </table>
</body>
</html>