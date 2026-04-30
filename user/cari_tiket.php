<?php
include '../koneksi.php';
$kereta = mysqli_query($koneksi, 'SELECT * FROM tkereta');
$stasiun = mysqli_query($koneksi, 'SELECT * FROM tstasiun');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cari Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="../src/output.css" rel="stylesheet" />
</head>
<body class="font-Inter text-sm">
  <?php include 'sidebar.php' ?>
<form action="hasil_cari.php" method="GET" class="space-y-4 max-w-md mx-auto mt-10">
  <div>
    <label class="label">
      <span class="label-text font-medium">Stasiun Asal</span>
    </label>
    <select name="id_stasiun_asal" required class="select select-bordered w-full">
      <option disabled selected>Pilih Stasiun Asal</option>
      <?php mysqli_data_seek($stasiun, 0); while ($row = mysqli_fetch_assoc($stasiun)) : ?>
        <option value="<?= $row['stasiun_id'] ?>"><?= $row['stasiun_nama'] ?></option>
      <?php endwhile; ?>
    </select>
  </div>

  <div>
    <label class="label">
      <span class="label-text font-medium">Stasiun Tujuan</span>
    </label>
    <select name="id_stasiun_tujuan" required class="select select-bordered w-full">
      <option disabled selected>Pilih Stasiun Tujuan</option>
      <?php mysqli_data_seek($stasiun, 0); while ($row = mysqli_fetch_assoc($stasiun)) : ?>
        <option value="<?= $row['stasiun_id'] ?>"><?= $row['stasiun_nama'] ?></option>
      <?php endwhile; ?>
    </select>
  </div>

  <div>
    <label class="label">
      <span class="label-text font-medium">Tanggal Keberangkatan</span>
    </label>
    <input type="date" name="tanggal_keberangkatan" min="<?= date('Y-m-d') ?>" required class="input input-bordered w-full" />
  </div>
 
  <button type="submit" name="submit" class="btn btn-primary w-full" m >Cari Tiket</button>
</form>

</body>
</html>

