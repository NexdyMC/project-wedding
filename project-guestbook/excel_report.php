<?php
include 'app/koneksi.php';
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Data_Tamu.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1">
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
$query = mysqli_query($koneksi, "SELECT * FROM $tb_tamu");

while ($data = mysqli_fetch_assoc($query)) {
    echo "<tr>";
    echo "<td>".$data['nama_tamu']."</td>";
    echo "<td>".$data['no_hp']."</td>";
    echo "<td>".$data['alamat']."</td>";
    echo "<td>".$data['ucapan']."</td>";
    echo "<td>".$data['keterangan']."</td>";
    echo "<td>".$data['email']."</td>";
    echo "<td>".$data['waktu_datang']."</td>";
    echo "</tr>";
}
?>
</table>