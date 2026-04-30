<?php
$koneksi = mysqli_connect("localhost", "root", "", "tiket_kereta_api");

$id = $_POST['jadwal_id'];
$data = mysqli_query($koneksi, "SELECT * FROM tjadwal WHERE jadwal_id = $id");
$jadwal = mysqli_fetch_assoc($data);

$kereta = mysqli_query($koneksi, 'SELECT * FROM tkereta');
$stasiun = mysqli_query($koneksi, 'SELECT * FROM tstasiun');

if (isset($_POST['submit'])) {
  $kereta_id = $_POST['kereta_id'];
  $id_stasiun_asal = $_POST['id_stasiun_asal'];
  $id_stasiun_tujuan = $_POST['id_stasiun_tujuan'];
  $tanggal_keberangkatan = $_POST['tanggal_keberangkatan'];
  $waktu_kedatangan = $_POST['waktu_kedatangan'];
  $waktu_keberangkatan = $_POST['waktu_keberangkatan'];
  $harga = $_POST['harga'];

  $query = "UPDATE tjadwal SET kereta_id = '$kereta_id', id_stasiun_asal = '$id_stasiun_asal', id_stasiun_tujuan = '$id_stasiun_tujuan', tanggal_keberangkatan = '$tanggal_keberangkatan', waktu_kedatangan = '$waktu_kedatangan', waktu_keberangkatan = '$waktu_keberangkatan', harga = '$harga' WHERE jadwal_id = '$id'";
  $result = mysqli_query($koneksi, $query);
  if ($result) {
            echo "<script>alert(' Data kereta berhasil diedit');
                window.location='../kelola_jadwal.php';
              </script>";
  }else {
    echo "<script>
                alert('Gagal Mengedit Data kereta');
                window.history.back();
              </script>";
  }
}
?>
