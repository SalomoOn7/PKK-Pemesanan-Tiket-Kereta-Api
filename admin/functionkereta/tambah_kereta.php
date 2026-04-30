<?php
$koneksi = mysqli_connect("localhost", "root", "", "tiket_kereta_api");
if (isset($_POST['submit'])) {
  $nama_kereta = $_POST['nama_kereta'];
  $kelas = $_POST['kelas'];
  $jumlah_kursi = $_POST['jumlah_kursi'];

  $query = "INSERT INTO tkereta (nama_kereta, kelas, jumlah_kursi) VALUES ('$nama_kereta', '$kelas','$jumlah_kursi')";
  $result = mysqli_query($koneksi, $query);
  if ($result) {
        echo "<script>alert('kereta berhasil ditambahkan');
                window.location='../kelola_kereta.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menambahkan kereta');
                window.history.back();
              </script>";
    }
} 
?>
