<?php
include 'koneksi.php';

class mysql 
{   

    private function create_data($table, $nama, $kelas)
    {
        
        echo "insert into $table (nama, kelas) value ('$nama', '$kelas')";
    }
}

$petugas = new mysql();
$petugas->create_data("petugas", "febri", "11rpl1");
?>