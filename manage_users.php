<?php
    session_start();
    include_once 'Database.php'; 

    if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Admin') {
        header("Location: login1.php");
        exit();
    }

   
    $db = new Database();
    $connection = $db->getConnection();


    $query = "SELECT id, name, surname, email, role FROM Studenti";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Menaxho Përdoruesit</title>
    <style>
        body{
            font-family: Arial, sans-serif;
        }
        table { 
            border-collapse: collapse;
            width: 90%; 
            margin: 20px auto;

         }
        th, td { 
            border: 1px solid #ccc; 
            padding: 8px; 
            text-align: center; 
        }
        th { 
        background-color: #f2f2f2;
         }
       .back-btn { 
            position: fixed; 
            bottom: 20px; 
            left: 20px; 
            background: #007BFF; 
            color: #fff;
             padding: 10px 15px; 
             border-radius: 5px; 
             text-decoration: none; 
        }
        .back-btn:hover {
            background: #0056b3;
        }
        .stats{
           text-decoration:none;
           position: fixed;
            bottom:20px;
            right: 20px;
            color: white;
            background-color: #007BFF;
            padding: 10px 15px;
            border-radius: 5px; 
            font-size: 18px;
        }
         .stats:hover {
           background-color: #0056b3;
        }
    </style>
</head>
<body>
    <a href="stats.php" class="stats">Statistikat për Përdoruesit</a>
    <h2 style="text-align:center;">Lista e Përdoruesve</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Emri</th>
            <th>Mbiemri</th>
            <th>Email</th>
            <th>Roli</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['id']); ?></td>
            <td><?php echo htmlspecialchars($user['name']); ?></td>
            <td><?php echo htmlspecialchars($user['surname']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td><?php echo htmlspecialchars($user['role']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    
  <a href="dashboard.php" class="back-btn">⬅ Go Back</a>
</body>
</html>
