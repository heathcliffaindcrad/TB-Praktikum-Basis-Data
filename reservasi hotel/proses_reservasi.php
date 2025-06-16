<?php
include 'koneksi.php';

$nama      = $_POST['nama_pelanggan'];
$ktp       = $_POST['nomor_ktp'];
$alamat    = $_POST['alamat'];
$jk        = $_POST['jenis_kelamin'];
$kode      = $_POST['kode_kamar'];
$checkin   = $_POST['check_in'];
$checkout  = $_POST['check_out'];

// Hitung lama menginap
$start  = new DateTime($checkin);
$end    = new DateTime($checkout);
$lama   = $start->diff($end)->days;

// Ambil harga kamar
$queryKamar = mysqli_query($koneksi, "SELECT harga FROM kamar WHERE kode_kamar = '$kode'");
$dataKamar  = mysqli_fetch_assoc($queryKamar);
$harga      = $dataKamar['harga'];

// Hitung total biaya sewa
$total = $lama * $harga;

// Simpan ke database reservasi
$query = "INSERT INTO reservasi 
  (nama_pelanggan, nomor_ktp, alamat, jenis_kelamin, kode_kamar, check_in, check_out, biaya_sewa)
  VALUES 
  ('$nama', '$ktp', '$alamat', '$jk', '$kode', '$checkin', '$checkout', '$total')";

if (mysqli_query($koneksi, $query)) {
    // Jika insert reservasi berhasil, update status kamar jadi 'terisi'
    mysqli_query($koneksi, "UPDATE kamar SET status = 'terisi' WHERE kode_kamar = '$kode'");
    echo "Reservasi berhasil disimpan. <a href='index.php'>Kembali</a>";
} else {
    echo "Gagal menyimpan reservasi: " . mysqli_error($koneksi);
}
?>
