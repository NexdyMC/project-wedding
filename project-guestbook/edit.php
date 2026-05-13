<?php
include 'app/koneksi.php';
include 'app/title.php';


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
    <title><?= $title ?> </title>
    <!-- SweetAlert2 -->
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
        }
        button {
            padding: 12px;
            border-radius: 0.5rem;
            cursor: pointer;
        }

        .btn-update { 
            border: 1px solid #FF97B7;
            background: #FFF6F8;
            color: #F25F8F;
            &:hover {
                background: #F3003115;
            }
        }
        .btn-delete { 
            border: 1px solid #F6BECB;
            background: #FEF7F8;
            color: #F13F82;
            &:hover {
                background: #FF003924;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="hero-input ">
            <div class="hero-title">
                <h1>Enter Your Data</h1>
            </div>

            <?php 
            $id = $_GET['id'];
            $query = mysqli_query($koneksi, "SELECT * FROM tamu WHERE id_tamu = '$id'; ");
            while ($data = mysqli_fetch_assoc($query)) {
            ?>

            <form action="" method="POST" class="grid">
                
                <input type="hidden" name="id_tamu" value="<?php echo $id?>">
                <!-- input : Username -->   
                <div class="form-grup">
                    <label for="name">Full Name</label >
                    <input type="text" name="name" value="<?php echo $data["nama_tamu"]?>" id="name" class="inputs name" placeholder="Enter Your Full Name Here" required />
                </div>

                <!-- input : Phone Number -->
                <div class="form-grup">
                    <label for="phoneNumber">Phone Number</label >
                    <input type="tel" name="phoneNumber" value="<?php echo $data["no_hp"]?>" id="phoneNumber" class="inputs number" placeholder="Enter Your Number Here" required />
                </div>
                
                <!-- input : Email -->
                <div class="form-grup">
                    <label for="email">Email</label >
                    <input type="email" name="email" value="<?php echo $data["email"]?>" id="email" class="inputs email" placeholder="Enter Your Email Here" required />
                </div>
                
                <!-- input : Address -->
                <div class="form-grup">
                    <label for="address">Address</label >
                    <textarea name="address" id="address" class="inputs address" placeholder="Enter Your Address Here" required><?php echo $data["nama_tamu"]?></textarea>
                </div>

                <!-- input : Message -->
                <div class="form-grup">
                    <label for="message">Message</label >
                    <textarea name="message" id="message" class="inputs message" placeholder="Enter Your Message Here" required><?php echo $data["nama_tamu"]?></textarea>
                </div>
                
                <!-- button : submit -->
                <div class="hero-submit">
                    <button type="submit" name="BtnUpdate" class="btn-update"> Update Data</button>
                    <!-- <button type="button" name="btnDelete" class="btn-delete">Delete Data </button> -->
                </div>

            </form>

            <?php }?>
        </div>
    </div>

    <?php 
include 'koneksi.php';

if (isset($_POST['BtnUpdate'])) {
    // ambil data form
    $id_tamu  = mysqli_real_escape_string($koneksi, $_POST['id_tamu']);
    $nama_tamu  = mysqli_real_escape_string($koneksi, $_POST['name']);
    $no_hp      = mysqli_real_escape_string($koneksi, $_POST['phoneNumber']);
    $email      = mysqli_real_escape_string($koneksi, $_POST['email']);
    $alamat     = mysqli_real_escape_string($koneksi, $_POST['address']);
    $ucapan     = mysqli_real_escape_string($koneksi, $_POST['message']);


    // validasi sederhana
    if ( empty($nama_tamu) || empty($no_hp) || empty($email)) {

        $status = "empty";

    } else {

        // query update
        $query = "
            UPDATE tamu SET
                nama_tamu = '$nama_tamu',
                no_hp      = '$no_hp',
                email      = '$email',
                alamat     = '$alamat',
                ucapan     = '$ucapan'
            WHERE id_tamu = '$id_tamu'
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