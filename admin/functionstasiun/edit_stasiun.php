<?php
$koneksi = mysqli_connect("localhost", "root", "", "tiket_kereta_api");
if (isset($_POST['submit'])) {
  $id = $_POST['stasiun_id'];
  $stasiun_nama = $_POST['stasiun_nama'];
  $kota = $_POST['kota'];

  $query = "UPDATE tstasiun SET stasiun_nama = '$stasiun_nama', kota = '$kota' WHERE stasiun_id = '$id'";
  $result = mysqli_query($koneksi, $query);
  if ($result) {
    echo "<script>alert(' Data kereta berhasil diedit');
                window.location='../kelola_stasiun.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal Mengedit Data kereta');
                window.history.back();
              </script>";
  }
}
?>