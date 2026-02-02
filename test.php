<?php
class TerminDB {
    private PDO $pdo;

    public function __construct(string $host, string $db, string $user, string $pwd, string $charset = "utf8mb4") {
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        try {
            $this->pdo = new PDO($dsn, $user, $pwd, $opt);
        } catch (Exception $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    // READ - merr të gjitha terminet
    public function getAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM terminet");
        return $stmt->fetchAll();
    }

    // CREATE
    public function create(string $emri_mbiemri, string $created_at): bool {
        $sql = "INSERT INTO terminet (emri_mbiemri, created_at) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$emri_mbiemri, $created_at]);
    }

    // DELETE individual
    public function delete(int $id): bool {
        $sql = "DELETE FROM terminet WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }


    // UPDATE
    public function update(int $id, string $emri_mbiemri, string $created_at): bool {
        $sql = "UPDATE terminet SET emri_mbiemri = ?, created_at = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$emri_mbiemri, $created_at, $id]);
    }
}


$terminDB = new TerminDB("localhost", "pdo_db_test", "root", "");

// INSERT nga forma POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['emri_mbiemri'], $_POST['datetime'])) {
    $status = $terminDB->create($_POST['emri_mbiemri'], $_POST['datetime']) ? 1 : 0;
    header("Location: ?action=insert&status=$status");
    exit;
}

// DELETE individual
if(isset($_GET['action'], $_GET['id']) && $_GET['action'] === 'delete'){
    $status = $terminDB->delete((int)$_GET['id']) ? 1 : 0;
    header("Location: ?action=delete&status=$status");
    exit;
}

// UPDATE 
if(isset($_GET['action'], $_GET['id']) && $_GET['action'] === 'edit'){
    $terminDB->update((int)$_GET['id'], "Filan Fisteku", "2025-11-25");
    header("Location: ?action=update&status=1");
    exit;
}

// Merr të gjitha terminet për shfaqje
$terminet = $terminDB->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Termin CRUD OOP</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container my-4">

<?php if(isset($_GET['status'])): ?>
<div class="alert <?= $_GET['status'] == 1 ? 'alert-success' : 'alert-danger' ?>">
    <?php
    switch($_GET['action']){
        case "insert": echo $_GET['status']==1?"Insert was performed successfully":"Something went wrong while inserting data!"; break;
        case "delete": echo $_GET['status']==1?"Delete was performed successfully":"Something went wrong while deleting data!"; break;
        case "delete_all": echo $_GET['status']==1?"All patients deleted successfully":"Something went wrong while deleting all patients!"; break;
        case "update": echo $_GET['status']==1?"Update was performed successfully":"Something went wrong while updating data!"; break;
    }
    ?>
</div>
<?php endif; ?>



<?php if(count($terminet)): ?>
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Emri dhe Mbiemri</th>
            <th>Status</th>
            <th>Data dhe Ora</th>
            <th>Actions</th>
        </tr>
        <?php foreach($terminet as $termin): ?>
        <tr>
            <td><?= $termin['id'] ?></td>
            <td><?= $termin['emri_mbiemri'] ?></td>
            <td><?= $termin['status'] ?></td>
            <td><?= $termin['created_at'] ?></td>
            <td>
                <a href="?action=edit&id=<?= $termin['id'] ?>" class="btn btn-sm btn-link">Edit</a>
                <a href="?action=delete&id=<?= $termin['id'] ?>" class="btn btn-sm btn-link">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php else: ?>
<div class="alert alert-info">No patients found.</div>
<?php endif; ?>

<div class="container my-5">
<form method="post">
    <div class="mb-3">
        <input type="text" name="emri_mbiemri" class="form-control" placeholder="Emri dhe mbiemri" required>
    </div>
    <div class="mb-3">
        <input type="date" name="datetime" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-sm btn-primary">Save</button>
</form>
</div>
</body>
</html>
