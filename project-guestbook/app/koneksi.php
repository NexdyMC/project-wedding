<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_wedding");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}


