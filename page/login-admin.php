<?php
require 'include/koneksi.php';  // File untuk koneksi database
if (isset($_SESSION['user_id'])) {
    // Jika pengguna sudah login, redirect ke admin.php
    echo '
                <script type="text/javascript">
                    window.location.href = "http://localhost/portal-antara/admin.php";
                </script>';
    exit();
}

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
                </script>';
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}


?>



<div class="container mt-5">
    <h2 class="text-center mb-4">Login Admin</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>
    <form action="login-admin" method="POST" class="mx-auto" style="max-width: 400px;">
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" id="username" name="username" class="form-control" required autofocus>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
    </form>
    <p class="mt-3 text-center">Belum punya akun? <a href="register-admin">Daftar di sini</a></p>
</div>

<?php include 'footer.php'; ?>