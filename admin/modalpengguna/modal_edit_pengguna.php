<link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<dialog id="modalEditUser<?=$data['user_id'] ?>" class="modal">
  <div class="modal-box rounded-lg shadow-lg">
     <h3 class="text-2xl font-semibold text-center mb-6">Edit User</h3>

     <form action="functionpengguna/edit_user.php" method="POST" class="space-y-4">
      <div>
        <input type="hidden" name="user_id" value="<?= $data['user_id'] ?>" class="w-full border px-3 py-2 rounded">
      </div>

      <div>
        <label class="block">Nama</label>
        <input type="text" name="nama" value="<?= $data['nama'] ?>" class="w-full border px-3 py-2 rounded">
      </div>

      <div>
        <label class="block">Nama Kereta</label>
        <input type="email" name="email" value="<?= $data['email'] ?>" class="w-full border px-3 py-2 rounded">
      </div>

      <div>
        <label class="block">No Hp</label>
        <input type="number" name="no_hp" value="<?= $data['no_hp'] ?>" class="w-full border px-3 py-2 rounded">
      </div>

      <div>
        <label class="block">Hak Akses</label>
        <select name="hak_akses" value="" class="w-full border px-3 py-2 rounded">
          <option value="" disabled selected ></option>
          <option value="Admin"<?= $data['hak_akses'] == 'Admin' ? 'selected' :''; ?>>Admin</option>
          <option value="User"<?= $data['hak_akses'] == 'User' ? 'selected' :'';  ?>>User</option>
        </select>
      </div>

       <div class="flex justify-end gap-2">
        <button type="button" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400" onclick="document.getElementById('modalEditUser<?= $data['user_id'] ?>').close()">Batal</button>
        <button type="submit" name="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Simpan</button>
      </div>
     </form>
  </div>
</dialog>