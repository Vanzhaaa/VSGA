<?php
$servername = "localhost";
$database = "tsa_web";
$username = "root";
$password = "";
$connect = new mysqli($servername, $username, $password, $database);
if ($connect->connect_error) {
    die("Koneksi gagal: " . $connect->connect_error);
}
echo "Koneksi berhasil";
?>
