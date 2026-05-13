<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include __DIR__ . '/connection.php';

header('Content-Type: application/json');

// include 'connection.php';


$name = htmlspecialchars(trim($_POST['name']));
$address = htmlspecialchars(trim($_POST['address']));
$attendance = htmlspecialchars(trim($_POST['attendance']));
$ucapan = htmlspecialchars(trim($_POST['ucapan']));
$email = htmlspecialchars(trim($_POST['email']));
$no_hp = htmlspecialchars(trim($_POST['no_hp']));


if (
    empty($name) ||
    empty($address) ||
    empty($attendance)
) {

    echo json_encode([
        "status" => "error",
        "message" => "Data wajib diisi!"
    ]);

    exit;
}

$allowedAttendance = [
    "Present",
    "Not Present",
    "Still in doubt"
];

if (!in_array($attendance, $allowedAttendance)) {
    echo json_encode([
        "status" => "error",
        "message" => "Attendance tidak valid!"
    ]);

    exit;
}



// Siapkan statement

$sql = "INSERT INTO rsvp
(nama_tamu, alamat, attendance, ucapan, email, no_hp)

VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);


if (!$stmt) {

    echo json_encode([
        "status" => "error",
        "message" => "Prepare statement gagal!"
    ]);

    exit;
}


// masukan statement

mysqli_stmt_bind_param(
    $stmt,
    "ssssss",
    $name,
    $address,
    $attendance,
    $ucapan,
    $email,
    $no_hp
);


if (mysqli_stmt_execute($stmt)) {

    echo json_encode([
        "status" => "success",
        "message" => "RSVP berhasil dikirim!"
    ]);

} else {

    echo json_encode([
        "status" => "error",
        "message" => "Gagal menyimpan RSVP!"
    ]);

}


mysqli_stmt_close($stmt);

mysqli_close($conn);

?>