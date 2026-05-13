<?php

header('Content-Type: application/json');

include __DIR__ . '/connection.php';

$sql = "SELECT nama_tamu, ucapan, created_at
        FROM rsvp
        ORDER BY id_tamu DESC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo json_encode([
        "status" => "error",
        "message" => mysqli_error($conn)
    ]);
    exit;
}

$comments = [];

while ($row = mysqli_fetch_assoc($result)) {

    $comments[] = [

        "name" => htmlspecialchars($row['nama_tamu']),

        "ucapan" => htmlspecialchars($row['ucapan']),

        "date" => date(
            "d F Y • H:i:s",
            strtotime($row['created_at'])
        )
    ];
}

echo json_encode($comments);

mysqli_close($conn);

?>