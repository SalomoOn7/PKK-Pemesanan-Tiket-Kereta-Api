<link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<dialog id="modal_tambahsta" class="modal">
  <div class="modal-box rounded-lg shadow-lg">
    <h3 class="text-2xl font-semibold text-center mb-6">Tambah Stasiun</h3>
    <form action="functionstasiun/tambah_stasiun.php" method="POST" class="space-y-4">
      <div>
        <label class="block">Nama Stasiun</label>
        <input type="text" name="stasiun_nama" required class="input input-bordered w-full" />
      </div>
      <div>
        <label class="block">Kota</label>
        <input type="text" name="kota" required class="input input-bordered w-full" />
      </div>
      <div class="modal-action">
        <button type="button" class="btn" onclick="document.getElementById('modal_tambahsta').close()">Batal</button>
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</dialog>


