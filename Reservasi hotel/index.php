<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Reservasi Hotel</title>
</head>
<body>

  <h2>Data Kamar</h2>
  
  <a href="tambah_kamar.php">+ Tambah Kamar</a> |
  <a href="kelola_kamar.php">Detail</a>
  <br><br>

  <table border="5">
    <tr>
      <th>Kode</th>
      <th>Tipe</th>
      <th>Fasilitas</th>
      <th>Harga</th>
      <th>Aksi</th>
    </tr>
    <?php
      $data = mysqli_query($koneksi, "SELECT * FROM kamar");
      while ($row = mysqli_fetch_array($data)) {
        echo "<tr>
          <td>{$row['kode_kamar']}</td>
          <td>{$row['tipe_kamar']}</td>
          <td>{$row['fasilitas']}</td>
          <td>Rp" . number_format($row['harga']) . "</td>
          <td>
            <a href='edit_kamar.php?kode={$row['kode_kamar']}'>Edit</a> |
            <a href='hapus_kamar.php?kode={$row['kode_kamar']}' onclick='return confirm(\"Yakin hapus kamar ini?\")'>Hapus</a>
          </td>
        </tr>";
      }
    ?>
  </table>

  <h2>Data Reservasi</h2>
  <a href="tambah_reservasi.php">+ Tambah Reservasi</a> |
  <a href="kelola_reservasi.php">Detail</a>
  <br><br>

  <table border="5">
    <tr>
      <th>Nama</th>
      <th>KTP</th>
      <th>Kamar</th>
      <th>Check-in</th>
      <th>Check-out</th>
      <th>Total</th>
      <th>Aksi</th>
    </tr>
    <?php
      $data = mysqli_query($koneksi, "SELECT * FROM reservasi");
      while ($row = mysqli_fetch_array($data)) {
        echo "<tr>
          <td>{$row['nama_pelanggan']}</td>
          <td>{$row['nomor_ktp']}</td>
          <td>{$row['kode_kamar']}</td>
          <td>{$row['check_in']}</td>
          <td>{$row['check_out']}</td>
          <td>Rp" . number_format($row['biaya_sewa']) . "</td>
          <td>
            <a href='edit_reservasi.php?id={$row['id']}'>Edit</a> |
            <a href='hapus_reservasi.php?id={$row['id']}' onclick='return confirm(\"Yakin hapus reservasi ini?\")'>Hapus</a>
          </td>
        </tr>";
      }
    ?>
  </table>

</body>
</html>
