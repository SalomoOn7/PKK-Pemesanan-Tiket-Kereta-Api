<?php
session_start();

include "koneksi.php";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = mysqli_real_escape_string ($koneksi,
  $_POST['email']);
  $password = md5 ($_POST['password']);

  $query = "SELECT * FROM tusers WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query ($koneksi, $query);
  if (mysqli_num_rows($result) == 1) {
    $data = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $data['user_id'];
    $_SESSION['email'] = $data ['email'];
    $_SESSION['nama'] = $data ['nama'];
    $_SESSION['hak_akses'] = $data ['hak_akses'];

    //Cek hak_akses
    if ($data['hak_akses'] == 'Admin') {
      //Masuk ke hal Admin
      header('location: admin/home.php');
    }elseif ($data['hak_akses'] == 'User') {
      //Masuk ke hal User
      header('location: user/home.php');
    }else {
          echo "<script>alert('Hak Akses Tidak tersedia!'); window.location='index.php';</script> ";
    }
    echo "Selamat Datang ". $_SESSION['nama'];
  }else {
    echo  "<script> alert('Username atau Password Salah!');
    window.location='index.php'; </script>";
  }
}
?>