<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama_pelanggan'];
$ktp = $_POST['nomor_ktp'];
$alamat = $_POST['alamat'];
$jk = $_POST['jenis_kelamin'];
$kode_kamar_baru = $_POST['kode_kamar'];
$checkin = $_POST['check_in'];
$checkout = $_POST['check_out'];
$biaya = $_POST['biaya_sewa'];

// Ambil kode kamar lama sebelum diupdate
$query_kamar_lama = mysqli_query($koneksi, "SELECT kode_kamar FROM reservasi WHERE id='$id'");
$data_kamar_lama = mysqli_fetch_assoc($query_kamar_lama);
$kode_kamar_lama = $data_kamar_lama['kode_kamar'];

// Mulai transaction
mysqli_begin_transaction($koneksi);

try {
    // Update reservasi
    $query = "UPDATE reservasi SET 
                nama_pelanggan='$nama', 
                nomor_ktp='$ktp', 
                alamat='$alamat', 
                jenis_kelamin='$jk', 
                kode_kamar='$kode_kamar_baru', 
                check_in='$checkin', 
                check_out='$checkout', 
                biaya_sewa='$biaya' 
              WHERE id='$id'";

    if (!mysqli_query($koneksi, $query)) {
        throw new Exception("Gagal update reservasi: " . mysqli_error($koneksi));
    }

    // Jika kamar diubah
    if ($kode_kamar_lama != $kode_kamar_baru) {
        // Update status kamar lama menjadi tersedia
        mysqli_query($koneksi, "UPDATE kamar SET status='tersedia' WHERE kode_kamar='$kode_kamar_lama'");
        
        // Update status kamar baru menjadi terisi
        mysqli_query($koneksi, "UPDATE kamar SET status='terisi' WHERE kode_kamar='$kode_kamar_baru'");
    }

    // Commit transaction
    mysqli_commit($koneksi);
    header("Location: kelola_reservasi.php");
    
} catch (Exception $e) {
    // Rollback transaction jika ada error
    mysqli_rollback($koneksi);
    echo "Error: " . $e->getMessage();
}
?>