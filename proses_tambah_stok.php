<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_barang = mysqli_real_escape_string($koneksi, $_POST['id_barang']);
    $jumlah_tambah = mysqli_real_escape_string($koneksi, $_POST['jumlah_tambah']);
    $stok_lama = mysqli_real_escape_string($koneksi, $_POST['stok_lama']);
    $status_lama = mysqli_real_escape_string($koneksi, $_POST['status_lama']);

    $jumlah_baru = $stok_lama + $jumlah_tambah;
    $status_baru = $status_lama; // Status awal

    // Jika stok awal 0 dan status Not-Available, setelah ditambahkan jadi Available
    if ($stok_lama == 0 && !$status_lama && $jumlah_tambah > 0) {
        $status_baru = 1; // Available
    } elseif ($jumlah_baru > 0) {
        $status_baru = 1; // Jika setelah ditambah stoknya lebih dari 0, set Available
    }

    $query = "UPDATE tb_inventory SET jumlah_barang = $jumlah_baru, status_barang = $status_baru WHERE id_barang = $id_barang";

    if (mysqli_query($koneksi, $query)) {
        header("Location: data_barang.php?tambah_stok=sukses");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
} else {
    header("Location: data_barang.php");
    exit();
}
?>