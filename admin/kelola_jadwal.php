<?php
$koneksi = mysqli_connect("localhost", "root", "", "tiket_kereta_api");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
  <link href="../src/output.css" rel="stylesheet" />
  <title>Kelola Jadwal</title>
</head>
<body class="bg-gray-100 p-6 font-Inter">
  <?php include 'sidebarr.php' ?>
  <div class="w-[calc(100%-15rem)] h-full fixed left-[15rem]">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-2xl font-bold">Kelola Jadwal</h2>
       <button class="btn btn-primary" onclick="document.getElementById('modal_addJadwal').showModal()">Tambah Jadwal</button>
    </div>

    <table class="w-full border text-sm text-left">
      <thead class="bg-gray-100">
        <tr>
          <th class="py-2 px-4 border">No</th>
          <th class="py-2 px-4 border">Kereta</th>
          <th class="py-2 px-4 border">Stasiun Asal</th>
          <th class="py-2 px-4 border">Stasiun Tujuan</th>
          <th class="py-2 px-4 border">Tgl Keberangkatan</th>
          <th class="py-2 px-4 border">Waktu Keberangkatan</th>
          <th class="py-2 px-4 border">Waktu Kedatangan</th>
          <th class="py-2 px-4 border">Harga</th>
          <th class="py-2 px-4 border text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "
        SELECT j.*, 
               k.nama_kereta, 
               s1.stasiun_nama AS stasiun_asal, 
               s2.stasiun_nama AS stasiun_tujuan
        FROM tjadwal j
        JOIN tkereta k ON j.kereta_id = k.kereta_id
        JOIN tstasiun s1 ON j.id_stasiun_asal = s1.stasiun_id
        JOIN tstasiun s2 ON j.id_stasiun_tujuan = s2.stasiun_id
        ORDER BY j.tanggal_keberangkatan ASC
      ");
    
        while ($data = mysqli_fetch_assoc($query)) :
        ?>
        <tr class="hover:bg-gray-50">
          <td class="py-2 px-4 border"><?= $no++ ?></td>
          <td class="py-2 px-4 border"><?= $data['nama_kereta'] ?></td>
          <td class="py-2 px-4 border"><?= $data['stasiun_asal'] ?></td>
          <td class="py-2 px-4 border"><?= $data['stasiun_tujuan'] ?></td>
          <td class="py-2 px-4 border"><?= $data['tanggal_keberangkatan'] ?></td>
          <td class="py-2 px-4 border"><?= $data['waktu_keberangkatan'] ?></td> 
          <td class="py-2 px-4 border"><?= $data['waktu_kedatangan'] ?></td>
          <td class="py-2 px-4 border">Rp <?= number_format($data['harga'], 0, ',', '.') ?></td>
          <td class="py-2 px-4 border text-center space-x-2">
            <button onclick="document.getElementById('modalEditJadwal<?= $data['jadwal_id']; ?>').showModal()"><i class="ri-edit-2-line text-emerald-500 hover:text-emerald-700"></i></button>
            <a href="admin/../functionjadwal/hapus_jadwal.php?id=<?= $data['jadwal_id'] ?>" onclick="return confirm('Yakin ingin hapus jadwal ini?')">
            <i class="ri-delete-bin-fill text-red-500"></i>
            </a>
          </td>
        </tr>
        <?php include 'modaljadwal/modal_edit_jadwal.php'; ?>
        <?php endwhile; ?>
      </tbody>
    </table>
    <?php include 'modaljadwal/modal_add_jadwal.php'; ?>
  </div>
  </div>
</body>
</html>
