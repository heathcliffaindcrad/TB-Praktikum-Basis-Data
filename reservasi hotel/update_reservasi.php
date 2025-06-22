<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama_pelanggan'];
$ktp = $_POST['nomor_ktp'];
$alamat = $_POST['alamat'];
$jk = $_POST['jenis_kelamin'];
$kode_kamar = $_POST['kode_kamar'];
$checkin = $_POST['check_in'];
$checkout = $_POST['check_out'];
$biaya = $_POST['biaya_sewa'];

$query = "UPDATE reservasi SET 
            nama_pelanggan='$nama', 
            nomor_ktp='$ktp', 
            alamat='$alamat', 
            jenis_kelamin='$jk', 
            kode_kamar='$kode_kamar', 
            check_in='$checkin', 
            check_out='$checkout', 
            biaya_sewa='$biaya' 
          WHERE id='$id'";


if (mysqli_query($koneksi, $query)) {
    header("Location: kelola_reservasi.php");
} else {
    echo "Gagal update: " . mysqli_error($koneksi);
}
?>
