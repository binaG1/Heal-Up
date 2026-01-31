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

    <form class="box">
      <div class="form-group">
        <label for="name">Your Name</label>
        <input type="text" id="name" placeholder="Enter your name">
      </div>

      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" placeholder="Enter your email">
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Enter your password">
      </div>

      <div class="form-group">
        <label for="confirm">Confirm Password</label>
        <input type="password" id="confirm" placeholder="Confirm your password">
      </div>

      <button type="submit">Sign up</button>
    </form>

    <p>Already have an account? <a href="login.html">Log In</a></p>
  </div>

</body>

</html>