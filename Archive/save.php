<?php

//$file_open = fopen("text", "r+");
//
//while (!feof($file_open)) {
//    $get_info = fgets($file_open);
//
//    fwrite($file_open, "Petko/___/", 100);
//}
//fclose($file_open);
echo "<hr/>";
file_put_contents('text', [1,"labala"],FILE_APPEND);
$file = file("text", 0);

var_dump($file);
