<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_jadwal = $_POST['id_jadwal'];
  $nama_penumpang = $_POST['nama_penumpang'];
  $no_identitas = $_POST['no_identitas'];
  $jumlah_tiket = $_POST['jumlah_tiket'];
  $tanggal_pesan = date('Y-m-d');

   $query = "INSERT INTO pesanan (id_jadwal, nama_penumpang, no_identitas, jumlah_tiket, tanggal_pesan) 
      VALUES ('$id_jadwal', '$nama_penumpang', '$no_identitas', '$jumlah_tiket', '$tanggal_pesan')";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Pesanan berhasil disimpan'); window.location.href='tiket_saya.php';</script>";
    } else {
        echo "Gagal menyimpan pesanan: " . mysqli_error($koneksi);
    }
} 
?>