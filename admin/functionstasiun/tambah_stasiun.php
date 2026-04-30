<?php 
$koneksi = mysqli_connect("localhost", "root", "", "tiket_kereta_api");
if (isset($_POST['submit'])) {
  $stasiun_nama = $_POST['stasiun_nama'];
  $kota = $_POST['kota'];

  $query = "INSERT INTO  tstasiun (stasiun_nama, kota) VALUES ('$stasiun_nama', '$kota') ";
  $result = mysqli_query($koneksi, $query);
  if ($result) {
    echo "<script>alert('stasiun berhasil ditambahkan');
                window.location='../kelola_stasiun.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menambahkan stasiun');
                window.history.back();
              </script>";
  }
}
?>