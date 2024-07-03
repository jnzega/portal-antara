<?php
include '#inc/koneksi.php';

// Fungsi untuk mengunggah gambar
function uploadImage($title, $file) {
    // Memastikan hanya file dengan format .jpg atau .png yang diterima
    $allowedTypes = ['image/jpeg', 'image/png'];
    if (!in_array($file['type'], $allowedTypes)) {
        throw new Exception('Hanya file JPG dan PNG yang diperbolehkan.');
    }

    // Mengambil ekstensi file
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    // Mengubah nama file menjadi title card dengan tanda hubung dan ekstensi yang sesuai
    $fileName = strtolower(str_replace(' ', '-', $title)) . '.' . $ext;
    $targetDir = 'assets/img/card-thumbnail/';
    $targetFile = $targetDir . $fileName;

    // Menghapus file lama jika ada
    if (file_exists($targetFile)) {
        unlink($targetFile);
    }

    // Memindahkan file yang diunggah ke direktori tujuan
    if (!move_uploaded_file($file['tmp_name'], $targetFile)) {
        throw new Exception('Gagal mengunggah gambar.');
    }

    return $targetFile;
}

// Periksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updates'])) {
    // Perulangan untuk menangani banyak pembaruan sekaligus
    foreach ($_POST['updates'] as $update) {
        $id = $update['id'];
        $title = $update['title'];
        $date = $update['date'];
        $text = $update['text'];
        $link = isset($update['link']) ? $update['link'] : '';
        $image = $update['existing_image'];

        // Menangani unggahan gambar jika ada file yang diunggah
        if (isset($_FILES['image']['name'][$id]) && $_FILES['image']['error'][$id] == UPLOAD_ERR_OK) {
            $image = uploadImage($title, [
                'name' => $_FILES['image']['name'][$id],
                'type' => $_FILES['image']['type'][$id],
                'tmp_name' => $_FILES['image']['tmp_name'][$id],
                'error' => $_FILES['image']['error'][$id],
                'size' => $_FILES['image']['size'][$id],
            ]);
        }

        $sql = "UPDATE updates SET title = ?, date = ?, text = ?, image = ?, link = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssi', $title, $date, $text, $image, $link, $id);

        if (!$stmt->execute()) {
            echo "Terjadi kesalahan: " . $conn->error;
        }

        $stmt->close();
    }

    echo "Data berhasil diperbarui.";
}

// Mendapatkan data dari database
$sql = "SELECT id, title, date, text, image, link FROM updates";
$result = $conn->query($sql);
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
        <form method="POST" enctype="multipart/form-data" action="">
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
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><input type="hidden" name="updates[<?= $row['id'] ?>][id]" value="<?= $row['id'] ?>"><?= $row['id'] ?></td>
                            <td><input type="text" name="updates[<?= $row['id'] ?>][title]" value="<?= htmlspecialchars($row['title']) ?>" class="form-control"></td>
                            <td><input type="date" name="updates[<?= $row['id'] ?>][date]" value="<?= $row['date'] ?>" class="form-control"></td>
                            <td><textarea name="updates[<?= $row['id'] ?>][text]" class="form-control"><?= htmlspecialchars($row['text']) ?></textarea></td>
                            <td><input type="text" name="updates[<?= $row['id'] ?>][link]" value="<?= htmlspecialchars($row['link']) ?>" class="form-control"></td>
                            <td>
                                <input type="file" name="image[<?= $row['id'] ?>]" accept=".jpg, .png" class="form-control">
                                <input type="hidden" name="updates[<?= $row['id'] ?>][existing_image]" value="<?= htmlspecialchars($row['image']) ?>">
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>

<?php
$conn->close();
?>
