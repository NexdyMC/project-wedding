<?php
include 'app/koneksi.php';

if (isset($_GET['keyword'])) {

    $keyword = "%" . $_GET['keyword'] . "%";

    $stmt = $koneksi->prepare("SELECT * FROM tamu WHERE nama_tamu LIKE ?");
    $stmt->bind_param("s", $keyword);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($data = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $data['nama_tamu'] . "</td>";
        echo "<td>" . $data['no_hp'] . "</td>";
        echo "<td>" . $data['alamat'] . "</td>";
        echo "<td>" . $data['ucapan'] . "</td>";
        echo "<td>" . $data['keterangan'] . "</td>";
        echo "<td>" . $data['email'] . "</td>";
        echo "<td>" . $data['waktu_datang'] . "</td>";
        echo "<td>
            <a href='edit.php?id=" . $data['id_tamu'] . "' style='display:flex;justify-content:center;'>
                <span class='material-symbols-outlined icon'>edit</span>
            </a>
        </td>";
        echo "</tr>";
    }
}
?>