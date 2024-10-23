<?php
    // Register logic
    if (isset($_POST['register'])) {
        require 'include/koneksi.php'; // Include koneksi database

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Cek apakah username sudah digunakan dengan prepared statement
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Username sudah digunakan. Silakan pilih username lain.";
        } else {
            // Jika username belum digunakan, hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Simpan user baru ke database dengan prepared statement
            $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':email', $email);

            if ($stmt->execute()) {
                echo "Registrasi berhasil! Silakan <a href='login'>login</a>.";
            } else {
                echo "Terjadi kesalahan saat registrasi. Silakan coba lagi.";
            }
        }
    }
?>

<h2>Register Form</h2>
<form action="register-admin" method="POST">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>
    <button type="submit" name="register">Register</button>
</form>