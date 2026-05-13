<?php 
$file = basename($_SERVER['PHP_SELF'], ".php");

$nama = str_replace("-", " ", $file);

if ($nama == "index") {
    $title = "Home";   
} else if ($nama == "login") {
    $title = "Login";
} else if ($nama == "edit") {
    $title = "Edit | Recent Attendance";
} else if ($nama == "register") {
    $title = "Registel Mail";
}
else {
    $title = ucwords($nama) . " | Wedding";   
}

?>
