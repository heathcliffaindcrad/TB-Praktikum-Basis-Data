<!DOCTYPE html>
<html>
<head>
  <title>Tambah Kamar</title>
</head>
<body>
  <h2>Tambah Kamar</h2>
  <form action="proses_kamar.php" method="post">
    <label>Kode Kamar:</label><br>
    <input type="text" name="kode_kamar" required><br><br>

    <label>Tipe Kamar:</label><br>
    <select name="tipe_kamar">
      <option value="Standard">Standard</option>
      <option value="Superior">Superior</option>
      <option value="Deluxe">Deluxe</option>
      <option value="Junior Suite">Junior Suite</option>
    </select><br><br>

    <label>Fasilitas:</label><br>
    <textarea name="fasilitas" rows="3" cols="30" required></textarea><br><br>

    <label>Harga per Hari (Rp):</label><br>
    <input type="number" name="harga" required><br><br>

    <input type="submit" value="Simpan">
    <a href="index.php">Kembali</a>
  </form>
</body>
</html>
