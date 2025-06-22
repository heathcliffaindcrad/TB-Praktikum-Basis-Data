<?php
include 'koneksi.php';

$id = $_GET['id'];

// Ambil kode kamar dari reservasi yang akan dihapus
$result = mysqli_query($koneksi, "SELECT kode_kamar FROM reservasi WHERE id = '$id'");
$data = mysqli_fetch_assoc($result);
$kode_kamar = $data['kode_kamar'];

// Hapus data reservasi
mysqli_query($koneksi, "DELETE FROM reservasi WHERE id='$id'");

// Update status kamar menjadi 'tersedia' setelah reservasi dihapus
mysqli_query($koneksi, "UPDATE kamar SET status = 'tersedia' WHERE kode_kamar = '$kode_kamar'");

// Redirect kembali ke halaman kelola reservasi
header("Location: kelola_reservasi.php");
?>
