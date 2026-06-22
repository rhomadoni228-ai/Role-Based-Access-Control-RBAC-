<?php
// config/koneksi.php

$host   = "localhost";
$user   = "root";
$pass   = "";
$dbname = "keamanan_data";

// koneksi
$conn = mysqli_connect($host, $user, $pass, $dbname);

// cek koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// timezone
date_default_timezone_set('Asia/Jakarta');

// charset
mysqli_set_charset($conn, "utf8");

// helper clean input
function clean($data){
    global $conn;
    return mysqli_real_escape_string($conn, trim($data));
}
?>