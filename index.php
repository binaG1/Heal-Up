<?php
include_once 'Database.php';
include_once 'Re.php';

$db = new Database();
$review = new Re($db->getConnection());

// DELETE
if (isset($_GET['delete'])) {
    $review->delete((int)$_GET['delete']);
    header('Location: index.php');
    exit;
}

// EDIT
$editId = isset($_GET['edit']) ? (int)$_GET['edit'] : 0;
$editReview = null;
if ($editId > 0) {
    $editReview = $review->getById($editId);
}

// SAVE (CREATE / UPDATE)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $experience = $_POST['Experience'];
    $recommendation = $_POST['Recommendation'];

    if (isset($_POST['id'])) {
        $review->update((int)$_POST['id'], $name, $email, $experience, $recommendation);
    } else {
        $review->create($name, $email, $experience, $recommendation);
    }

    header('Location: index.php');
    exit;
}

$reviews = $review->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Reviews</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">

<h1>Menaxhimi i Reviews</h1>

<div class="card">
<h2><?= $editReview ? 'Edit Review' : 'Shto Review' ?></h2>

<form method="post">
<?php if ($editReview): ?>
    <input type="hidden" name="Id" value="<?= $editReview['Id'] ?>">
<?php endif; ?>

<label>Emri</label><br>
<input name="Name" value="<?= $editReview['Name'] ?? '' ?>" required><br><br>

<label>Email</label><br>
<input type="Email" name="Email" value="<?= $editReview['Email'] ?? '' ?>" required><br><br>

<label>Përvoja</label><br>
<textarea name="Experience"><?= $editReview['Experience'] ?? '' ?></textarea><br><br>

<label>Rekomandimi</label><br>
<textarea name="Recommendation"><?= $editReview['Recommendation'] ?? '' ?></textarea><br><br>

<button><?= $editReview ? 'Përditëso' : 'Ruaj' ?></button>

<?php if ($editReview): ?>
    <a href="index.php" class="cancel">Anulo</a>
<?php endif; ?>
</form>
</div>

<div class="card">
<h2>Lista e Reviews</h2>
<table border="1">
<tr>
    <th>ID</th><th>Emri</th><th>Email</th><th>Përvoja</th><th>Rekomandimi</th><th>Veprime</th>
</tr>
<?php foreach ($reviews as $row): ?>
<tr>
    <td><?= $row['Id'] ?></td>
    <td><?= $row['Name'] ?></td>
    <td><?= $row['Email'] ?></td>
    <td><?= $row['Experience'] ?></td>
    <td><?= $row['Recommendation'] ?></td>
    <td>
        <a href="?edit=<?= $row['Id'] ?>">Edit</a> |
        <a href="?delete=<?= $row['Id'] ?>" onclick="return confirm('A don me fshi këtë review?')">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
</div>

</div>
</body>
</html>
