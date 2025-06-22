<?php
include 'koneksi.php';

if (!isset($_GET['kode'])) {
    echo "Parameter kode tidak ditemukan.";
    exit;
}

$kode = $_GET['kode'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM kamar WHERE kode_kamar='$kode'"));

if (!$data) {
    echo "Data kamar tidak ditemukan.";
    exit;
}

$cek_reservasi = mysqli_query($koneksi, "SELECT * FROM reservasi WHERE kode_kamar = '$kode'");
$kamar_terpakai = mysqli_num_rows($cek_reservasi) > 0;
?>

<h2>Edit Kamar</h2>
<form action="update_kamar.php" method="post">
  <input type="hidden" name="kode_lama" value="<?= $data['kode_kamar'] ?>">

  Kode Kamar:<br>
  <input type="text" name="kode_kamar" value="<?= $data['kode_kamar'] ?>" <?= $kamar_terpakai ? 'readonly' : '' ?> required><br><br>

  Tipe Kamar:<br>
  <select name="tipe_kamar" required>
    <option value="Standard" <?= $data['tipe_kamar'] == 'Standard' ? 'selected' : '' ?>>Standard</option>
    <option value="Superior" <?= $data['tipe_kamar'] == 'Superior' ? 'selected' : '' ?>>Superior</option>
    <option value="Deluxe" <?= $data['tipe_kamar'] == 'Deluxe' ? 'selected' : '' ?>>Deluxe</option>
    <option value="Junior Suite" <?= $data['tipe_kamar'] == 'Junior Suite' ? 'selected' : '' ?>>Junior Suite</option>
  </select><br><br>

  Fasilitas:<br>
  <textarea name="fasilitas" required><?= $data['fasilitas'] ?></textarea><br><br>

  Harga:<br>
  <input type="number" name="harga" value="<?= $data['harga'] ?>" required><br><br>

  <input type="submit" value="Update">
  <a href="kelola_kamar.php">Batal</a>
</form>