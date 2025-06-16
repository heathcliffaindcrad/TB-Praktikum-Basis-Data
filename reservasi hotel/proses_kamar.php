<?php
include 'koneksi.php';

$kode     = $_POST['kode_kamar'];
$tipe     = $_POST['tipe_kamar'];
$fasilitas = $_POST['fasilitas'];
$harga    = $_POST['harga'];

$query = "INSERT INTO kamar (kode_kamar, tipe_kamar, fasilitas, harga) 
          VALUES ('$kode', '$tipe', '$fasilitas', '$harga')";

if (mysqli_query($koneksi, $query)) {
    echo "Kamar berhasil ditambahkan. <a href='index.php'>Kembali</a>";
} else {
    echo "Gagal menambahkan kamar: " . mysqli_error($koneksi);
}
?>
