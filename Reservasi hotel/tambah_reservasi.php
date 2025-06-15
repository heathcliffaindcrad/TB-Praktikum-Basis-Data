<!DOCTYPE html>
<html>
<head>
  <title>Tambah Reservasi</title>
</head>
<body>
  <h2>Tambah Reservasi</h2>
  <form action="proses_reservasi.php" method="post">
    <label>Nama Pelanggan:</label><br>
    <input type="text" name="nama_pelanggan" required><br><br>

    <label>Nomor KTP:</label><br>
    <input type="text" name="nomor_ktp" required><br><br>

    <label>Alamat:</label><br>
    <textarea name="alamat" rows="3" cols="30" required></textarea><br><br>

    <label>Jenis Kelamin:</label><br>
    <select name="jenis_kelamin" required>
      <option value="Laki-laki">Laki-laki</option>
      <option value="Perempuan">Perempuan</option>
    </select><br><br>

    <label>Kode Kamar:</label><br>
    <select name="kode_kamar" required>
      <?php
        include 'koneksi.php';
        // Ambil hanya kamar yang statusnya 'tersedia'
        $result = mysqli_query($koneksi, "SELECT * FROM kamar WHERE status = 'tersedia'");
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<option value='" . $row['kode_kamar'] . "'>" . $row['kode_kamar'] . " - " . $row['tipe_kamar'] . "</option>";
        }
      ?>
    </select><br><br>

    <label>Tanggal Check-in:</label><br>
    <input type="date" name="check_in" required><br><br>

    <label>Tanggal Check-out:</label><br>
    <input type="date" name="check_out" required><br><br>

    <input type="submit" value="Simpan Reservasi">
    <a href="index.php">Kembali</a>
  </form>
</body>
</html>
