<?php 
include "auth.php"; 
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp, "upload/$foto");

    mysqli_query($conn, "INSERT INTO users (username, password, foto) VALUES ('$username', '$password', '$foto')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tambah User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 flex justify-center items-center min-h-screen">

  <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
    <h2 class="text-xl font-semibold mb-4 text-center">Tambah User</h2>
    <form method="POST" enctype="multipart/form-data" class="space-y-4">
      <div>
        <label class="block mb-1">Username</label>
        <input name="username" required class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div>
        <label class="block mb-1">Password</label>
        <input name="password" type="password" required class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div>
        <label class="block mb-1">Foto Profil</label>
        <input type="file" name="foto" required class="w-full border px-3 py-2 rounded">
      </div>

      <div class="flex justify-between items-center">
        <a href="index.php" class="text-sm text-gray-500 hover:underline">← Kembali</a>
        <button name="simpan" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
      </div>
    </form>
  </div>

</body>
</html>
