<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM reservasi WHERE id='$id'"));
?>

<h2>Edit Reservasi</h2>
<form action="update_reservasi.php" method="post">
  <input type="hidden" name="id" value="<?= $data['id'] ?>">

  Nama Pelanggan:<br>
  <input type="text" name="nama_pelanggan" value="<?= $data['nama_pelanggan'] ?>" required><br><br>

  Nomor KTP:<br>
  <input type="text" name="nomor_ktp" value="<?= $data['nomor_ktp'] ?>" required><br><br>

  Alamat:<br>
  <textarea name="alamat" required><?= $data['alamat'] ?></textarea><br><br>

  Jenis Kelamin:<br>
  <select name="jenis_kelamin" required>
    <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
    <option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
  </select><br><br>

  Kode Kamar:<br>
  <select name="kode_kamar" required>
    <?php
      // Ambil semua kamar yang tersedia ATAU kamar yang sedang dipilih
      $query = "SELECT * FROM kamar WHERE status = 'tersedia' OR kode_kamar = '{$data['kode_kamar']}'";
      $result = mysqli_query($koneksi, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        $selected = ($row['kode_kamar'] == $data['kode_kamar']) ? 'selected' : '';
        echo "<option value='{$row['kode_kamar']}' $selected>{$row['kode_kamar']} - {$row['tipe_kamar']} (Rp" . number_format($row['harga']) . ")</option>";
      }
    ?>
  </select><br><br>

  Tanggal Check-In:<br>
  <input type="date" name="check_in" value="<?= $data['check_in'] ?>" required><br><br>

  Tanggal Check-Out:<br>
  <input type="date" name="check_out" value="<?= $data['check_out'] ?>" required><br><br>

  Biaya Sewa:<br>
  <input type="number" name="biaya_sewa" value="<?= $data['biaya_sewa'] ?>" required><br><br>

  <input type="submit" value="Update">
  <a href="kelola_reservasi.php">Batal</a>
</form>