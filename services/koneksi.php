<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "ams";

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    echo "Koneksi gagal: " . mysqli_connect_error();
    exit();
}
?>
