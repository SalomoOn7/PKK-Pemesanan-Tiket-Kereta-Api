<?php
$koneksi = mysqli_connect("localhost", "root", "", "tiket_kereta_api");
if (isset($_POST['submit'])) {
    $id = $_POST['user_id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $hak_akses = $_POST['hak_akses'];

    $query = "UPDATE tusers SET nama = '$nama', email = '$email' , no_hp = '$no_hp' , hak_akses = '$hak_akses' WHERE user_id = '$id'";
    $result = mysqli_query($koneksi, $query);
     if ($result) {
         echo "<script>alert(' Data User berhasil diedit');
                window.location='../kelola_user.php';
              </script>";
     }else {
        echo "<script>
                alert('Gagal Mengedit Data kereta');
                window.history.back();
              </script>";
     }
}
?>
