<link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<dialog id="modalEdit<?= $data['kereta_id'] ?>" class="modal">
  <div class="modal-box rounded-lg shadow-lg">
        <h3 class="text-2xl font-semibold text-center mb-6">Edit Kereta</h3>
    <form action="functionkereta/edit_kereta.php" method="POST" class="space-y-4">
      <div>
        <input type="hidden" name="kereta_id" value="<?= $data['kereta_id'] ?>" class="w-full border px-3 py-2 rounded">
      </div>
      <div>
        <label class="block">Nama Kereta</label>
        <input type="text" name="nama_kereta" value="<?= $data['nama_kereta'] ?>" class="w-full border px-3 py-2 rounded">
      </div>
      <div>
        <label class="block">Pilih Kelas</label>
        <select name="kelas" value="" class="w-full border px-3 py-2 rounded">
          <option value="" disabled selected ></option>
          <option value="Ekonomi"<?= $data['kelas'] == 'Ekonomi' ? 'selected' :''; ?>>Ekonomi</option>
          <option value="Bisnis"<?= $data['kelas'] == 'Bisnis' ? 'selected' :'';  ?>>Bisnis</option>
          <option value="Eksekutif"<?= $data['kelas'] == 'Eksekutif' ? 'selected' :'';  ?>>Eksekutif</option>
        </select>
      </div>
      <div>
        <label class="block">Jumlah Kursi</label>
        <input type="number" name="jumlah_kursi" value="<?= $data['jumlah_kursi'] ?>" class="w-full border px-3 py-2 rounded">
      </div>
      <div class="flex justify-end gap-2">
        <button type="button" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400" onclick="document.getElementById('modalEdit<?= $data['kereta_id'] ?>').close()">Batal</button>
        <button type="submit" name="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Simpan</button>
      </div>
    </form>
  </div>
</dialog>

