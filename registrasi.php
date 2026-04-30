<?php 
$koneksi = mysqli_connect("localhost", "root", "", "tiket_kereta_api");
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = md5($_POST['password']); // Pertimbangkan password_hash
  $no_hp = $_POST['no_hp'];
  //Mengecek apakah email sudah terdaftar atau belum sebelumnya
  $cek_email = mysqli_query($koneksi, " SELECT * FROM tusers WHERE email = '$email'");
  if (mysqli_num_rows($cek_email) > 0) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
          document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
          icon: 'warning',
          title: 'Email sudah terdaftar!',
          text: 'Silakan gunakan email lain.',
        }).then(() => {
          window.history.back();
        });
      });
  </script>";
  }else {

  $query = "INSERT INTO tusers (nama, email, password, no_hp, hak_akses) VALUES ('$nama', '$email', '$password', '$no_hp', 'User')";
  $result = mysqli_query($koneksi, $query);
  if ($result) {
    echo "<script>alert('User berhasil ditambahkan'); window.location='registrasi.php';</script>";
  } else {
    echo "<script>alert('Gagal menambahkan User'); window.history.back();</script>";
  }
}
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.2/dist/full.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center font-sans">

  <div class="w-full max-w-md bg-white rounded-xl shadow-md p-8">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Buat Akun Baru</h2>

    <form action="" method="POST" class="space-y-4">
      <div>
        <label class="label"><span class="label-text font-semibold">Nama Lengkap</span></label>
        <input type="text" name="nama" class="input input-bordered w-full" required>
      </div>

      <div>
        <label class="label"><span class="label-text font-semibold">Email</span></label>
        <input type="email" name="email" class="input input-bordered w-full" required>
      </div>

      <div>
        <label class="label"><span class="label-text font-semibold">Password</span></label>
        <input type="password" name="password" class="input input-bordered w-full" required>
      </div>

      <div>
        <label class="label"><span class="label-text font-semibold">No HP</span></label>
        <input type="number" name="no_hp" class="input input-bordered w-full" required>
      </div>

      <div>
        <button type="submit" name="submit" class="btn btn-primary w-full">Daftar</button>
      </div>

      <div class="text-center text-sm text-gray-500 mt-4">
        Sudah punya akun? <a href="index.php" class="text-blue-500 hover:underline">Masuk di sini</a>
      </div>
    </form>
  </div>

</body>
</html>
