<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $user = mysqli_fetch_assoc($cek);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $user['username'];
        header("Location: index.php");
    } else {
        echo "<script>alert('Username atau password salah!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 flex justify-center items-center min-h-screen">

  <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
    <h2 class="text-xl font-semibold mb-4 text-center">Login</h2>
    <form method="POST" class="space-y-4">
      <div>
        <label class="block mb-1">Username</label>
        <input name="username" placeholder="Username" required class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div>
        <label class="block mb-1">Password</label>
        <input type="password" name="password" placeholder="Password" required class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div class="flex justify-between items-center">
        <a href="register.php" class="text-sm text-gray-500 hover:underline">Belum punya akun?</a>
        <button name="login" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Login</button>
      </div>
    </form>
  </div>

</body>
</html>
