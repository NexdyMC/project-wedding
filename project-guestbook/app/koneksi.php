<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_guest_book");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$tb_tamu = "tamu";
$tb_petugas = "petugas";
