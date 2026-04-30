<link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<dialog id = "modal_tambahuser" class="modal">
  <div class="modal-box rounded-lg shadow-lg">
     <h3 class="text-2xl font-semibold text-center mb-6">Tambah User</h3>

     <form action="functionpengguna/tambah_user.php" method="POST" class="space-y-5">
      <div>
        <label class="label">
          <span class="label-text font-medium">Nama</span>
        </label>
        <input type="text" name="nama" placeholder="nama " required class="input input-bordered w-full" />
      </div>

      <div>
        <label class="label">
          <span class="label-text font-medium">Email</span>
        </label>
        <input type="email" name="email" placeholder="email " required class="input input-bordered w-full" />
      </div>

      <div>
        <label class="label">
          <span class="label-text font-medium">Password</span>
        </label>
        <input type="password" name="password" placeholder="password " required class="input input-bordered w-full" />
      </div>

      <div>
        <label class="label">
          <span class="label-text font-medium">Hak_Akses</span>
        </label>
        <select name="hak_akses" required class="select select-bordered w-full">
          <option disabled selected value="">-- Hak_Akses --</option>
          <option value="Admin">Admin</option>
          <option value="User">User</option>
        </select>
      </div>

      <div>
        <label class="label">
          <span class="label-text font-medium">No Hp</span>
        </label>
        <input type="number" name="no_hp" placeholder="no_hp " required class="input input-bordered w-full" />
      </div>

      <div class="modal-action justify-end">
        <button type="button" class="btn btn-ghost" onclick="document.getElementById('modal_tambahuser').close()">Batal</button>
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
      </div>
     </form>
  </div>
</dialog>