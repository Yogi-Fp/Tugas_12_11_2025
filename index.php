<?php
include 'koneksi.php';

// Ambil parameter pencarian
$cari = isset($_GET['cari']) ? $_GET['cari'] : '';

// Query pencarian
$query = "SELECT * FROM barang";
if ($cari != '') {
    $query .= " WHERE kode_barang LIKE '%$cari%' OR nama_barang LIKE '%$cari%'";
}
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>CRUD Data Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .container {
            background: #fff;
            padding: 20px;
            max-width: 800px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        form {
            margin-bottom: 15px;
            text-align: center;
        }

        input[type=text] {
            padding: 8px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type=text]:focus {
            outline: none;
            border-color: #007BFF;
        }

        input[type=submit],
        a.button {
            padding: 8px 15px;
            background: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        input[type=submit]:hover,
        a.button:hover {
            background: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background: #007BFF;
            color: #fff;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        .no-data {
            text-align: center;
            padding: 10px;
            color: #666;
        }

        .btn-edit {
            background: green;
            color: #fff;
            border-radius: 6px;
            padding: 6px 12px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-edit:hover {
            background: darkgreen;
        }

        .btn-hapus {
            background: #dc3545;
            color: #fff;
            border-radius: 6px;
            padding: 6px 12px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-hapus:hover {
            background: #bd2130;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Data Barang</h1>

        <form method="GET">
            <input type="text" name="cari" placeholder="Cari barang..." value="<?= htmlspecialchars($cari) ?>">
            <input type="submit" value="Cari">
            <a href="tambah.php" class="button">Tambah Data</a>
        </form>

        <table>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Aksi</th>
            </tr>

            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['kode_barang']) ?></td>
                        <td><?= htmlspecialchars($row['nama_barang']) ?></td>
                        <td>Rp <?= number_format($row['harga_barang'], 0, ',', '.') ?></td>
                        <td>
                            <a href="edit.php?kode_barang=<?= urlencode($row['kode_barang']) ?>" class="btn-edit">Edit</a>
                            <a href="hapus.php?kode_barang=<?= urlencode($row['kode_barang']) ?>" class="btn-hapus"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="no-data">Tidak ada data ditemukan</td>
                </tr>
            <?php endif; ?>
        </table>

    </div>
</body>

</html>
