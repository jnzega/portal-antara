<?php
require 'include/koneksi.php';  // File untuk koneksi database
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mencari user berdasarkan username
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    // Cek jika user ditemukan
    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifikasi password 
        if (password_verify($password, $user['password'])) {
            // Password cocok, set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            echo '
                <script type="text/javascript">
                    window.location.href = "http://localhost/portal-antara/admin.php";
                </script>
            ';
            exit(); // Hentikan eksekusi skrip setelah redirect
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }
}
?>

<form style="margin-top: 20px;" action="login-admin" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit" name="login">Login</button>
</form>

<p>Belum punya akun? <a href="register-admin">Daftar di sini</a></p>