<?php
include '../koneksi.php';
session_start();

if (!isset($_SESSION['user_id'])) {
  echo "<script>alert('Silakan login terlebih dahulu!'); window.location='../index.php';</script>";
  exit;
}

$jadwal_id = $_GET['jadwal_id'];
$user_id = $_SESSION['user_id'];

// Ambil data jadwal
$query = "SELECT j.*, k.nama_kereta, sa.stasiun_nama AS asal, st.stasiun_nama AS tujuan 
          FROM tjadwal j
          JOIN tkereta k ON j.kereta_id = k.kereta_id
          JOIN tstasiun sa ON j.id_stasiun_asal = sa.stasiun_id
          JOIN tstasiun st ON j.id_stasiun_tujuan = st.stasiun_id
          WHERE j.jadwal_id = '$jadwal_id'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

// Ambil kursi
$kursi = mysqli_query($koneksi, "SELECT * FROM tkursi WHERE jadwal_id = '$jadwal_id' ORDER BY nama_kursi ASC"); //  paling baru desc

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $jumlah_tiket = count($_POST['nama_penumpang']);
} else {
  $jumlah_tiket = isset($_GET['jumlah_tiket']) ? (int)$_GET['jumlah_tiket'] : 1;
}

if (isset($_POST['submit'])) {
  $nama_penumpang = $_POST['nama_penumpang'];
  $kursi_id = $_POST['kursi_id'];
  $jumlah_tiket = count($nama_penumpang);
  $total_harga = $data['harga'];
  $tanggal_pesan = date("Y-m-d H:i:s");
  $status_pesanan = "Menunggu Pembayaran";
  $pesan_ids = [];
  for ($i = 0; $i < $jumlah_tiket; $i++) { 
    $nama = mysqli_real_escape_string($koneksi, $nama_penumpang[$i]);
    $kursi = intval($kursi_id[$i]);
    
    $query_kursi = mysqli_query($koneksi, "SELECT nama_kursi FROM tkursi WHERE kursi_id = '$kursi'"); // Mengambil Nama Kursi 
    $kursi_row = mysqli_fetch_assoc($query_kursi);
    $nama_kursi = $kursi_row['nama_kursi'];

    $query_insert = "INSERT INTO tpesanan (user_id, jadwal_id, nama_penumpang, jumlah_tiket, nama_kursi, total_harga, tanggal_pesan, status_pesanan, kursi_id)
                     VALUES ('$user_id', '$jadwal_id', '$nama', 1, '$nama_kursi ', '$total_harga', '$tanggal_pesan', '$status_pesanan', '$kursi')";
    $result_insert = mysqli_query($koneksi, $query_insert);

    if ($result_insert) {
      // Ubah status kursi !!! biar tidak bisa dipake orang lain lagi
      $pesan_id = mysqli_insert_id($koneksi);
      $pesan_ids[] = $pesan_id;
      mysqli_query($koneksi, "UPDATE tkursi SET status = 'sudah dipesan', pesan_id = '$pesan_id' WHERE kursi_id = '$kursi'");
  }
}
  // Simpan ke tpesanan

  if (count($pesan_ids) === $jumlah_tiket) {
    echo "<script>
            alert('Semua tiket berhasil dipesan!');
            window.location='pembayaran.php?pesan_id=" . $pesan_ids[0] . "';
          </script>";
    exit;
  }else {
    echo "<script>alert('Gagal memesan salah satu tiket.');</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pesan Tiket & Pilih Kursi</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.1/dist/full.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
  <div class="w-full max-w-3xl bg-white rounded-xl shadow-lg p-6 space-y-6">

    <div class="text-center border-b pb-4">
      <h2 class="text-2xl font-bold text-gray-800">Form Pemesanan Tiket & Pilih Kursi</h2>
    </div>

    <!-- Info Jadwal -->
    <div class="grid gap-3 text-gray-700 text-sm">
      <div class="flex justify-between">
        <span><strong>Kereta:</strong> <?= $data['nama_kereta'] ?></span>
        <span><strong>Tanggal:</strong> <?= date('d M Y', strtotime($data['tanggal_keberangkatan'])) ?></span>
      </div>
      <div class="flex justify-between">
        <span><strong>Rute:</strong> <?= $data['asal'] ?> ➜ <?= $data['tujuan'] ?></span>
        <span><strong>Jam:</strong> <?= $data['waktu_keberangkatan'] ?> - <?= $data['waktu_kedatangan'] ?></span>
      </div>
      <div class="text-right">
        <span class="font-semibold">Harga: <span class="text-blue-600">Rp<?= number_format($data['harga'], 0, ',', '.') ?></span></span>
      </div>
    </div>

<!-- Form -->
<form action="" method="POST" class="space-y-4">
  <input type="hidden" name="jadwal_id" value="<?= $jadwal_id ?>">
  <input type="hidden" name="jumlah_tiket" value="<?= $jumlah_tiket ?>">

  <?php for ($i = 1; $i <= $jumlah_tiket; $i++): ?>
    <div class="border p-4 rounded-lg">
      <h3 class="font-semibold mb-2">Penumpang <?= $i ?></h3>

      <div class="mb-2">
        <label class="label">
          <span class="label-text">Nama Penumpang</span>
        </label>
        <input type="text" name="nama_penumpang[]" class="input input-bordered w-full" required>
      </div>

      <div>
        <label class="label">
          <span class="label-text">Pilih Kursi</span>
        </label>
        <div class="grid grid-cols-4 md:grid-cols-6 gap-2">
          <?php
            mysqli_data_seek($kursi, 0); // reset pointer
            while ($row = mysqli_fetch_assoc($kursi)):
          ?>
            <label class="btn btn-sm <?= $row['status'] == 'tersedia' ? 'btn-outline' : 'btn-disabled bg-gray-300 text-white' ?>">
              <input type="radio" name="kursi_id[<?= $i - 1 ?>]" value="<?= $row['kursi_id'] ?>" class="hidden" <?= $row['status'] != 'tersedia' ? 'disabled' : '' ?> required />
              <?= $row['nama_kursi'] ?>
            </label>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  <?php endfor; ?>
  <div class="text-right pt-4">
  <button type="submit" name="submit" class="btn btn-primary px-6">
    Lanjut ke Pembayaran
  </button>
</div>
</form>
  </div>
</body>
</html>
