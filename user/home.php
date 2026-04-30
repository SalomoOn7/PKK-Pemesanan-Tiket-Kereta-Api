<?php
session_start();
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard User</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link href="../src/output.css" rel="stylesheet" />
</head>
<body class="font-Inter bg-gray-100 min-h-screen flex">

  <!-- Sidebar -->
  <?php include 'sidebar.php'; ?>

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
        <li class="text-gray-600 mr-2 font-medium">Selamat Datang di Applikasi siKreta</li>
      </ul>
      <ul class="ml-auto flex items-center">
        <li class="mr-1 relative">
          <button type="button" class="text-gray-400 w-8 h-8 rounded flex items-center justify-center hover:bg-gray-50 hover:text-gray-600">
            <i class="ri-search-line"></i>
          </button>
        </li>
      </ul>
    </div>

    <!-- Konten Utama -->
    <main class="p-6 flex-1 bg-gray-100">
      <div class="bg-white p-6 rounded-xl shadow-sm">
        <h2 class="text-2xl font-semibold mb-2">Halo, <?php echo htmlspecialchars($_SESSION['nama']); ?> </h2>
        <p class="text-gray-600">Selamat datang di dashboard pengguna. Anda dapat mencari dan memesan tiket kereta dari menu yang tersedia.</p>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
          <div class="bg-blue-100 p-4 rounded-lg">
            <div class="text-blue-600 text-2xl"><i class="ri-ticket-line"></i></div>
            <h3 class="text-lg font-medium mt-2">Cari Tiket</h3>
            <p class="text-sm text-gray-600">Temukan dan pesan tiket kereta dengan mudah.</p>
          </div>
          <div class="bg-green-100 p-4 rounded-lg">
            <div class="text-green-600 text-2xl"><i class="ri-history-line"></i></div>
            <h3 class="text-lg font-medium mt-2">Riwayat Pemesanan</h3>
            <p class="text-sm text-gray-600">Lihat semua tiket yang pernah Anda pesan.</p>
          </div>
          <div class="bg-yellow-100 p-4 rounded-lg">
            <div class="text-yellow-600 text-2xl"><i class="ri-wallet-line"></i></div>
            <h3 class="text-lg font-medium mt-2">Pembayaran</h3>
            <p class="text-sm text-gray-600">Lihat status dan riwayat pembayaran Anda.</p>
          </div>
        </div>
      </div>
    </main>

  </div>

  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="script.js"></script>
</body>
</html>
