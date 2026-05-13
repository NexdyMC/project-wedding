<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "wedding_db";

$conn = mysqli_connect(
    $host,
    $user,
    $password,
    $database
);

if (!$conn) {

    header('Content-Type: application/json');

    echo json_encode([
        "status" => "error",
        "message" => mysqli_connect_error()
    ]);

    exit;
}

mysqli_set_charset($conn, "utf8mb4");

?>