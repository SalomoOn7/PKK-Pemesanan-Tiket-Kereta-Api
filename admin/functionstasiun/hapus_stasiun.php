<?php
$koneksi = mysqli_connect("localhost", "root", "", "tiket_kereta_api");
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM tstasiun WHERE stasiun_id = $id";
  if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data berhasil dihapus'); window.location='../kelola_stasiun.php';</script>";
  }else {
   echo "<script>alert('Gagal hapus data'); window.history.back();</script>";
  }
}
?>