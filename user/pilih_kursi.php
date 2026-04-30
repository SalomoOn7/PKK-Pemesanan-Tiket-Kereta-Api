<?php
include '../koneksi.php';

if (!isset($_GET['jadwal_id'])) {
  echo "Jadwal tidak ditemukan.";
  exit;
}

$jadwal_id = $_GET['jadwal_id'];

// mengambil data kursi berdasarkan jadwal 
$kursi = mysqli_query($koneksi, "SELECT * FROM tkursi WHERE  jadwal_id = '$jadwal_id'");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pilih Kursi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.2/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center py-10">

  <div class="w-full max-w-3xl bg-white rounded-xl shadow-md p-6">
    <h2 class="text-2xl font-bold mb-4 text-center">Pilih Kursi</h2>
    
    <form action="pesan_tiket.php" method="GET" class="space-y-6">
      <input type="hidden" name="jadwal_id" value="<?= $jadwal_id ?>">
      
      <div class="grid grid-cols-5 gap-4 justify-center">
        <?php while ($row = mysqli_fetch_assoc($kursi)): ?>
          <?php
            $status = $row['status'];
            $nama_kursi = $row['nama_kursi'];
            $id_kursi = $row['kursi_id'];
          ?>
          <label class="btn <?= $status == 'terisi' ? 'btn-disabled bg-gray-300' : 'btn-outline btn-info' ?>">
            <input type="radio" name="kursi" value="<?= $nama_kursi ?>" <?= $status == 'terisi' ? 'disabled' : '' ?> class="hidden">
            <?= $nama_kursi ?>
          </label>
        <?php endwhile; ?>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary mt-4">Lanjutkan ke Pemesanan</button>
      </div>
    </form>
  </div>

</body>
</html>