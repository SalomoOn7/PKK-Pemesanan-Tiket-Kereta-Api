<dialog id="modalEditSta<?= $data['stasiun_id']; ?>" class="modal">
  <div class="modal-box rounded-lg shadow-lg">
        <h3 class="text-2xl font-semibold text-center mb-6">Edit Stasiun</h3>
        <form action="functionstasiun/edit_stasiun.php" method="POST" class="space-y-4">
        <div>
        <input type="hidden" name="stasiun_id" value="<?= $data['stasiun_id'] ?>" class="w-full border px-3 py-2 rounded">
      </div>
      <div>
        <label class="block">Nama Stasiun</label>
        <input type="text" name="stasiun_nama" value="<?= $data['stasiun_nama'] ?>" class="w-full border px-3 py-2 rounded">
      </div>
      <div>
        <label class="block">Kota</label>
        <input type="text" name="kota" value="<?= $data['kota'] ?>" class="w-full border px-3 py-2 rounded">
      </div>
      <div class="flex justify-end gap-2">
        <button type="button" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400" onclick="document.getElementById('modalEditSta<?= $data['stasiun_id'] ?>').close()">Batal</button>
        <button type="submit" name="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Simpan</button>
      </div>
    </form>
  </div>
</div>
  </div>
</dialog>
    