<link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<?php
$koneksi = mysqli_connect("localhost", "root", "", "tiket_kereta_api");

$kereta = mysqli_query($koneksi, 'SELECT * FROM tkereta');
$stasiun = mysqli_query($koneksi, 'SELECT * FROM tstasiun'); 
?>
<dialog id="modal_addJadwal" class="modal">
<div class="modal-box rounded-lg shadow-lg">
<h3 class="text-2xl font-semibold text-center mb-6">Tambah Jadwal</h3>

<form action="functionjadwal/tambah_jadwal.php" method="POST" class="space-y-5">
        <label class="block mb-2" >Kereta</label>
      <select name="kereta_id" class="w-full border px-3 py-2 rounded mb-4">
        <?php while ($k = mysqli_fetch_assoc($kereta)) : ?>
          <option value="<?= $k['kereta_id'] ?>" <?= $k['kereta_id'] == $k['kereta_id'] ? 'selected' : '' ?>>
            <?= $k['nama_kereta'] ?>
          </option>
        <?php endwhile; ?>
      </select>

  <div>
  <label class="label">
    <span class="label-text font-medium">Stasiun Asal</span>
  </label>
  <select name="id_stasiun_asal" required class="select select-bordered w-full">
    <option disabled selected>Pilih Stasiun Asal</option>
    <?php mysqli_data_seek($stasiun, 0); while ($s = mysqli_fetch_assoc($stasiun)) : ?>
      <option value="<?= $s['stasiun_id'] ?>"><?= $s['stasiun_nama'] ?></option>
    <?php endwhile; ?>
  </select>
  </div>

      <div>
  <label class="label">
    <span class="label-text font-medium">Stasiun Tujuan</span>
  </label>
  <select name="id_stasiun_tujuan" required class="select select-bordered w-full">
    <option disabled selected>Pilih Stasiun Tujuan</option>
    <?php mysqli_data_seek($stasiun, 0); while ($s = mysqli_fetch_assoc($stasiun)) : ?>
      <option value="<?= $s['stasiun_id'] ?>"><?= $s['stasiun_nama'] ?></option>
    <?php endwhile; ?>
  </select>
</div>

      <div>
        <label class="label">
          <span class="label-text font-medium">Tanggal Keberangkatan</span>
        </label>
        <input type="date" name="tanggal_keberangkatan" min="<?= date('Y-m-d') ?>" placeholder="" required class="input input-bordered w-full" />
      </div>

      <div>
        <label class="label">
          <span class="label-text font-medium">Waktu Kedatangan</span>
        </label>
        <input type="datetime-local" name="waktu_kedatangan" min="<?= date('Y-m-d\TH:i') ?>" placeholder="" required class="input input-bordered w-full" />
      </div>

      <div>
        <label class="label">
          <span class="label-text font-medium">Waktu Keberangkatan</span>
        </label>
        <input type="datetime-local" name="waktu_keberangkatan" min="<?= date('Y-m-d\TH:i') ?>"  placeholder="" required class="input input-bordered w-full" />
      </div>

      <div>
        <label class="label">
          <span class="label-text font-medium">Harga</span>
        </label>
        <input type="number" name="harga" placeholder="" required class="input input-bordered w-full" />
      </div>

    <div class="modal-action justify-end">
      <button type="button" class="btn btn-ghost" onclick="document.getElementById('modal_addJadwal').close()">Batal</button>
      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
</div>
</dialog>