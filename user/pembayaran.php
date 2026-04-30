<?php
include '../koneksi.php';
session_start();

if (!isset($_SESSION['user_id'])) {
  echo "<script>alert('Silakan login terlebih dahulu'); window.location='../index.php';</script>";
  exit;
}

if (!isset($_GET['pesan_id']) || empty($_GET['pesan_id'])) {
  echo "<script>alert('ID Pesanan tidak ditemukan'); window.location='riwayat.php';</script>";
  exit;
}

$pesan_id = $_GET['pesan_id'];
$user_id = $_SESSION['user_id'];

// Ambil salah satu pesanan untuk referensi waktu pemesanan
$query_ref = "SELECT * FROM tpesanan WHERE pesan_id = '$pesan_id' AND user_id = '$user_id'";
$result_ref = mysqli_query($koneksi, $query_ref);
$pesanan_ref = mysqli_fetch_assoc($result_ref);

if (!$pesanan_ref) {
  echo "<script>alert('Pesanan tidak ditemukan'); window.location='riwayat.php';</script>";
  exit;
}

$tanggal_pesan = $pesanan_ref['tanggal_pesan'];

// Ambil semua pesanan user dengan tanggal_pesan yang sama (satu transaksi)
$query_all = "SELECT * FROM tpesanan WHERE user_id = '$user_id' AND tanggal_pesan = '$tanggal_pesan'";
$result_all = mysqli_query($koneksi, $query_all);

$daftar_pesanan = [];
$total_bayar = 0;
$all_pesan_ids = [];

while ($row = mysqli_fetch_assoc($result_all)) {
  $daftar_pesanan[] = $row;
  $total_bayar += $row['total_harga'];
  $all_pesan_ids[] = $row['pesan_id'];
}

if (isset($_POST['submit'])) {
  $metode = $_POST['metode_pembayaran'];
  $tanggal_bayar = date("Y-m-d H:i:s");
  

  foreach ($all_pesan_ids as $id) {
    $query_insert = "INSERT INTO tpembayaran (pesan_id, metode_pembayaran, total_pembayaran, tanggal_pembayaran)
                     VALUES ('$id', '$metode', '{$total_bayar}', '$tanggal_bayar')";
    mysqli_query($koneksi, $query_insert);

    mysqli_query($koneksi, "UPDATE tpesanan SET status_pesanan = 'Sukses' WHERE pesan_id = '$id'");
  }

  echo "<script>
    alert('Pembayaran berhasil! Tiket Anda telah dikonfirmasi.');
    window.location='riwayat.php';
  </script>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pembayaran</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6 font-sans">
  <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-4">Form Pembayaran</h2>

    <form method="POST" class="space-y-4">
      <div class="border p-4 rounded-lg bg-gray-50">
        <h3 class="font-semibold mb-2">Detail Penumpang:</h3>
        <ul class="list-disc list-inside text-sm space-y-1">
          <?php foreach ($daftar_pesanan as $p): ?>
            <li><?= htmlspecialchars($p['nama_penumpang']) ?> — Kursi ID: <?= $p['kursi_id'] ?></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div>
        <label class="label">Jumlah Tiket</label>
        <input type="number" class="input input-bordered w-full" value="<?= count($daftar_pesanan) ?>" disabled>
      </div>

      <div>
        <label class="label">Total Pembayaran</label>
        <input type="text" class="input input-bordered w-full" value="Rp<?= number_format($total_bayar, 0, ',', '.') ?>" disabled>
      </div>

      <div>
        <label class="label">Metode Pembayaran</label>
        <select name="metode_pembayaran" class="select select-bordered w-full" required>
          <option disabled selected>Pilih metode</option>
          <option value="e-wallet">E-Wallet</option>
          <option value="kartu kredit">Kartu Kredit</option>
        </select>
      </div>

      <div>
        <button type="submit" name="submit" class="btn btn-primary w-full">Bayar Sekarang</button>
      </div>
    </form>
  </div>
</body>
</html>
