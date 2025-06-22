<?php
include 'koneksi.php';
$result = mysqli_query($koneksi, "SELECT * FROM reservasi");
?>

<h1>Detail Reservasi</h1>
<a href="tambah_reservasi.php">Tambah Reservasi</a> | <a href="index.php">Beranda</a><br><br>

<table border="10" cellpadding="10">
  <tr>
    <th>Nama</th>
    <th>No KTP</th>
    <th>Alamat</th>
    <th>Jenis Kelamin</th>
    <th>Kamar</th>
    <th>Check-In</th>
    <th>Check-Out</th>
    <th>Biaya Sewa</th>
    <th>Aksi</th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
  <tr>
    <td><?= $row['nama_pelanggan'] ?></td>
    <td><?= $row['nomor_ktp'] ?></td>
    <td><?= $row['alamat'] ?></td>
    <td><?= $row['jenis_kelamin'] ?></td>
    <td><?= $row['kode_kamar'] ?></td>
    <td><?= $row['check_in'] ?></td>
    <td><?= $row['check_out'] ?></td>
    <td>Rp<?= number_format($row['biaya_sewa']) ?></td>
    <td>
      <a href="edit_reservasi.php?id=<?= $row['id'] ?>">Edit</a> |
      <a href="hapus_reservasi.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus reservasi ini?')">Hapus</a>
    </td>
  </tr>
  <?php } ?>
</table>
