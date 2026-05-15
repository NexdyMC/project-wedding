<?php
$array = [ "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n",
 "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z" ];
 
$cuid = "";

for ($i = 0 ; $i < 12 ; $i++) {
    // Tentukan apakah mau huruf (1) atau angka (0)
    $biner_x = rand(0, 1);
    $biner_y = rand(0, 1);
    $indexHuruf = rand(0, 25);

    //  true : huruf
    if ($biner_x == 1) {
        $indexHuruf = rand(0, 25); // Panggil sekali di sini
        if ($biner_y == 1) {
            $cuid .= strtoupper($array[$indexHuruf]);
        } else {
            $cuid .= $array[$indexHuruf];
        }
    } else {
        $cuid .= rand(0, 9); 
    }
}


?>