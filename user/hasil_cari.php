<?php
include '../koneksi.php';

$asal = $_GET['id_stasiun_asal'];
$tujuan = $_GET['id_stasiun_tujuan'];
$tanggal = $_GET['tanggal_keberangkatan'];
$jumlah_tiket = isset($_GET['jumlah_tiket']) ? intval($_GET['jumlah_tiket']) : 1;

$query = "SELECT j.*, 
       k.nama_kereta,
       sa.stasiun_nama AS asal, 
       st.stasiun_nama AS tujuan
FROM tjadwal j
JOIN tkereta k ON j.kereta_id = k.kereta_id
JOIN tstasiun sa ON j.id_stasiun_asal = sa.stasiun_id
JOIN tstasiun st ON j.id_stasiun_tujuan = st.stasiun_id
WHERE j.id_stasiun_asal = '$asal' 
  AND j.id_stasiun_tujuan = '$tujuan' 
  AND j.tanggal_keberangkatan = '$tanggal'";

$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="font-Inter text-sm">

<?php if (mysqli_num_rows($result) > 0): ?>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
  <?php while ($data = mysqli_fetch_assoc($result)): ?>
    <div class="card bg-base-100 w-94 shadow-sm shadow-gray-400">
      <figure>
        <img
          src="https://i.pinimg.com/736x/a5/94/06/a59406e990d8094c74ab59b797ee3b19.jpg" 
          alt="<?= $data['nama_kereta'] ?>" />
      </figure>
      <div class="card-body">
        <h2 class="card-title"><?= $data['nama_kereta'] ?></h2>
        <p><?= $data['asal'] ?> ➜ <?= $data['tujuan'] ?></p>
        <p class="text-gray-600">Jumlah Tiket: <?= $jumlah_tiket ?></p>
        <p><?= $data['tanggal_keberangkatan'] ?> | <?= $data['waktu_keberangkatan'] ?> - <?= $data['waktu_kedatangan'] ?></p>
        <p class="font-semibold text-green-600">Harga: Rp<?= number_format($data['harga'], 0, ',', '.') ?></p>
        <div class="card-actions justify-end">
          <form action="pesan_tiket.php" method="GET">
            <input type="hidden" name="jadwal_id" value="<?= $data['jadwal_id'] ?>">
            <button class="btn btn-primary">Pesan Tiket</button>
          </form>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
  </div>
<?php else: ?>
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops!',
      text: 'Jadwal tidak ditemukan!',
    }).then(() => {
      window.history.back();
    });
  </script>
<?php endif; ?>
</body>
</html>
