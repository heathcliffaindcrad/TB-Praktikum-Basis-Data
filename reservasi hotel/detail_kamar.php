<?php
include 'koneksi.php';

if (!isset($_GET['kode'])) {
  echo "Kode kamar tidak ditemukan.";
  exit;
}

$kode = $_GET['kode'];

// Ambil data kamar
$kamar = mysqli_query($koneksi, "SELECT * FROM kamar WHERE kode_kamar = '$kode'");
$data_kamar = mysqli_fetch_assoc($kamar);

if (!$data_kamar) {
  echo "Data kamar tidak ditemukan.";
  exit;
}

// Ambil data reservasi terkait
$reservasi = mysqli_query($koneksi, "SELECT * FROM reservasi WHERE kode_kamar = '$kode'");
?>

<h2>Detail Kamar: <?= $data_kamar['kode_kamar'] ?></h2>
<p><strong>Tipe:</strong> <?= $data_kamar['tipe_kamar'] ?></p>
<p><strong>Fasilitas:</strong> <?= $data_kamar['fasilitas'] ?></p>
<p><strong>Harga:</strong> Rp<?= number_format($data_kamar['harga']) ?></p>
<p><strong>Status:</strong> <?= $data_kamar['status'] ?></p>
<a href="index.php">Kembali</a>

<h3>Reservasi untuk kamar ini:</h3>
<table border="1" cellpadding="5">
  <tr>
    <th>Nama</th>
    <th>No KTP</th>
    <th>Check-in</th>
    <th>Check-out</th>
    <th>Biaya</th>
  </tr>
  <?php while ($res = mysqli_fetch_assoc($reservasi)) { ?>
    <tr>
      <td><?= $res['nama_pelanggan'] ?></td>
      <td><?= $res['nomor_ktp'] ?></td>
      <td><?= $res['check_in'] ?></td>
      <td><?= $res['check_out'] ?></td>
      <td>Rp<?= number_format($res['biaya_sewa']) ?></td>
    </tr>
  <?php } ?>
</table>
