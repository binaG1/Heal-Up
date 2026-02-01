<?php
session_start();
if (!isset($_SESSION['user_id']) ) {
    header("Location: login1.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background: #f4f4f4; 
        }
        .container { 
        width: 80%;
            margin: 50px auto; 
            background: #fff;
            padding: 20px; 
            border-radius: 8px; 
          }
        h1 { 
        text-align: center; 
        }
        ul { 
            list-style: none; 
            padding: 0; 
        }
        li { 
         margin: 10px 0; 
        }
        a { 
            text-decoration: none; 
            color: #333; 
            font-weight: bold; }
        a:hover { 
            color: #007BFF; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome Admin</h1>
        <p>Menaxho sistemin përmes opsioneve më poshtë:</p>
        <ul>
            <li><a href="manage_users.php">👥 Menaxho Përdoruesit</a></li>
            <li><a href="manage_pages.php">📄 Menaxho Faqet</a></li>
            <li><a href="manage_content.php">📝 Menaxho Përmbajtjen</a></li>
        </ul>
        
        <p><a href="login1.php">🔑 Go to Log in</a></p>
        <p><a href="logout.php">🚪 Log out</a></p>
    </div>
</body>
</html>

