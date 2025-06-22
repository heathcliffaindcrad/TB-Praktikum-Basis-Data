<?php
include 'koneksi.php';

$kode = $_GET['kode'];

// Cek apakah kamar sedang digunakan di tabel reservasi
$cek = mysqli_query($koneksi, "SELECT * FROM reservasi WHERE kode_kamar = '$kode'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>
        alert('Kamar tidak dapat dihapus karena sedang digunakan dalam reservasi.');
        window.location.href = 'kelola_kamar.php';
    </script>";
    exit;
}

// Jika tidak digunakan, hapus kamar
mysqli_query($koneksi, "DELETE FROM kamar WHERE kode_kamar='$kode'");
header("Location: kelola_kamar.php");
?>
