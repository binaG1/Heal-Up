<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Admin') {
    header("Location: login1.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menaxho Faqet</title>
    <style>
        body {
             font-family: Arial, sans-serif;
              background: #f4f4f4; 
            }
        .container { 
            width: 90%;
             margin: 30px auto; 
             background: #fff; 
             padding: 20px; 
             border-radius: 8px; 
            }
        h2 { 
            text-align: center; 
         }
        .actions { 
            margin: 20px 0;
             text-align: center; 
            }
        .btn { display: inline-block; 
            padding: 10px 20px; 
            margin: 5px; 
            background: #007BFF; 
            color: #fff; 
            text-decoration: none; 
            border-radius: 5px; 
        }
        .btn:hover { 
            background: #0056b3; 
        }
        table { 
            border-collapse: collapse; 
            width: 100%; 
            margin-top: 20px; 
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
        @media (max-width: 600px) { 
            .container { 
                width: 100%; 
                margin: 20px auto;
                padding: 15px;
            }
         }
    </style>
</head>
<body>
    <div class="container">
        <h2>Menaxho Faqet</h2>
        <p>Këtu admini mund të shtojë ose modifikojë faqet e sistemit.</p>

        
        <div class="actions">
            <a href="add_page.php" class="btn">➕ Shto Faqe</a>
            <a href="edit_page.php" class="btn">✏️ Modifiko Faqe</a>
            <a href="delete_page.php" class="btn">🗑️ Fshij Faqe</a>
        </div>

        
        <table>
            <tr>
                <th>ID</th>
                <th>Titulli</th>
                <th>URL</th>
                <th>Veprime</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Faqja Kryesore</td>
                <td>index.php</td>
                <td>
                    <a href="edit_page.php?id=1" class="btn">Edit</a>
                    <a href="delete_page.php?id=1" class="btn">Delete</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Rreth Nesh</td>
                <td>about.php</td>
                <td>
                    <a href="edit_page.php?id=2" class="btn">Edit</a>
                    <a href="delete_page.php?id=2" class="btn">Delete</a>
                </td>
            </tr>
        </table>
    </div>


    <a href="dashboard.php" class="back-btn">⬅ Go Back</a>
</body>
</html>
