<?php
session_start();
include '../koneksi.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link href="../src/output.css" rel="stylesheet" />
</head>
<body class="font-Inter bg-gray-100 min-h-screen flex">

  <!-- Sidebar -->
  <?php include 'sidebarr.php'; ?>

  <!-- Konten utama -->
  <div class="flex-1 flex flex-col ml-64">

    <!-- Navbar -->
    <div class="bg-white px-6 py-2 flex items-center shadow-md shadow-black/5">
      <button type="button" class="text-lg text-gray-600">
        <i class="ri-menu-line"></i>
      </button>
      <ul class="flex items-center text-sm ml-4">
        <li class="mr-2">
          <a href="#" class="text-gray-400 hover:text-gray-600 font-medium">Dashboard</a>
        </li>
        <li class="text-gray-600 mr-2 font-medium">Selamat Datang</li>
        <li class="text-gray-600 font-medium"><?php echo$_SESSION['nama']; ?></li>
      </ul> 
      <ul class="ml-auto flex items-center">
        <li class="mr-1 relative">
          <button type="button" class="text-gray-400 w-8 h-8 rounded flex items-center justify-center hover:bg-gray-50 hover:text-gray-600">
            <i class="ri-search-line"></i>
          </button>
        </li>
      </ul>
    </div>

    <!-- Main Content -->
    <main class="p-6 bg-gray-100 flex-1">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <!-- Box: Tiket Terjual -->
        <div class="bg-white p-4 rounded-xl shadow-sm flex items-center gap-4">
          <div class="text-2xl text-gray-600"><i class="ri-user-line"></i></div>
          <div>
            <p class="text-gray-500 text-sm">Tiket Terjual</p>
            <h3 class="text-xl font-semibold">350</h3>
          </div>
        </div>

        <!-- Box: Pendapatan -->
        <div class="bg-white p-4 rounded-xl shadow-sm flex items-center gap-4">
          <div class="text-2xl text-gray-600"><i class="ri-money-dollar-circle-line"></i></div>
          <div>
            <p class="text-gray-500 text-sm">Pendapatan</p>
            <h3 class="text-xl font-semibold">Rp12jt</h3>
          </div>
        </div>

        <!-- Box: Jadwal Aktif -->
        <div class="bg-white p-4 rounded-xl shadow-sm flex items-center gap-4">
          <div class="text-2xl text-gray-600"><i class="ri-calendar-line"></i></div>
          <div>
            <p class="text-gray-500 text-sm">Jadwal Aktif</p>
            <h3 class="text-xl font-semibold">25</h3>
          </div>
        </div>
      </div>

      <!-- Tabel Pesanan Terbaru -->
      <div class="bg-white rounded-xl shadow-sm p-4">
        <h2 class="text-lg font-semibold mb-4">Pesanan Terbaru</h2>
        <table class="w-full text-sm text-left">
          <thead class="text-gray-500 border-b">
            <tr>
              <th class="py-2">Nama</th>
              <th class="py-2">Jumlah Tiket</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b hover:bg-gray-50">
              <td class="py-2">John Doe</td>
              <td class="py-2">2 Tiket</td>
            </tr>
            <tr class="border-b hover:bg-gray-50">
              <td class="py-2">Sarah</td>
              <td class="py-2">1 Tiket</td>
            </tr>
            <tr class="hover:bg-gray-50">
              <td class="py-2">Bagus</td>
              <td class="py-2">3 Tiket</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>

  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="script.js"></script>
</body>
</html>
