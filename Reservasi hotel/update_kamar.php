<?php
include 'koneksi.php';

$kode_lama = $_POST['kode_lama'];
$kode = $_POST['kode_kamar'];
$tipe = $_POST['tipe_kamar'];
$fasilitas = $_POST['fasilitas'];
$harga = $_POST['harga'];

$query = "UPDATE kamar SET 
          kode_kamar='$kode', 
          tipe_kamar='$tipe', 
          fasilitas='$fasilitas', 
          harga='$harga' 
          WHERE kode_kamar='$kode_lama'";

if (mysqli_query($koneksi, $query)) {
    header("Location: kelola_kamar.php");
} else {
    echo "Gagal update: " . mysqli_error($koneksi);
}
?>
