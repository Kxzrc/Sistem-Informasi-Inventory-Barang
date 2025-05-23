<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_barang = mysqli_real_escape_string($koneksi, $_POST['id_barang']);
    $jumlah_pakai = mysqli_real_escape_string($koneksi, $_POST['jumlah_pakai']);
    $stok_lama = mysqli_real_escape_string($koneksi, $_POST['stok_lama']);

    if ($jumlah_pakai > $stok_lama) {
        echo "<script>alert('Jumlah pemakaian melebihi stok yang ada!'); window.location.href='pakai_barang.php?id=$id_barang';</script>";
        exit();
    }

    $jumlah_baru = $stok_lama - $jumlah_pakai;
    $status_baru = 1; // Default: Available

    if ($jumlah_baru == 0) {
        $status_baru = 0; // Not-Available
    }

    $query = "UPDATE tb_inventory SET jumlah_barang = $jumlah_baru, status_barang = $status_baru WHERE id_barang = $id_barang";

    if (mysqli_query($koneksi, $query)) {
        header("Location: data_barang.php?pakai=sukses");
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