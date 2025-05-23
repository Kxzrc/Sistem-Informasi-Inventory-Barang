<?php
include 'koneksi.php';

// Pastikan koneksi berhasil sebelum melanjutkan
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM tb_inventory";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Data Barang</h2>
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

        <a href="tambah_barang.php" class="btn btn-primary mb-3">Tambah Barang</a>

        <table id="dataBarang" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Harga Beli</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id_barang']; ?></td>
                            <td><?php echo $row['kode_barang']; ?></td>
                            <td><?php echo $row['nama_barang']; ?></td>
                            <td><?php echo $row['jumlah_barang']; ?></td>
                            <td><?php echo $row['satuan_barang']; ?></td>
                            <td><?php echo number_format($row['harga_beli'], 2); ?></td>
                            <td><?php echo $row['status_barang'] ? 'Available' : 'Not-Available'; ?></td>
                            <td>
                                <a href="edit_barang.php?id=<?php echo $row['id_barang']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="hapus_barang.php?id=<?php echo $row['id_barang']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                <a href="pakai_barang.php?id=<?php echo $row['id_barang']; ?>" class="btn btn-sm btn-info">Pakai</a>
                                <a href="tambah_stok.php?id=<?php echo $row['id_barang']; ?>" class="btn btn-sm btn-success">Tambah Stok</a>
                            </td>
                        </tr>
                        <?php
                    }
                    mysqli_free_result($result); // Bebaskan memory hasil query
                } else {
                    echo "<tr><td colspan='8'>Tidak ada data barang.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#dataBarang').DataTable();
        } );
    </script>
    <script src="js/script.js"></script>
</body>
</html>
<?php
mysqli_close($koneksi);
?>