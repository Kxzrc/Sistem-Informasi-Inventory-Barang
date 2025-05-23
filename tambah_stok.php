<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_barang = mysqli_real_escape_string($koneksi, $_GET['id']);
    $query = "SELECT id_barang, nama_barang, jumlah_barang, status_barang FROM tb_inventory WHERE id_barang = $id_barang";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        echo "<p>Data barang tidak ditemukan.</p>";
        exit();
    }
} else {
    echo "<p>ID barang tidak valid.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Stok Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Stok Barang</h2>
        <hr>
        <nav class="mb-3">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="data_barang.php">Data Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tambah_barang.php">Tambah Barang</a>
                </li>
            </ul>
        </nav>

        <h3><?php echo $data['nama_barang']; ?></h3>
        <p>Stok saat ini: <?php echo $data['jumlah_barang']; ?></p>
        <?php if (!$data['status_barang']): ?>
            <p class="text-warning">Status barang saat ini: Not-Available</p>
        <?php endif; ?>

        <form action="proses_tambah_stok.php" method="POST">
            <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
            <input type="hidden" name="stok_lama" value="<?php echo $data['jumlah_barang']; ?>">
            <input type="hidden" name="status_lama" value="<?php echo $data['status_barang']; ?>">
            <div class="mb-3">
                <label for="jumlah_tambah" class="form-label">Jumlah yang Ditambahkan</label>
                <input type="number" class="form-control" id="jumlah_tambah" name="jumlah_tambah" min="1" required>
                <div id="jumlahTambahHelp" class="form-text">Masukkan jumlah stok yang akan ditambahkan.</div>
            </div>
            <button type="submit" class="btn btn-success">Tambah Stok</button>
            <a href="data_barang.php" class="btn btn-secondary ms-2">Batal</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
<?php
mysqli_close($koneksi);
?>