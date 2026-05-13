<?php 
$koneksi = mysqli_connect("localhost", "root", "", "db_wedding");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_POST["BtnButton"])) {
    $nama  = $_POST['nama'];

    $query = mysqli_query($koneksi, "insert into  tamu (nama_tamu, )  ");

}

?>