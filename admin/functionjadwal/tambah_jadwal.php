<?php
$koneksi =mysqli_connect("localhost", "root", "", "tiket_kereta_api");
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

  $query = "INSERT INTO tjadwal (kereta_id, id_stasiun_asal, id_stasiun_tujuan, tanggal_keberangkatan, waktu_kedatangan, waktu_keberangkatan, harga) VALUES ('$kereta_id', '$id_stasiun_asal', '$id_stasiun_tujuan', '$tanggal_keberangkatan', '$waktu_keberangkatan', '$waktu_kedatangan', '$harga')";
  $result = mysqli_query($koneksi, $query);
  if ($result) {
    $jadwal_id = mysqli_insert_id($koneksi);
    $qk = mysqli_query($koneksi, "SELECT jumlah_kursi FROM tkereta WHERE kereta_id = '$kereta_id'");
    $jumlah_kursi = mysqli_fetch_assoc($qk)['jumlah_kursi'];

    for ($i=1; $i <= $jumlah_kursi; $i++) { 
      $nama_kursi = 'K' . str_pad($i, 3, '0', STR_PAD_LEFT);
      mysqli_query($koneksi, "INSERT INTO tkursi (jadwal_id, nama_kursi, status) VALUES ('$jadwal_id', '$nama_kursi', 'tersedia')");
    }
    echo "<script>
            alert('Jadwal dan kursi berhasil ditambahkan');
            window.location='../kelola_jadwal.php';
          </script>";
    } else {
        echo "<script>
                alert('Gagal menambahkan stasiun');
                window.history.back();
              </script>";
  }
}