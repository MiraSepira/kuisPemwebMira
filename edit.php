<?php
include "auth.php"; include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id=$id"));

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $foto = $data['foto'];

    if ($_FILES['foto']['name']) {
        $foto = $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "upload/$foto");
    }

    mysqli_query($conn, "UPDATE users SET username='$username', foto='$foto' WHERE id=$id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 flex justify-center items-center min-h-screen">

  <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
    <h2 class="text-xl font-semibold mb-4 text-center">Edit User</h2>
    <form method="POST" enctype="multipart/form-data" class="space-y-4">
      <div>
        <label class="block mb-1">Username</label>
        <input name="username" value="<?= $data['username'] ?>" required class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div>
        <label class="block mb-1">Foto Profil Baru</label>
        <input type="file" name="foto" class="w-full border px-3 py-2 rounded">
        <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti foto.</p>
      </div>

      <div class="flex justify-between items-center">
        <a href="index.php" class="text-sm text-gray-500 hover:underline">← Kembali</a>
        <button name="update" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
      </div>
    </form>
  </div>

</body>
</html>
