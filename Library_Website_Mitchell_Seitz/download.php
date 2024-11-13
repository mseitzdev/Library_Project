<?php 

/*
download.php

Programmed by Mitchell Seitz, Nov 13 2024. 

Based on:
https://github.com/karolispx/php-generate-json-file/blob/master/generate-json.php

Thank you Karolispx!

*/

session_start();

// Force download .json file with JSON in it
header("Content-type: application/vnd.ms-excel");
header("Content-Type: application/force-download");
header("Content-Type: application/download");
header("Content-disposition: Inentory" . $_SESSION['fileName'] . ".json");
header("Content-disposition: filename= Inventory" . $_SESSION['fileName'] ." .json");

print $_SESSION['json'];
exit;
?>