<!DOCTYPE html>
<html>
<head>
  <title>Tambah Kamar</title>
</head>
<body>
  <h2>Tambah Kamar</h2>
  
  <?php
  include 'koneksi.php';
  
  // Cek jika form sudah disubmit
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode = $_POST['kode_kamar'];
    
    // Cek duplikasi kode kamar
    $cek = mysqli_query($koneksi, "SELECT * FROM kamar WHERE kode_kamar = '$kode'");
    if (mysqli_num_rows($cek) > 0) {
      echo "<div style='color:red; margin-bottom:10px;'>Kode kamar sudah digunakan. Silakan gunakan kode yang berbeda.</div>";
    } else {
      // Jika kode unik, proses data
      $tipe = $_POST['tipe_kamar'];
      $fasilitas = $_POST['fasilitas'];
      $harga = $_POST['harga'];
      
      $query = "INSERT INTO kamar (kode_kamar, tipe_kamar, fasilitas, harga) 
                VALUES ('$kode', '$tipe', '$fasilitas', '$harga')";
      
      if (mysqli_query($koneksi, $query)) {
        header("Location: kelola_kamar.php");
        exit;
      } else {
        echo "<div style='color:red; margin-bottom:10px;'>Gagal menambahkan kamar: " . mysqli_error($koneksi) . "</div>";
      }
    }
  }
  ?>
  
  <form method="post">
    <label>Kode Kamar:</label><br>
    <input type="text" name="kode_kamar" required value="<?= isset($_POST['kode_kamar']) ? htmlspecialchars($_POST['kode_kamar']) : '' ?>"><br><br>
    
    <label>Tipe Kamar:</label><br>
    <select name="tipe_kamar">
      <option value="Standard" <?= (isset($_POST['tipe_kamar']) && $_POST['tipe_kamar'] == 'Standard') ? 'selected' : '' ?>>Standard</option>
      <option value="Superior" <?= (isset($_POST['tipe_kamar']) && $_POST['tipe_kamar'] == 'Superior') ? 'selected' : '' ?>>Superior</option>
      <option value="Deluxe" <?= (isset($_POST['tipe_kamar']) && $_POST['tipe_kamar'] == 'Deluxe') ? 'selected' : '' ?>>Deluxe</option>
      <option value="Junior Suite" <?= (isset($_POST['tipe_kamar']) && $_POST['tipe_kamar'] == 'Junior Suite') ? 'selected' : '' ?>>Junior Suite</option>
    </select><br><br>
    
    <label>Fasilitas:</label><br>
    <textarea name="fasilitas" rows="3" cols="30" required><?= isset($_POST['fasilitas']) ? htmlspecialchars($_POST['fasilitas']) : '' ?></textarea><br><br>
    
    <label>Harga per Hari (Rp):</label><br>
    <input type="number" name="harga" required value="<?= isset($_POST['harga']) ? htmlspecialchars($_POST['harga']) : '' ?>"><br><br>
    
    <input type="submit" value="Simpan">
    <a href="index.php">Kembali</a>
  </form>
</body>
</html>