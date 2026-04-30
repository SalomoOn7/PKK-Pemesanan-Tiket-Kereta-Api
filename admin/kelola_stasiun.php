<?php
include '../koneksi.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Kelola Stasiun</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="../src/output.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 p-6 font-Inter">
  <div class="w-[calc(90%-20rem)] h-full fixed left-[20rem]">
  <?php include 'sidebarr.php' ?>
  <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-2xl font-bold mb-6">Kelola Stasuin</h2>
      <!-- Button Tambah -->
   <button class="btn btn-primary" onclick="document.getElementById('modal_tambahsta').showModal()">Tambah Stasiun</button>
    </div>

    <!-- Tabel kereta -->
    <div class="mt-6">
      <table class="min-w-full bg-white">
        <thead class="bg-gray-100">
          <tr>
            <th class="py-2 px-4 border">No</th>
            <th class="py-2 px-4 border">Stasiun Nama</th>
            <th class="py-2 px-4 border">Kota</th>
            <th class="py-2 px-4 border">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $query = mysqli_query($koneksi, "SELECT * FROM tstasiun");
          while ($data = mysqli_fetch_assoc($query)) :
          ?>
          <tr class="text-center">
            <td class="py-2 px-4 border"><?= $no++; ?></td>
            <td class="py-2 px-4 border"><?= $data['stasiun_nama']; ?></td>
            <td class="py-2 px-4 border"><?= $data['kota']; ?></td>
            <td class="py-2 px-4 border">
              <button onclick="document.getElementById('modalEditSta<?= $data['stasiun_id']; ?>').showModal()"><i class="ri-edit-2-line text-emerald-500 hover:text-emerald-700"></i></button>
              <a href="admin/../functionstasiun/hapus_stasiun.php?id=<?= $data['stasiun_id']; ?>" onclick="return confirm('Yakin hapus?')"><i class="ri-delete-bin-fill text-red-500 hover:text-red-700"></i></a>
            </td>
          </tr>
            
          <!-- Include Modal Edit Per Row -->
           <?php include 'modalstasiun/modal_edit_stasiun.php'; ?>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>

    <!-- Include Modal Tambah -->
    <?php include 'modalstasiun/modal_add_stasiun.php'; ?>
  </div>
  </div>
</body>
</html>
