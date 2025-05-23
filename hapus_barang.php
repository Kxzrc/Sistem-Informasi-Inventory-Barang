<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_barang = mysqli_real_escape_string($koneksi, $_GET['id']);

    $query = "DELETE FROM tb_inventory WHERE id_barang = $id_barang";

    if (mysqli_query($koneksi, $query)) {
        // Berhasil menghapus, redirect kembali ke data barang dengan pesan sukses
        header("Location: data_barang.php?hapus=sukses");
        exit();
    } else {
        // Gagal menghapus, tampilkan pesan error
        echo "Error deleting record: " . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
} else {
    // Jika tidak ada ID yang diterima
    echo "ID barang tidak valid.";
}
?>