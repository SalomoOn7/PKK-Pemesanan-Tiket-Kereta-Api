<link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<dialog id="modal_tambah" class="modal">
  <div class="modal-box rounded-lg shadow-lg">  
    <h3 class="text-2xl font-semibold text-center mb-6">Tambah Kereta</h3>
    
    <form action="functionkereta/tambah_kereta.php" method="POST" class="space-y-5">
      <div>
        <label class="label">
          <span class="label-text font-medium">Nama Kereta</span>
        </label>
        <input type="text" name="nama_kereta" placeholder="nama kereta " required class="input input-bordered w-full" />
      </div>

      <div>
        <label class="label">
          <span class="label-text font-medium">Kelas</span>
        </label>
        <select name="kelas" required class="select select-bordered w-full">
          <option disabled selected value="">-- Pilih Kelas --</option>
          <option value="Ekonomi">Ekonomi</option>
          <option value="Bisnis">Bisnis</option>
          <option value="Eksekutif">Eksekutif</option>
        </select>
      </div>

      <div>
        <label class="label">
          <span class="label-text font-medium">Jumlah Kursi</span>
        </label>
        <input type="number" name="jumlah_kursi" placeholder="input jumlah kursi" required class="input input-bordered w-full" />
      </div>

      <div class="modal-action justify-end">
        <button type="button" class="btn btn-ghost" onclick="document.getElementById('modal_tambah').close()">Batal</button>
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</dialog>
