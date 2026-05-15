<?php
include 'app/koneksi.php';
include 'app/title.php';



if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit;
}

$id = intval($_GET['id']);
$result = mysqli_query($koneksi, "SELECT * FROM $tb_petugas WHERE id_petugas=$id");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}


?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?> </title>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Lato", sans-serif;
        }

        <?php include 'components/register.css'?>
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Register</h2>

            <?php 
            $id = $_GET['id'];
            $query = mysqli_query($koneksi, "SELECT * FROM $tb_petugas WHERE id_petugas = '$id'; ");
            while ($data = mysqli_fetch_assoc($query)) {
            ?>
            <form method="POST">
                <!-- input : id petugas -->
                <input type="hidden" name="id_petugas" value="<?= $id ?>">
                
                <!-- input : Nama Petugas -->
                <div class="form-grup">
                    <label>Nama Petugas</label>
                    <div class="input-wrapper">
                    <input type="text" name="nama_petugas" value="<?= $data['nama_petugas'];?>" placeholder="Nama Lengkap" required />
                    </div>
                </div>

                <!-- input : Username -->
                <div class="form-grup">
                    <label>Username</label>
                    <div class="input-wrapper">
                    <input type="text" name="username" value="<?= $data['username'];?>" placeholder="Username" required />
                    </div>
                </div>

                <!-- input : Password -->
                <div class="form-grup">
                    <label>Password</label>
                    <div class="input-wrapper">
                    <input type="password" name="password" id="password" placeholder="Password" required />
                    <button type="button" id="btnToggle">
                        <span class="material-symbols-outlined">visibility</span>
                    </button>
                    </div>
                </div>

                <!-- input : btn submit -->
                <button class="btn-register" type="submit" name="BtnUpdate">
                    Update Petugas
                </button>
            </form>
            <?php } ?>
        </div>
    </div>

    <!-- script js -->
    <script>
        const passwordInput = document.getElementById("password");
        const btnToggle = document.getElementById("btnToggle");

        btnToggle.addEventListener("click", function () {
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);

        this.innerHTML =
            type === "password"
            ? '<span class="material-symbols-outlined">visibility</span>'
            : '<span class="material-symbols-outlined">visibility_off</span>';
        });
    </script>

    <?php 
    if (isset($_POST['BtnUpdate'])) {

        // ambil data form
        $id_petugas     = $_POST['id_petugas'];
        $nama_petugas   = $_POST['nama_petugas'];
        $username       = $_POST['username'];
        $password       = $_POST['password'];
        


        // validasi sederhana
        if ( empty($nama_petugas) || empty($username) || empty($password)) {
            $status = "empty";
        } else {

            // query update
            $query = "
                UPDATE $tb_petugas SET
                    nama_petugas    = '$nama_petugas',
                    username        = '$username',
                    password        = '$password'
                WHERE id_petugas = '$id_petugas'
            ";

            // eksekusi query
            $result = mysqli_query($koneksi, $query);

            if ($result) {
                $status = "success";
            } else {
                $status = "error";
            }
        }
    }
    ?>
    <?php if (isset($status)) : ?>
    <script>
    <?php if ($status == "success") : ?>
        Swal.fire({
            title: 'Update Successful!',
            text: 'Guest data has been updated successfully.',
            icon: 'success',
            background: '#FFF6F8',
            color: '#5f4b53',
            confirmButtonColor: '#ff6b9a',
            confirmButtonText: 'Done',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        }).then(() => {
            // redirect setelah update
            window.location.href = 'dashboard.php';
        });
    <?php elseif ($status == "empty") : ?>
        Swal.fire({
            title: 'Incomplete Form!',
            text: 'Please fill in all required fields.',
            icon: 'warning',
            background: '#FFF6F8',
            color: '#5f4b53',
            confirmButtonColor: '#ff6b9a',
            confirmButtonText: 'Okay'
        });
    <?php else : ?>
        Swal.fire({
            title: 'Update Failed!',
            text: 'An error occurred while updating data.',
            icon: 'error',
            background: '#FFF6F8',
            color: '#5f4b53',
            confirmButtonColor: '#ff4d8d',
            confirmButtonText: 'Try Again'
        });
    <?php endif; ?>
    </script>
    <?php endif; ?>
</body>
</html>