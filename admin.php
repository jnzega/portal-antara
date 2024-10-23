<?php
include 'include/koneksi.php';

// Mulai session
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika belum login, redirect ke halaman login
    header('Location: http://localhost/portal-antara/page/login-admin');
    exit();
}

function uploadImage($file, $title, $isCarousel = false) {
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($fileExtension, $allowedExtensions)) {
        throw new Exception("Format file tidak didukung.");
    }

    $targetDir = $isCarousel ? 'assets/img/carousel-img/' : 'assets/img/card-thumbnail/';
    $fileName = preg_replace("/[^a-zA-Z0-9]+/", "-", strtolower($title));
    $targetFile = $targetDir . $fileName . '.' . $fileExtension;

    if (!move_uploaded_file($file['tmp_name'], $targetFile)) {
        throw new Exception("Gagal mengunggah file.");
    }

    return $targetFile;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle carousel updates
    for ($i = 1; $i <= 3; $i++) {
        $carouselTitle = $_POST['carousel_title'][$i];
        $image = 'assets/img/carousel-img/carousel-' . $i . '.jpg'; // Default image path

        if (isset($_FILES['carousel_image']['name'][$i]) && $_FILES['carousel_image']['name'][$i] != '') {
            $image = uploadImage([
                'name' => $_FILES['carousel_image']['name'][$i],
                'tmp_name' => $_FILES['carousel_image']['tmp_name'][$i],
                'error' => $_FILES['carousel_image']['error'][$i],
                'size' => $_FILES['carousel_image']['size'][$i]
            ], 'carousel-' . $i, true);
        }

        // Updating or inserting carousel image info
        $sql = "INSERT INTO carousel (id, title, image) VALUES (?, ?, ?)
                ON DUPLICATE KEY UPDATE title = VALUES(title), image = VALUES(image)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$i, $carouselTitle, $image]);
    }

    // Handle updates for antara-update
    foreach ($_POST['updates'] as $update) {
        $id = $update['id'];
        $title = $update['title'];
        $date = $update['date'];
        $text = $update['text'];
        $link = $update['link'];

        $image = $_POST['existing_image'][$id];

        if (isset($_FILES['image']['name'][$id]) && $_FILES['image']['name'][$id] != '') {
            $image = uploadImage([
                'name' => $_FILES['image']['name'][$id],
                'tmp_name' => $_FILES['image']['tmp_name'][$id],
                'error' => $_FILES['image']['error'][$id],
                'size' => $_FILES['image']['size'][$id]
            ], $title);
        }

        $sql = "UPDATE updates SET title = ?, date = ?, text = ?, image = ?, link = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title, $date, $text, $image, $link, $id]);
    }

    echo "<div class='alert alert-success'>Data berhasil diperbarui.</div>";
}

// Fetching carousel data
$carouselImages = $pdo->query("SELECT id, title, image FROM carousel ORDER BY id ASC")->fetchAll(PDO::FETCH_ASSOC);

// Fetching updates data
$sql = "SELECT id, title, date, text, image, link FROM updates";
$stmt = $pdo->query($sql);
$updates = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Admin Dashboard</h1>
        <form method="POST" action="" enctype="multipart/form-data">
            <h2>Kelola Carousel</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Slide</th>
                        <th>Title</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 1; $i <= 3; $i++): 
                        $carousel = $carouselImages[$i-1] ?? ['id' => $i, 'title' => '', 'image' => 'assets/img/carousel-img/carousel-' . $i . '.jpg'];
                    ?>
                        <tr>
                            <td>Slide <?= $carousel['id'] ?></td>
                            <td><input type="text" name="carousel_title[<?= $carousel['id'] ?>]" value="<?= htmlspecialchars($carousel['title']) ?>" class="form-control"></td>
                            <td>
                                <input type="file" name="carousel_image[<?= $carousel['id'] ?>]" accept=".jpg, .jpeg, .png" class="form-control">
                                <img src="<?= htmlspecialchars($carousel['image']) ?>" alt="Carousel Image" style="width: 100px; margin-top: 10px;">
                            </td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
            
            <h2>Antara Update</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Text</th>
                        <th>Link</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($updates as $row): ?>
                        <tr>
                            <td><input type="hidden" name="updates[<?= $row['id'] ?>][id]" value="<?= $row['id'] ?>"><?= $row['id'] ?></td>
                            <td><input type="text" name="updates[<?= $row['id'] ?>][title]" value="<?= htmlspecialchars($row['title']) ?>" class="form-control"></td>
                            <td><input type="date" name="updates[<?= $row['id'] ?>][date]" value="<?= $row['date'] ?>" class="form-control"></td>
                            <td><textarea name="updates[<?= $row['id'] ?>][text]" class="form-control"><?= htmlspecialchars($row['text']) ?></textarea></td>
                            <td><input type="url" name="updates[<?= $row['id'] ?>][link]" value="<?= htmlspecialchars($row['link']) ?>" class="form-control"></td>
                            <td>
                                <input type="hidden" name="existing_image[<?= $row['id'] ?>]" value="<?= htmlspecialchars($row['image']) ?>">
                                <input type="file" name="image[<?= $row['id'] ?>]" accept=".jpg, .jpeg, .png" class="form-control">
                                <img src="<?= htmlspecialchars($row['image']) ?>" alt="Update Image" style="width: 100px; margin-top: 10px;">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Simpan Semua Perubahan</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
