<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "tiket_kereta_api";
$koneksi = mysqli_connect($hostname, $username, $password, $database_name);

if (!$koneksi) {
  die("koneksi db gagal:".
  mysqli_connect_error());
}
?>