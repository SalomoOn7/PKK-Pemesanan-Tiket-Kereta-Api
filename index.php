<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>APP - Penjualan Tiket Kereta</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.1/dist/full.css" rel="stylesheet" />
  <link href="src/output.css" rel="stylesheet" />
</head>
<body class="font-Inter text-sm bg-base-200">
  <div class="flex items-center justify-center min-h-screen">
    <div class="flex flex-col lg:flex-row items-stretch bg-base-100 shadow-2xl rounded-lg overflow-hidden w-full max-w-6xl h-[500px]">

      <!-- Gambar -->
        <img src="img/logingambar.jpg" alt="Kereta Api" class="w-full h-full object-cover block" />

      <!-- Form -->
      <div class="w-full lg:w-1/2 h-full p-8 flex flex-col justify-center">
        <h1 class="text-4xl font-bold mb-6 text-center lg:text-center">Login now!</h1>
        <form action="ceklogin.php" method="POST" class="space-y-4">
          <div>
            <label class="label">
              <span class="label-text">Email</span>
            </label>
            <input type="email" name="email" class="input input-bordered w-full" placeholder="Email" required />
          </div>

          <div> 
            <label class="label">
              <span class="label-text">Password</span>
            </label>
            <input type="password" name="password" class="input input-bordered w-full" placeholder="Password" required />
          </div>

          <div class="text-right">
            <a href="registrasi.php" class="link link-hover text-sm">Don't have an account?</a>
          </div>    

          <button type="submit" class="btn bg-gray-900 w-full mt-4">LOGIN</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
