<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_wedding");

if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit;
}

$id = intval($_GET['id']);
$result = mysqli_query($koneksi, "SELECT * FROM tamu WHERE id_tamu = $id");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <!-- <link rel="stylesheet" href="components/form.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        <?php include 'components/form.css'?>
    
       .form-grup {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .hero-submit {
        display: flex;
        gap: 15px;
            button {
                color: white;
                padding: 12px;
                border-radius: 0.5rem;
                border: none;
                cursor: pointer;
            }
        }

        .btn-update { background-color: #ff6b9a;}
        .btn-delete { background-color: #ff4d8d;}
    </style>
</head>
<body>
    <div class="container">
        <div class="hero-input ">
        
        <div class="hero-title">
            <h1>Enter Your Data</h1>
        </div>

        <form action="" method="POST" class="grid">

            <!-- input : Username -->
            <div class="form-grup">
            <label for="name">Full Name</label >
            <input type="text" name="name" id="name" class="inputs name" placeholder="Enter Your Full Name Here" required />
            </div>

            <!-- input : Phone Number -->
            <div class="form-grup">
            <label for="phoneNumber">Phone Number</label >
            <input type="tel" name="phoneNumber" id="phoneNumber" class="inputs number" placeholder="Enter Your Number Here" required />
            </div>
            
            <!-- input : Email -->
            <div class="form-grup">
            <label for="email">Email</label >
            <input type="email" name="email" id="email" class="inputs email" placeholder="Enter Your Email Here" required />
            </div>
            
            <!-- input : Address -->
            <div class="form-grup">
            <label for="address">Address</label >
            <textarea name="address" id="address" class="inputs address" placeholder="Enter Your Address Here" required></textarea>
            </div>

            <!-- input : Message -->
            <div class="form-grup">
            <label for="message">Message</label >
            <textarea name="message" id="message" class="inputs message" placeholder="Enter Your Message Here" required></textarea>
            </div>
            
            <!-- button : submit -->
            <div class="hero-submit">
                <button type="submit" name="update" class="btn-update"> UPDATE DATA</button>
                <button type="button" onclick="confirmDelete()" class="btn-delete">DELETE DATA </button>
            </div>

        </form>
        </div>
    </div>


    <?php
    // ================= UPDATE =================
    if (isset($_POST['update'])) {

        $nama_tamu = mysqli_real_escape_string($koneksi, $_POST['name']);
        $no_hp = mysqli_real_escape_string($koneksi, $_POST['phoneNumber']);
        $alamat = mysqli_real_escape_string($koneksi, $_POST['address']);
        $ucapan = mysqli_real_escape_string($koneksi, $_POST['message']);
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);

        $query = "UPDATE tamu SET 
                    nama_tamu='$nama_tamu',
                    no_hp='$no_hp',
                    alamat='$alamat',
                    ucapan='$ucapan',
                    email='$email'
                WHERE id_tamu=$id";

        if (mysqli_query($koneksi, $query)) {
            echo "
            <script>
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data berhasil diupdate!',
                icon: 'success',
                confirmButtonColor: '#4CAF50'
            }).then(() => {
                window.location = 'dashboard.php';
            });
            </script>
            ";
        } else {
            echo "
            <script>
            Swal.fire({
                title: 'Gagal!',
                text: 'Data gagal diupdate!',
                icon: 'error'
            });
            </script>
            ";
        }
    }

    // ================= DELETE =================
    if (isset($_POST['delete'])) {

        if (mysqli_query($koneksi, "DELETE FROM tamu WHERE id_tamu=$id")) {
            echo "
            <script>
            Swal.fire({
                title: 'Terhapus!',
                text: 'Data berhasil dihapus!',
                icon: 'success',
                confirmButtonColor: '#e74c3c'
            }).then(() => {
                window.location = 'dashboard.php';
            });
            </script>
            ";
        }
    }
    ?>


<script>
function confirmDelete() {
    Swal.fire({
        title: 'Yakin?',
        text: 'Data yang dihapus tidak bisa dikembalikan!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74c3c',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('deleteForm').submit();
        }
    });
}
</script>
</body>
</html>