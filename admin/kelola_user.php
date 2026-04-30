<?php
  include '../koneksi.php'; 
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
      <link href="../src/output.css" rel="stylesheet" />
    <title>Kelola User</title>
  </head>
  <body class="bg-gray-100 p-6 font-Inter">
    <?php include 'sidebarr.php'?>
    <div class="w-[calc(100%-15rem)] h-full fixed left-[15rem]">
  <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-2xl font-bold">Kelola User</h2>
      <button class="btn btn-primary" onclick="document.getElementById('modal_tambahuser').showModal()">Tambah User</button>
    </div>

    <table class="w-full border text-sm text-left">
      <thead class="bg-gray-100">
        <tr>
          <th class="py-2 px-4 border">No</th>
          <th class="py-2 px-4 border">Nama</th>
          <th class="py-2 px-4 border">Email</th>
          <th class="py-2 px-4 border">Role</th>
          <th class="py-2 px-4 border">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM tusers");
        while ($data = mysqli_fetch_assoc($query)) :
        ?>
        <tr class="hover:bg-gray-50">
          <td class="py-2 px-4 border"><?= $no++ ?></td>
          <td class="py-2 px-4 border"><?= $data['nama'] ?></td>
          <td class="py-2 px-4 border"><?= $data['email'] ?></td>
          <td class="py-2 px-4 border"><?= $data['hak_akses'] ?></td>
          <td class="py-2 px-4 border text-center space-x-2">
            <button onclick="document.getElementById('modalEditUser<?= $data['user_id']; ?>').showModal()"><i class="ri-edit-2-line text-emerald-500 hover:text-emerald-700"></i></button>
            <a href="functionpengguna/hapus_user.php?id=<?= $data['user_id'] ?>" onclick="return confirm('Yakin ingin hapus user ini?')">
              <i class="ri-delete-bin-fill text-red-500"></i>
            </a>
          </td>
        </tr>
        <?php include 'modalpengguna/modal_edit_pengguna.php'; ?>
        <?php endwhile; ?>
      </tbody>
    </table>
    <?php include 'modalpengguna/modal_add_pengguna.php'; ?>
  </div>
</div> 
</body>
  </html>