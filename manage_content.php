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

    <title>Menaxho Përmbajtjen</title>
    <style>
        body { 
            font-family: Arial, sans-serif;
             background: #f4f4f4;
              margin: 0; padding: 0; 
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
            margin-bottom: 20px; 
        }
        p { 
            text-align: center; 
            margin-bottom: 20px;
         }
        .actions { 
            text-align: center; 
            margin-bottom: 20px; 
        }
        .btn { 
            display: inline-block; 
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
         .stats-re{
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
         .stats-re:hover {
           background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
            <a href="stats-re.php" class="stats-re">Statistikat për Reviews</a>
        <h2>Menaxho Përmbajtjen</h2>
        <p>Këtu admini mund të shtojë ose modifikojë artikuj, postime, etj.</p>

     
        <div class="actions">
            <a href="add_content.php" class="btn">➕ Shto Artikull</a>
            <a href="edit_content.php" class="btn">✏️ Modifiko Artikull</a>
            <a href="delete_content.php" class="btn">🗑️ Fshij Artikull</a>
        </div>

       
        <table>
            <tr>
                <th>ID</th>
                <th>Titulli</th>
                <th>Autori</th>
                <th>Data</th>
                <th>Veprime</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Artikulli i parë</td>
                <td>Albina</td>
                <td>2026-02-05</td>
                <td>
                    <a href="edit_content.php?id=1" class="btn">Edit</a>
                    <a href="delete_content.php?id=1" class="btn">Delete</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Postimi i dytë</td>
                <td>Anisa</td>
                <td>2026-02-04</td>
                <td>
                    <a href="edit_content.php?id=2" class="btn">Edit</a>
                    <a href="delete_content.php?id=2" class="btn">Delete</a>
                </td>
            </tr>
        </table>
    </div>

   
    <a href="dashboard.php" class="back-btn">⬅ Go Back</a>
</body>
</html>
