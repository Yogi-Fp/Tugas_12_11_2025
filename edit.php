<?php
include 'koneksi.php';

// Ambil kode barang dari URL
$kode_barang = $_GET['kode_barang'];

// Ambil data dari tabel barang
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM barang WHERE kode_barang='$kode_barang'"));

// Jika data tidak ditemukan
if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}

// Proses update data jika tombol diklik
if (isset($_POST['update'])) {
    $nama_barang = $_POST['nama_barang'];
    $harga_barang = $_POST['harga_barang'];

    $update = mysqli_query($koneksi, "UPDATE barang 
                                      SET nama_barang='$nama_barang', harga_barang='$harga_barang' 
                                      WHERE kode_barang='$kode_barang'");

    if ($update) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            background: #fff;
            padding: 20px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        input[type=text],
        input[type=number] {
            width: 95%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }


        input[type=text]:focus,
        input[type=number]:focus {
            outline: none;
            border-color: #007BFF;
        }

        input[type=submit] {
            background: blue;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        input[type=submit]:hover {
            background: #0056b3;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            margin-left: 10px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Data Barang</h2>
        <form method="POST">
            <label>Kode Barang:</label><br>
            <input type="text" name="kode_barang" value="<?= $data['kode_barang'] ?>" readonly><br>

            <label>Nama Barang:</label><br>
            <input type="text" name="nama_barang" value="<?= $data['nama_barang'] ?>" required><br>

            <label>Harga Barang:</label><br>
            <input type="number" name="harga_barang" value="<?= $data['harga_barang'] ?>" required><br>

            <input type="submit" name="update" value="Update">
            <a href="index.php">Kembali</a>
        </form>
    </div>
</body>

</html>
