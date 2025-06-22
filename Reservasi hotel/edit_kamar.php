<?php
include 'koneksi.php';
$kode = $_GET['kode'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM kamar WHERE kode_kamar='$kode'"));
?>

<h2>Edit Kamar</h2>
<form action="update_kamar.php" method="post">
  <input type="hidden" name="kode_lama" value="<?= $data['kode_kamar'] ?>">

  Kode Kamar:<br>
  <input type="text" name="kode_kamar" value="<?= $data['kode_kamar'] ?>"><br><br>

  Tipe Kamar:<br>
  <input type="text" name="tipe_kamar" value="<?= $data['tipe_kamar'] ?>"><br><br>

  Fasilitas:<br>
  <textarea name="fasilitas"><?= $data['fasilitas'] ?></textarea><br><br>

  Harga:<br>
  <input type="number" name="harga" value="<?= $data['harga'] ?>"><br><br>

  <input type="submit" value="Update">
  <a href="kelola_kamar.php">Batal</a>
</form>
