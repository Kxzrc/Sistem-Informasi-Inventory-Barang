<?php
$host = "localhost"; // Ganti jika database Anda tidak di localhost
$username = "root"; // Ganti dengan username database Anda
$password = "";     // Ganti dengan password database Anda
$database = "db_inventory";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// echo "Koneksi berhasil!"; // Un-comment baris ini untuk mengetes koneksi
?>