<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_barang = mysqli_real_escape_string($koneksi, $_POST['kode_barang']);
    $nama_barang = mysqli_real_escape_string($koneksi, $_POST['nama_barang']);
    $jumlah_barang = mysqli_real_escape_string($koneksi, $_POST['jumlah_barang']);
    $satuan_barang = mysqli_real_escape_string($koneksi, $_POST['satuan_barang']);
    $harga_beli = mysqli_real_escape_string($koneksi, $_POST['harga_beli']);
    $status_barang = mysqli_real_escape_string($koneksi, $_POST['status_barang']);

    $query = "INSERT INTO tb_inventory (kode_barang, nama_barang, jumlah_barang, satuan_barang, harga_beli, status_barang)
              VALUES ('$kode_barang', '$nama_barang', $jumlah_barang, '$satuan_barang', $harga_beli, $status_barang)";

    if (mysqli_query($koneksi, $query)) {
        header("Location: data_barang.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>