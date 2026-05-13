<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html><?php
include 'app/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Print Data Tamu</title>
    <style>
        body {
            font-family: Arial;
        }

        th, td , table{
            border: 3px solid black;
            padding: 8px;
            text-wrap: wrap;
             overflow-wrap: break-word;
        }
        table {
            max-width: 400px;
        }

        th {
            background-color: #eee;
        }
    </style>
</head>
<body onload="window.print()">

<h2 style="text-align:center;">Data Tamu</h2>

<table>
    <tr>
        <th>Nama Tamu</th>
        <th>No HP</th>
        <th>Alamat</th>
        <th>Ucapan</th>
        <th>Keterangan</th>
        <th>Email</th>
        <th>Waktu Datang</th>
    </tr>

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
    echo "</tr>";
}
?>

</table>

</body>
</html>