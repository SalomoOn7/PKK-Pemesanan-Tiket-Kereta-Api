<?php
include '../koneksi.php';
session_start();

if (!isset($_SESSION['user_id'])) {
  echo "<script>alert('Silakan login terlebih dahulu!'); window.location='../index.php';</script>";
  exit;
}

$user_id = $_SESSION['user_id'];

$query = "SELECT p.pesan_id, p.nama_penumpang, p.jumlah_tiket, p.nama_kursi, p.total_harga, p.status_pesanan, j.*, k.nama_kereta, sa.stasiun_nama AS asal, st.stasiun_nama AS tujuan, ks.nama_kursi
          FROM tpesanan p
          JOIN tusers u ON p.user_id = u.user_id
          JOIN tjadwal j ON p.jadwal_id = j.jadwal_id
          JOIN tkereta k ON j.kereta_id = k.kereta_id
          JOIN tstasiun sa ON j.id_stasiun_asal = sa.stasiun_id
          JOIN tstasiun st ON j.id_stasiun_tujuan = st.stasiun_id
          JOIN tkursi ks ON p.kursi_id = ks.kursi_id
          WHERE p.user_id = '$user_id'
          ORDER BY p.tanggal_pesan DESC";

$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Riwayat Pesanan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/daisyui@5/dist/full.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet" />
  <link href="../src/output.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 text-sm flex min-h-screen font-Inter">

<div class="flex min-h-screen overflow-x-hidden">
  <!-- Sidebar -->
  <div class="w-64 bg-white shadow-md">
    <?php include 'sidebar.php'; ?>
  </div>

   <!-- Main Content -->
<main class="flex-1 p-4 lg:p-8 bg-gray-100">
  <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Riwayat Pesanan Anda</h2>

  <?php if (mysqli_num_rows($result) > 0): ?>
    <div class="overflow-auto bg-white shadow-md rounded-lg max-w-screen-xl mx-auto p-4">
      <table class="w-full min-w-[1000px] table-auto text-left">
        <thead class="bg-gray-100 text-gray-700">
          <tr>
            <th>No</th>
            <th>Kereta</th>
            <th>Rute</th>
            <th>Penumpang</th>
            <th>Tiket</th>
            <th>Total</th>
            <th>Kursi</th>
            <th>Status</th>
            <th>Keberangkatan</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
          <tr class="border-t">
            <td><?= $no++ ?></td>
            <td class="font-semibold"><?= $row['nama_kereta'] ?></td>
            <td class="whitespace-nowrap">
              <?= $row['asal'] ?> <i class="ri-arrow-right-line mx-1"></i> <?= $row['tujuan'] ?>
            </td>
            <td><?= $row['nama_penumpang'] ?></td>
            <td><?= $row['jumlah_tiket'] ?></td>
            <td>Rp<?= number_format($row['total_harga'], 0, ',', '.') ?></td>
            <td><?= $row['nama_kursi']?></td>
            <td>
              <?php
                $status = $row['status_pesanan'];
                $badge = match ($status) {
                  'Menunggu Pembayaran' => 'badge-warning',
                  'Sukses' => 'badge-success',
                  default => 'badge-ghost'
                };
              ?>
              <span class="badge <?= $badge ?>"><?= $status ?></span>
            </td>
            <td>
              <?= $row['tanggal_keberangkatan'] ?><br>
              <span class="text-xs text-gray-500"><?= $row['waktu_keberangkatan'] ?> - <?= $row['waktu_kedatangan'] ?></span>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="alert alert-info mt-4 text-center">Belum ada pesanan tiket.</div>
  <?php endif; ?>
</main>

</div>
</body>
</html>
