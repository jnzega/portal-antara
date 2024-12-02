<?php
if (isset($_SESSION['user_id'])) {
    // Jika pengguna sudah login, redirect ke admin.php
    echo '
                <script type="text/javascript">
                    window.location.href = "http://localhost/portal-antara/admin.php";
                </script>';
    exit();
}

if (isset($_POST['register'])) {
    require 'include/koneksi.php'; // Include koneksi database

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi input
    $errors = [];

    // Cek apakah username sudah digunakan dengan prepared statement
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $errors[] = "Username sudah digunakan. Silakan pilih username lain.";
    }

    // Cek apakah email sudah digunakan
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $errors[] = "Email sudah digunakan. Silakan gunakan email lain.";
    }

    if (empty($errors)) {
        // Jika validasi berhasil, hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Simpan user baru ke database dengan prepared statement
        $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            $success = "Registrasi berhasil! Silakan <a href='login-admin'>login</a>.";
        } else {
            $errors[] = "Terjadi kesalahan saat registrasi. Silakan coba lagi.";
        }
    }
}
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Form Registrasi Admin</h2>
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <p><?= htmlspecialchars($error); ?></p>
            <?php endforeach; ?>
        </div>
    <?php elseif (isset($success)): ?>
        <div class="alert alert-success">
            <?= $success; ?>
        </div>
    <?php endif; ?>
    <form action="register-admin" method="POST" class="mx-auto" style="max-width: 400px;">
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" id="username" name="username" class="form-control" required autofocus>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
    </form>
    <p class="mt-3 text-center">Sudah punya akun? <a href="login-admin">Login di sini</a></p>
</div>

<?php include 'footer.php'; ?>
