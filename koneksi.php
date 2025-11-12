<?php
$host = "localhost";     
$user = "root";        
$pass = "150620";
$db   = "ujian"; 

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die(" Koneksi gagal: " . mysqli_connect_error());
}

?>
