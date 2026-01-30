<?php
include_once 'Database.php';
include_once 'Studenti.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new Studenti($connection);

    $name     = $_POST['name'];
    $surname  = $_POST['surname'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $confirm  = $_POST['confirm'];
    $role     = $_POST['role'];

   
    if ($password !== $confirm) {
        echo "Passwords do not match!";
        exit;
    }


    if ($user->register($name, $surname, $email, $password, $role)) {

        if (strcasecmp($role, 'Admin') === 0) {
            header("Location: dashboard.php"); 
        } else {
            header("Location: login1.php"); 
        }
        exit;
    } else {
        echo "Registration failed!";
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="style.css">
</head>

<body class="signup-page">

  <div class="signup-box">
    <h1>Create Account</h1>
    <h2>Sign Up</h2>

   <form class="box" action="Register.php" method="POST">
  <div class="form-group">
    <label for="name"> Name</label>
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

  <div class="form-group">
  <label for="role">Role</label>
  <select id="role" name="role" required>
    <option value="">--Choose role --</option>
    <option value="user">User</option>
    <option value="admin">Admin</option>
  </select>
</div>


  <button type="submit">Sign up</button>
</form>


    <p>Already have an account? <a href="login1.php">Log In</a></p>
  </div>

</body>

</html>