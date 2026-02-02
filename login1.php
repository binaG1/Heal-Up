<?php
session_start();
include_once 'Database.php';
include_once 'Studenti.php';

$errorMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $db = new Database();
        $connection = $db->getConnection();
        $user = new Studenti($connection);

        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($user->login($email, $password)) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['email']   = $email;
            $_SESSION['password']    = $password;

            if (isset($_POST['remember'])) {
                $expires = time() + 86400; 
                setcookie("email", $email, $expires, "/");
                setcookie("password", $password, $expires, "/");
            }

            header("Location: dashboard.php");
            exit();
        } else {
            $errorMessage = "Invalid login credentials!";
        }
    }
    

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
  <script defer src="validation.php"></script>
  <style>
    .error-message{
      color: red;
        
    }
  .remember-container {
    margin-top: 10px;
    font-size: 15px;
    display: flex;          
    align-items: center;    
    justify-content: flex-start; 
    margin-right: 270px;
  }

  </style>
</head>

<body class="login-page">

  <div class="login-box">
    <h1>HEAL-UP</h1>
    <h2>LOG IN</h2>

    <form class="box" action="login1.php" method="POST">
        <span id="email-error" class="error-message"> <?php if (!empty($errorMessage)) echo $errorMessage; ?>
      </span>
      <input type="email" name="email" placeholder="Write your email" required><br>
      <input type="password" name="password" placeholder="Write your Password" required><br>
      
      <div class="remember-container">
        <input type="checkbox" id="remember" name="remember">
        <label for="remember">Remember  </label> 
      </div>

      <button type="submit" name="login" >LOG IN</button><br>
    </form>

    <p class="sup">Don't have an account? <a href="Register.php">Sign up</a></p>
    <p class="reviews-text"><a href="reviews.php">Reviews</a></p>
    <div class="social-icons">
      <img src="images.jpg" alt="social-icons" width="30">
    </div>
  </div>

</body>
</html>