<?php
$koneksi = mysqli_connect("localhost", "root", "", "hotel");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
