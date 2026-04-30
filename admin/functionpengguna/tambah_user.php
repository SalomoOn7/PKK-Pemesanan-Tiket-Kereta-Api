<?php
$koneksi = mysqli_connect("localhost", "root", "", "tiket_kereta_api");

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = md5 ($_POST['password']);
    $no_hp = $_POST['no_hp'];
    $hak_akses = $_POST['hak_akses'];

    $query = "INSERT INTO tusers (nama, email, password, no_hp, hak_akses) VALUES ('$nama', '$email', '$password', '$no_hp', '$hak_akses')";
    $result = mysqli_query($koneksi, $query);
      if ($result) {
    echo "<script>alert('User berhasil ditambahkan');
                window.location='../kelola_user.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menambahkan User');
                window.history.back();
              </script>";
  }
} 
?>

