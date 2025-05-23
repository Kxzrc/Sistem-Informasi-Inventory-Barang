<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_barang = mysqli_real_escape_string($koneksi, $_POST['id_barang']);
    $kode_barang = mysqli_real_escape_string($koneksi, $_POST['kode_barang']);
    $nama_barang = mysqli_real_escape_string($koneksi, $_POST['nama_barang']);
    $jumlah_barang = mysqli_real_escape_string($koneksi, $_POST['jumlah_barang']);
    $satuan_barang = mysqli_real_escape_string($koneksi, $_POST['satuan_barang']);
    $harga_beli = mysqli_real_escape_string($koneksi, $_POST['harga_beli']);
    $status_barang = mysqli_real_escape_string($koneksi, $_POST['status_barang']);

    $query = "UPDATE tb_inventory SET
              kode_barang = '$kode_barang',
              nama_barang = '$nama_barang',
              jumlah_barang = $jumlah_barang,
              satuan_barang = '$satuan_barang',
              harga_beli = $harga_beli,
              status_barang = $status_barang
              WHERE id_barang = $id_barang";

    if (mysqli_query($koneksi, $query)) {
        header("Location: data_barang.php");
    } else {
        echo "Error updating record: " . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>