<?php
include 'project-guestbook/app/cuid.php';

// 1. Header JSON (Cukup Satu Saja)
header('Content-Type: application/json');

// 2. Koneksi ke database Laragon kamu
$conn = new mysqli("localhost", "root", "", "db_guest_book");

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Koneksi gagal: " . $conn->connect_error]));
}

// 3. Tangkap Argumen dari URL
$select = $_GET['select'] ?? null;
$insert = $_GET['insert'] ?? null;
$update = $_GET['update'] ?? null;
$delete = $_GET['delete'] ?? null; 

// ==========================================
// LOGIKA 1: SELECT (Mengambil Data)
// ==========================================
if ($select) {
    // Menyesuaikan parameter ID berdasarkan tabel yang di-select
    $id_petugas = $_GET['id_petugas'] ?? null;
    $id_tamu    = $_GET['id_tamu'] ?? null;

    $query = "SELECT * FROM $select";
    
    // Perbaikan Otomatis: Menentukan nama kolom ID yang benar sesuai tabel
    if ($select == 'petugas' && $id_petugas) {
        $query .= " WHERE id_petugas = $id_petugas";
    } elseif ($select == 'tamu' && $id_tamu) {
        $query .= " WHERE id_tamu = $id_tamu";
    }
    
    $result = $conn->query($query);
    if ($result) {
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    } else {
        echo json_encode(["status" => "error", "error_mysql" => $conn->error]);
    }
}

// ==========================================
// LOGIKA 2: INSERT (Memasukkan Data)
// ==========================================
if ($insert == 'petugas') {
    $nama_petugas = $_GET['nama'] ?? null;
    $username     = $_GET['username'] ?? null;
    $password     = $_GET['password'] ?? null;

    if ($nama_petugas && $username && $password) {
        $query = "INSERT INTO petugas (nama_petugas, username, password) 
                  VALUES ('$nama_petugas', '$username', '$password')";
        
        if ($conn->query($query) === TRUE) {
            echo json_encode([
                "status" => "success", 
                "message" => "Data petugas baru berhasil dimasukkan!"
            ]);
        } else {
            echo json_encode(["status" => "error", "error_mysql" => $conn->error]);
        }
    } else {
        echo json_encode([
            "status" => "error", 
            "message" => "Gagal! Argumen nama, username, atau password ada yang kosong."
        ]);
    }
}
else if ($insert == 'tamu') {
    $nama_tamu = $_GET['nama'] ?? null;
    $no        = $_GET['no'] ?? null;
    $alamat    = $_GET['alamat'] ?? null;
    $ucapan    = $_GET['ucapan'] ?? null;
    $email     = $_GET['email'] ?? null;
    
    // Logika Waktu & Kehadiran otomatis
    $waktu_datang   = date('Y-m-d H:i:s');
    $waktu_sekarang = strtotime(date('H:i:s'));
    $batas_waktu    = strtotime("11:30:00");
    
    if ($waktu_sekarang < $batas_waktu) {
        $attendance = "hadir";
    } else {
        $attendance = "tidak_hadir";
    }

    if ($nama_tamu && $no && $alamat && $ucapan) {
        $query = "INSERT INTO tamu (nama_tamu, no_hp, alamat, ucapan, attendance, email, waktu_datang) 
                  VALUES ('$nama_tamu', '$no', '$alamat', '$ucapan', '$attendance', '$email', '$waktu_datang')";
        
        if ($conn->query($query) === TRUE) {
            echo json_encode([
                "status" => "success", 
                "message" => "Data tamu baru berhasil dimasukkan!" // Sudah diperbaiki teksnya
            ]);
        } else {
            echo json_encode(["status" => "error", "error_mysql" => $conn->error]);
        }
    } else {
        echo json_encode([
            "status" => "error", 
            "message" => "Gagal! Argumen nama, no, alamat, atau ucapan ada yang kosong."
        ]);
    }
}

// ==========================================
// LOGIKA 3: UPDATE (Mengubah Data)
// ==========================================
if ($update == 'petugas') {
    // Tangkap ID yang mau di-update dan data barunya
    $id           = $_GET['id_petugas'] ?? null;
    $nama_petugas = $_GET['nama'] ?? null;
    $username     = $_GET['username'] ?? null;
    $password     = $_GET['password'] ?? null;

    // Pastikan ID dan data yang mau diubah tidak kosong
    if ($id && $nama_petugas && $username && $password) {
        $query = "UPDATE petugas SET 
                  nama_petugas = '$nama_petugas', 
                  username = '$username', 
                  password = '$password' 
                  WHERE id_petugas = $id";
        
        if ($conn->query($query) === TRUE) {
            echo json_encode([
                "status" => "success", 
                "message" => "Data petugas dengan ID $id berhasil diperbarui!"
            ]);
        } else {
            echo json_encode(["status" => "error", "error_mysql" => $conn->error]);
        }
    } else {
        echo json_encode([
            "status" => "error", 
            "message" => "Gagal! Argumen id_petugas, nama, username, atau password ada yang kosong."
        ]);
    }
}
else if ($update == 'tamu') {
    // Tangkap ID tamu dan data barunya
    $id        = $_GET['id_tamu'] ?? null;
    $nama_tamu = $_GET['nama'] ?? null;
    $no        = $_GET['no'] ?? null;
    $alamat    = $_GET['alamat'] ?? null;
    $ucapan    = $_GET['ucapan'] ?? null;
    $email     = $_GET['email'] ?? null;

    if ($id && $nama_tamu && $no && $alamat && $ucapan) {
        $query = "UPDATE tamu SET 
                  nama_tamu = '$nama_tamu', 
                  no_hp = '$no', 
                  alamat = '$alamat', 
                  ucapan = '$ucapan', 
                  email = '$email' 
                  WHERE id_tamu = $id";
        
        if ($conn->query($query) === TRUE) {
            echo json_encode([
                "status" => "success", 
                "message" => "Data tamu dengan ID $id berhasil diperbarui!"
            ]);
        } else {
            echo json_encode(["status" => "error", "error_mysql" => $conn->error]);
        }
    } else {
        echo json_encode([
            "status" => "error", 
            "message" => "Gagal! Argumen id_tamu, nama, no, alamat, atau ucapan ada yang kosong."
        ]);
    }
}

// ==========================================
// LOGIKA 4: DELETE (Menghapus Data)
// ==========================================
if ($delete == 'petugas') {
    $id = $_GET['id'] ?? null;

    if ($id) {
        $query = "DELETE FROM petugas WHERE id_petugas = $id";
        
        if ($conn->query($query) === TRUE) {
            if ($conn->affected_rows > 0) {
                echo json_encode([
                    "status" => "success",
                    "message" => "Data petugas dengan ID $id berhasil dihapus!"
                ]);
            } else {
                echo json_encode([
                    "status" => "failed",
                    "message" => "Tidak ada data yang dihapus. ID $id tidak ditemukan."
                ]);
            }
        } else {
            echo json_encode(["status" => "error", "error_mysql" => $conn->error]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal! Parameter 'id' harus diisi."]);
    }
}
else if ($delete == 'tamu') {
    $id = $_GET['id'] ?? null;

    if ($id) {
        $query = "DELETE FROM tamu WHERE id_tamu = $id";
        
        if ($conn->query($query) === TRUE) {
            if ($conn->affected_rows > 0) {
                echo json_encode([
                    "status" => "success",
                    "message" => "Data tamu dengan ID $id berhasil dihapus!"
                ]);
            } else {
                echo json_encode([
                    "status" => "failed",
                    "message" => "Tidak ada data yang dihapus. ID $id tidak ditemukan."
                ]);
            }
        } else {
            echo json_encode(["status" => "error", "error_mysql" => $conn->error]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal! Parameter 'id' harus diisi."]);
    }
}

$conn->close();
?>