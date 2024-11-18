<?php
$dbname = 'final project';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama_lengkap = $_POST['nama_lengkap'];
  $nomor_hp = $_POST['nomor_hp'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

  // Periksa apakah role diatur (untuk admin), jika tidak, default ke 'user'
  $role = isset($_POST['role']) ? $_POST['role'] : 'admin';

  // Simpan data awal pengguna tanpa foto untuk mendapatkan user_id
  $stmt = $pdo->prepare("INSERT INTO users (nama_lengkap, nomor_hp, username, email, password, role, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
  if ($stmt->execute([$nama_lengkap, $nomor_hp, $username, $email, $password, $role])) {
    // Ambil user_id dari pengguna yang baru disimpan
    $user_id = $pdo->lastInsertId();

          echo "Registrasi berhasil. Silakan <a href='login.php'>login</a>.";
        } 
      }
?>

<form method="POST" enctype="multipart/form-data">
  Nama Lengkap: <input type="text" name="nama_lengkap" required><br>
  Nomor HP: <input type="number" name="nomor_hp" required><br>
  Username: <input type="text" name="username" required><br>
  Email: <input type="email" name="email" required><br>
  Password: <input type="password" name="password" required><br>

  <button type="submit">Register</button>
  <a href="login.php">Login</a>
</form>

<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

form {
    background: #ffffff;
    padding: 20px 25px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 400px;
}

form h2 {
    margin-bottom: 15px;
    color: #333;
    text-align: center;
}

form label {
    font-size: 14px;
    color: #555;
    display: block;
    margin-bottom: 5px;
}

form input {
    width: 100%;
    padding: 10px;
    margin: 8px 0 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
}

form button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

form button:hover {
    background-color: #0056b3;
}

form a {
    display: block;
    text-align: center;
    margin-top: 10px;
    font-size: 14px;
    color: #007bff;
    text-decoration: none;
}

form a:hover {
    text-decoration: underline;
}

</style>