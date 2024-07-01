<?php
include '#inc/koneksi.php';

// Periksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $text = $_POST['text'];
    $image = $_POST['image'];

    $sql = "UPDATE updates SET title = ?, date = ?, text = ?, image = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssi', $title, $date, $text, $image, $id);

    if ($stmt->execute()) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }

    $stmt->close();
}

// Mendapatkan data dari database
$sql = "SELECT id, title, date, text, image FROM updates";
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
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Text</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <form method="POST" action="">
                            <td><input type="hidden" name="id" value="<?= $row['id'] ?>"><?= $row['id'] ?></td>
                            <td><input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" class="form-control"></td>
                            <td><input type="date" name="date" value="<?= $row['date'] ?>" class="form-control"></td>
                            <td><textarea name="text" class="form-control"><?= htmlspecialchars($row['text']) ?></textarea></td>
                            <td><input type="text" name="image" value="<?= htmlspecialchars($row['image']) ?>" class="form-control"></td>
                            <td><button type="submit" class="btn btn-primary">Update</button></td>
                        </form>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>

<?php
$conn->close();
?>
