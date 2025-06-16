<?php
include 'koneksi.php';

$kode_lama = $_POST['kode_lama'];
$kode = $_POST['kode_kamar'];
$tipe = $_POST['tipe_kamar'];
$fasilitas = $_POST['fasilitas'];
$harga = $_POST['harga'];

// Cek apakah kode kamar diubah
if ($kode_lama != $kode) {
    // Cek apakah kamar lama digunakan di reservasi
    $cek_reservasi = mysqli_query($koneksi, "SELECT * FROM reservasi WHERE kode_kamar = '$kode_lama'");
    
    if (mysqli_num_rows($cek_reservasi) > 0) {
        echo "<script>
            alert('Kode kamar tidak dapat diubah karena kamar sedang digunakan dalam reservasi.');
            window.location.href = 'kelola_kamar.php';
        </script>";
        exit;
    }
}

// Jika tidak digunakan atau kode tidak diubah, lakukan update
$query = "UPDATE kamar SET 
          kode_kamar='$kode', 
          tipe_kamar='$tipe', 
          fasilitas='$fasilitas', 
          harga='$harga' 
          WHERE kode_kamar='$kode_lama'";

if (mysqli_query($koneksi, $query)) {
    header("Location: kelola_kamar.php");
} else {
    echo "<script>
        alert('Gagal mengupdate kamar: " . addslashes(mysqli_error($koneksi)) . "');
        window.location.href = 'kelola_kamar.php';
    </script>";
}
?>