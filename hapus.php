<?php
include 'koneksi.php';

if (isset($_GET['kode_barang'])) {
    $kode_barang = $_GET['kode_barang'];

    $hapus = mysqli_query($koneksi, "DELETE FROM barang WHERE kode_barang='$kode_barang'");

    if ($hapus) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location='index.php';</script>";
    }
} else {
    echo "<script>alert('Kode barang tidak ditemukan!'); window.location='index.php';</script>";
}
?>
