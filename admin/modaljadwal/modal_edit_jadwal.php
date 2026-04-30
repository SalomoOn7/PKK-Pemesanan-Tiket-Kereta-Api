<link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<?php 
$koneksi = mysqli_connect("localhost", "root", "", "tiket_kereta_api");

$kereta = mysqli_query($koneksi, 'SELECT * FROM tkereta');
$stasiun = mysqli_query($koneksi, 'SELECT * FROM tstasiun');
?>
<dialog id="modalEditJadwal<?= $data['jadwal_id']; ?>" class="modal">
  <div class="modal-box rounded-lg shadow-lg">
    <h3 class="text-2xl font-semibold text-center mb-6">Edit Jadwal</h3>

    <form action="functionjadwal/edit_jadwal.php" method="POST" class="space-y-4">
        <input type="hidden" name="jadwal_id" value="<?= $data['jadwal_id'] ?>">
       <label class="block mb-2">Kereta</label>
      <select name="kereta_id" class="w-full border px-3 py-2 rounded mb-4">
        <?php while ($k = mysqli_fetch_assoc($kereta)) : ?>
          <option value="<?= $k['kereta_id'] ?>" <?= $k['kereta_id'] == $data['kereta_id'] ? 'selected' : '' ?>>
            <?= $k['nama_kereta'] ?>
          </option>
        <?php endwhile; ?>
      </select>

      <label class="block mb-2">Stasiun Asal</label>
      <select name="id_stasiun_asal" class="w-full border px-3 py-2 rounded mb-4">
        <?php mysqli_data_seek($stasiun, 0); while ($s = mysqli_fetch_assoc($stasiun)) : ?>
          <option value="<?= $s['stasiun_id'] ?>" <?= $s['stasiun_id'] == $data['id_stasiun_asal'] ? 'selected' : '' ?>>
            <?= $s['stasiun_nama'] ?>
          </option>
        <?php endwhile; ?>
      </select>

      <label class="block mb-2">Stasiun Asal</label>
      <select name="id_stasiun_tujuan" class="w-full border px-3 py-2 rounded mb-4">
        <?php mysqli_data_seek($stasiun, 0); while ($s = mysqli_fetch_assoc($stasiun)) : ?>
          <option value="<?= $s['stasiun_id'] ?>" <?= $s['stasiun_id'] == $data['id_stasiun_tujuan'] ? 'selected' : '' ?>>
            <?= $s['stasiun_nama'] ?>
          </option>
        <?php endwhile; ?>
      </select>

      <label class="block mb-2">Tanggal Keberangkatan</label>
      <input type="date" name="tanggal_keberangkatan" min="<?= date('Y-m-d') ?>" value="<?= $data['tanggal_keberangkatan'] ?>" class="w-full border px-3 py-2 rounded mb-4" />

      <label class="block mb-2">Waktu Keberangkatan</label>
      <input type="datetime-local" name="waktu_keberangkatan" min="<?= date('Y-m-d\TH:i') ?>"  value="<?= $data['waktu_keberangkatan'] ?>" class="w-full border px-3 py-2 rounded mb-4" />

      <label class="block mb-2">Waktu Kedatangan</label>
      <input type="datetime-local" name="waktu_kedatangan" min="<?= date('Y-m-d\TH:i') ?>"  value="<?= $data['waktu_kedatangan'] ?>" class="w-full border px-3 py-2 rounded mb-4" />

      <label class="block mb-2">Harga</label>
      <input type="number" name="harga" value="<?= $data['harga'] ?>" class="w-full border px-3 py-2 rounded mb-4" />

      <button type="button" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400" onclick="document.getElementById('modalEditJadwal<?= $data['jadwal_id'] ?>').close()">Batal</button>
      <button type="submit" name="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Simpan</button>
    </form>
  </div>
</dialog>