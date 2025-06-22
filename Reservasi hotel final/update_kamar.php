<?php
include 'koneksi.php';

$kode_lama = $_POST['kode_lama'];
$kode_baru = $_POST['kode_kamar'];
$tipe = $_POST['tipe_kamar'];
$fasilitas = $_POST['fasilitas'];
$harga = $_POST['harga'];

// Cek jika kode baru sudah digunakan (kecuali kode lama)
if ($kode_baru != $kode_lama) {
    $cek = mysqli_query($koneksi, "SELECT * FROM kamar WHERE kode_kamar = '$kode_baru'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>
            alert('Kode kamar sudah digunakan. Silakan gunakan kode yang berbeda.');
            window.history.back();
        </script>";
        exit;
    }
}

// Update data jika kode unik
$query = "UPDATE kamar SET 
          kode_kamar = '$kode_baru',
          tipe_kamar = '$tipe',
          fasilitas = '$fasilitas',
          harga = '$harga'
          WHERE kode_kamar = '$kode_lama'";

if (mysqli_query($koneksi, $query)) {
    header("Location: kelola_kamar.php");
} else {
    echo "<script>
        alert('Gagal mengupdate kamar: " . mysqli_error($koneksi) . "');
        window.history.back();
    </script>";
}
?>