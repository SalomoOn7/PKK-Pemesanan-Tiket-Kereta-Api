<?php
$koneksi = mysqli_connect("localhost", "root", "", "tiket_kereta_api");

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Hapus dulu semua kursi berdasarkan jadwal_id
  $hapus_kursi = mysqli_query($koneksi, "DELETE FROM tkursi WHERE jadwal_id = $id");

  // Hapus data dari tabel tjadwal
  $query = "DELETE FROM tjadwal WHERE jadwal_id = $id";
  if ($hapus_kursi && mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data jadwal dan kursi berhasil dihapus'); window.location='../kelola_jadwal.php';</script>";
  } else {
    echo  "<script>alert('Gagal hapus data'); window.history.back();</script>";
  }
}
?>
