<?php
include 'koneksi.php';
$result = mysqli_query($koneksi, "SELECT * FROM kamar");
?>

<h2>Data Kamar</h2>
<a href="tambah_kamar.php">Tambah Kamar</a> | <a href="index.php">Beranda</a><br><br>

<table border="1" cellpadding="8">
  <tr>
    <th>Kode Kamar</th>
    <th>Tipe</th>
    <th>Fasilitas</th>
    <th>Harga</th>
    <th>Aksi</th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
  <tr>
    <td><?= $row['kode_kamar'] ?></td>
    <td><?= $row['tipe_kamar'] ?></td>
    <td><?= $row['fasilitas'] ?></td>
    <td>Rp<?= number_format($row['harga']) ?></td>
    <td>
      <a href="edit_kamar.php?kode=<?= $row['kode_kamar'] ?>">Edit</a> |
      <a href="hapus_kamar.php?kode=<?= $row['kode_kamar'] ?>" onclick="return confirm('Hapus kamar ini?')">Hapus</a>
    </td>
  </tr>
  <?php } ?>
</table>
