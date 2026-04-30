<?php 
$koneksi = mysqli_connect("localhost", "root", "", "tiket_kereta_api");
if (isset($_POST['submit'])) {
  $id = $_POST['kereta_id'];
  $nama_kereta = $_POST['nama_kereta'];
  $kelas = $_POST['kelas'];
  $jumlah_kursi = $_POST['jumlah_kursi'];

  $query = "UPDATE tkereta SET nama_kereta = '$nama_kereta', kelas = '$kelas', jumlah_kursi = '$jumlah_kursi' WHERE kereta_id = '$id'";
  $result = mysqli_query($koneksi, $query);
    if ($result) {
        echo "<script>alert(' Data kereta berhasil diedit');
                window.location='../kelola_kereta.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal Mengedit Data kereta');
                window.history.back();
              </script>";
    }
}
?>