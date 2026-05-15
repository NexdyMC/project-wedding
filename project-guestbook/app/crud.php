<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include 'koneksi.php';

$id_tamu = $_GET["id"];

$query = mysqli_query($koneksi, "DELETE FROM $tb_tamu    WHERE `id_tamu`='$id_tamu'");
$query = mysqli_query($koneksi, "DELETE FROM $tb_petugas WHERE `id_petugas`='$id_tamu'");

if ($query) {
    echo "<script>alert(\"data tamu berhasil dihapus\"); document.location = '../dashboard.php';</script>";
    } else {
    echo "<script>alert(\"data gagal dihapus\"); document.location = '../dashboard.php';</script>";
}

?>


<script>
<?php if ($query) {?>
    Swal.fire({
        title: "!",
        text: "Data berhasil ",
        icon: "success"
    }).then(() => {
        window.location.href = '../dashboard.php';
    });
<?php } else {?>
    Swal.fire({
        title: "!",
        text: "Data gagal dibapus ",
        icon: "error"
    }).then(() => {
        window.location.href = '../dashboard.php';
    });
<?php } ?>

</script>
