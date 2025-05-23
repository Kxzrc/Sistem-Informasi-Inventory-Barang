<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_barang = mysqli_real_escape_string($koneksi, $_GET['id']);
    $query = "SELECT * FROM tb_inventory WHERE id_barang = $id_barang";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        echo "<p>Data barang tidak ditemukan.</p>";
        exit();
    }

    $satuanOptions = ['kg', 'pcs', 'liter', 'meter', 'lainnya'];
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
    <title>Edit Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Barang</h2>
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

        <form action="proses_edit.php" method="POST">
            <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang / Barcode</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="<?php echo $data['kode_barang']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $data['nama_barang']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" value="<?php echo $data['jumlah_barang']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="satuan_barang" class="form-label">Satuan Barang</label>
                <select class="form-select" id="satuan_barang" name="satuan_barang" required>
                    <option value="">Pilih Satuan</option>
                    <?php
                    foreach ($satuanOptions as $satuan) {
                        $selected = ($data['satuan_barang'] == $satuan) ? 'selected' : '';
                        echo "<option value='$satuan' $selected>$satuan</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="number" step="0.01" class="form-control" id="harga_beli" name="harga_beli" value="<?php echo $data['harga_beli']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status Barang</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_barang" id="available" value="1" <?php echo $data['status_barang'] ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="available">Available</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_barang" id="not_available" value="0" <?php echo !$data['status_barang'] ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="not_available">Not-Available</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
<?php
mysqli_close($koneksi);
?>