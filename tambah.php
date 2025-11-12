<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $harga_barang = $_POST['harga_barang'];

    // Cek apakah kode barang sudah ada
    $cek = mysqli_query($koneksi, "SELECT * FROM barang WHERE kode_barang='$kode_barang'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Kode barang sudah terdaftar!'); window.location='tambah.php';</script>";
    } else {
        // Simpan data ke tabel barang
        $query = mysqli_query($koneksi, "INSERT INTO barang (kode_barang, nama_barang, harga_barang)
                                         VALUES ('$kode_barang', '$nama_barang', '$harga_barang')");
        if ($query) {
            echo "<script>alert('Data berhasil disimpan!'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan data!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Barang</title>
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
            input[type=number],
            textarea {
            width: 90%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type=text]:focus,
        input[type=number]:focus,
        textarea:focus {
            outline: none;
            border-color: #007BFF;
        }
        
        
        

        input[type=submit] {
            background: #007BFF;
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
            color: blue;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Tambah Data Barang</h2>
        <form method="POST">
            <label>Kode Barang :</label><br>
            <input type="text" name="kode_barang" required><br>
            <label>Nama Barang:</label><br>
            <input type="text" name="nama_barang" required><br>
            <label>Harga Barang:</label><br>
            <input type="number" name="harga_barang" required><br>
            <input type="submit" name="simpan" value="Simpan">
            <a href="index.php">Kembali</a>
        </form>
    </div>
</body>

</html>
