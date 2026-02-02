<?php

    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "pdo_db_test";
    $charset = "utf8mb4";
    $opt = [];

    $dns = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
    $pdo = new PDO($dns, $user, $pwd, $opt);
    }catch(Exception $e){
        echo $e->getMessage();
    }
    

    //SELECT(Read)

    $sql = "SELECT * FROM `terminet`";
    $stmt = $pdo->query($sql);

    $terminet = [];
    while($row = $stmt->fetch()){
        $terminet[] = $row;
    }


    //CREATE

    $emri_mbiemri = "Filan Fisteku";
    $created_at = "2026-02-02";
    

    $sql = "INSERT INTO `terminet` (`emri_mbiemri`, `created_at`) VALUES(?, ?)";
    $stmt = $pdo->prepare($sql);
    if($stmt->execute([$emri_mbiemri,$created_at])){
       // header("Location: ?action=insert&status=1");
    }else{
        //header("Location: ?action=insert&status=0");
        
    }


    //DELETE

    if(isset)
    $id = 30;
    $sql = "DELETE FROM `terminet` WHERE `id`=?";
    $stmt = $pdo->prepare($sql);
    if($stmt->execute([$id])){
       // header("Location: ?action=insert&status=1");
       echo "Yes";
    }else{
        //header("Location: ?action=insert&status=0");
        echo "No";
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
</head>
<body>

<div class="container m-4">

<div class="alert <?= (isset($_GET['status']) && ($_GET['status'] == 1)) ? 'alert-success' : 'alert-danger' ?>">
    <?php if(isset($_GET['action'])): ?>
    <?php switch($_GET['action']){
        case "insert":
            if(isset($_GET['status'])) {
                if($_GET['status'] == 1){
                    echo "Insert was performed successfully";
                }else if($_GET['status'] == 0){
                    echo "Something went wrong while inserting data!";
                }
            }
        break;
        }
    ?>
    <?php endif ?>
</div>
    <?php if(count($terminet)):?>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Emri dhe Mbiemri</th>
                <th>Status</th>
                <th>Data dhe Ora</th>
                <th>Actions</th>
            </tr>
            <?php foreach($terminet as $terminet): ?>
                <tr>
                    <td><?= $terminet['id']?></td>
                    <td><?= $terminet['emri_mbiemri']?></td>
                    <td><?= $terminet['status']?></td>
                    <td><?= $terminet['created_at']?></td>
                    <td>
                        <a href="?action=edit" class="btn btn-sm btn-link">
                            Edit
                        </a>
                        <a href="?action=delete" class="btn btn-sm btn-link">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php else: ?>
        <div class="alert alert-info">
            You haven't define any termin!
        </div>
    <?php endif; ?>
</div>


<div class="container my-5">
    <form action="">
        <div class="mb-3">
            <input type="text" name="emri_mbiemri"class="form-control" placeholder="Shkruani emrin dhe mbiemrin e pacientit">
        </div>

        <div class="mb-3">
            <input type="date" name="datetime" class="form-control" placeholder="Shkruani daten dhe oren e terminit">
        </div>
        <button type="submit" class="btn btn-sm btn-primary">Save</button>
    </form>
</div>
</body> 
</html>