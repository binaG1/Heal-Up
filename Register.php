<?php
include_once 'Database.php'; 
include_once 'Studenti.php'; 

$registrationError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name     = trim($_POST['name']);
    $surname  = trim($_POST['surname']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm  = trim($_POST['confirm']);

    $db = new Database();
    $connection = $db->getConnection();
    $user = new Studenti($connection);

    if ($email == 'ga1@gmail.com' || $email == 'godenii@gmail.com' || $email == '1234@gmail.com') { 
        $role = 'Admin'; 
    } else { 
        $role = 'User'; 
    }
    
    if ($user->register($name, $surname, $email, $password, $role)) {
        header("Location: login1.php");
        exit;
    } else {
      $registrationError = true;    
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .error-msg {
      color: red;
      font-size: 12px;
      margin-top: 2px;
    }
  </style>
</head>
<body class="signup-page">
  <div class="signup-box">
    <h1>Create Account</h1>
    <h2>Sign Up</h2>

    <form id="signupForm" class="box" action="Register.php" method="POST">
      <div class="form-group">
        <label for="name">Name</label>  
        <input type="text" id="name" name="name" placeholder="Enter your name" required>
      </div>

      <div class="form-group">
        <label for="surname">Surname</label>
        <input type="text" id="surname" name="surname" placeholder="Enter your surname" required>
      </div>

      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>

      <div class="form-group">
        <label for="confirm">Confirm Password</label>
        <input type="password" id="confirm" name="confirm" placeholder="Confirm your password" required>
      </div>

      <?php if ($registrationError): ?>
      <div style="color:red; text-align:center; margin-top:20px;">
      This email is already registered. Please log in instead.
      </div>
    <?php endif; ?>

      <button type="submit">Sign up</button>
    </form>

    <p>Already have an account? <a href="login1.php">Log In</a></p>
  </div>

  <script src="validation.js"></script>
</body>
</html>
