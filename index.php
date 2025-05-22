<?php include "auth.php"; include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="max-w-4xl mx-auto p-6">
  <h2 class="text-2xl font-bold mb-4">Daftar User</h2>

  <div class="mb-4 flex gap-3">
    <a href="tambah.php" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">+ Tambah User</a>
    <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</a>
  </div>

  <table class="w-full bg-white border border-gray-300 rounded shadow">
    <thead>
      <tr class="bg-gray-200 text-left">
        <th class="py-2 px-4 border-b">No</th>
        <th class="py-2 px-4 border-b">Username</th>
        <th class="py-2 px-4 border-b">Foto Profil</th>
        <th class="py-2 px-4 border-b">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      $data = mysqli_query($conn, "SELECT * FROM users");
      while ($row = mysqli_fetch_assoc($data)) {
          echo "<tr class='hover:bg-gray-50'>
                  <td class='py-2 px-4 border-b'>$no</td>
                  <td class='py-2 px-4 border-b'>{$row['username']}</td>
                  <td class='py-2 px-4 border-b'><img src='upload/{$row['foto']}' width='50' class='rounded'></td>
                  <td class='py-2 px-4 border-b'>
                    <a href='edit.php?id={$row['id']}' class='text-blue-500 hover:underline'>Edit</a> |
                    <a href='hapus.php?id={$row['id']}' onclick='return confirm(\"Yakin?\")' class='text-red-500 hover:underline'>Hapus</a>
                  </td>
                </tr>";
          $no++;
      }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>
