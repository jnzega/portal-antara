<?php
include '#inc/koneksi.php';

function uploadImage($file, $title) {
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
    if (!in_array($fileExtension, $allowedExtensions)) {
        throw new Exception("Format file tidak didukung.");
    }

    $targetDir = 'assets/img/card-thumbnail/';
    $targetFile = $targetDir . preg_replace("/[^a-zA-Z0-9]+/", "-", strtolower($title)) . '.' . $fileExtension;

    if (!move_uploaded_file($file['tmp_name'], $targetFile)) {
        throw new Exception("Gagal mengunggah file.");
    }

    return $targetFile;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    echo "Data berhasil diperbarui.";
}

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
                                <input type="file" name="image[<?= $row['id'] ?>]" class="form-control">
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
