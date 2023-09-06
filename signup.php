<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="login-signup.css" />
  <title>SignUp</title>
</head>

<body>
  <div class="sign-up-box">
    <h1>General Hospital</hi>
      <h2>Sign up</h2>
      <?php
      if (isset($_GET['signup'])) {
        $msg = $_GET['signup'];

        if ($msg == "empty") {
          echo "<p class='error'> Required field empty </P>";
        } else if ($msg == "email") {
          echo "<p class='error'> Invalid email</p>";
        } else if ($msg == "passShort") {
          echo "<p class='error'> Password must be atleast 8 characters</p>";
        } else if ($msg == "passLetter") {
          echo "<p class='error'> Password must contain atleast 1 letter</p>";
        } else if ($msg == "passNumber") {
          echo "<p class='error'> Password must be atleast 1 number</p>";
        } else if ($msg == "passMatch") {
          echo "<p class='error'> Passwords do not match</p>";
        } else if ($msg == "emailUsed") {
          echo "<p class='error'> Email already in use</p>";
        } else if ($msg == "emailUsed") {
          echo "<p class='error'> Invalid phone number</p>";
        } else if ($msg == "success") {
          echo "<p class='success'> Signup successful</p>";
        }
      }

      ?>
      <form action="process-signup.php" method="post">
        <div>
          <p>First Name</p>
          <input type="text" name="fname" placeholder="Enter first name here">
        </div>
        <div>
          <p>Last Name</p>
          <input type="text" name="lname" placeholder="Enter last name here">
        </div>
        <div>
          <p>Email</p>
          <input type="text" name="email" placeholder="Enter email here">
        </div>
        <div>
          <p>Phone Number</p>
          <input type="text" name="phonenumber" placeholder="Enter phone number here">
        </div>
        <div>
          <p>Username</p>
          <input type="text" name="username" placeholder="Enter username here" />
        </div>
        <div>
          <p>Password</p>
          <input type="text" name="password" placeholder="Enter password here" />
        </div>
        <div>
          <p>Repeat password</p>
          <input type="text" name="rptpassword" placeholder="Repeat password here">
        </div>
        <div class="signup-container">
          <a href="index.php">Login</a>
          <button type="submit">Sign Up</button>
        </div>
  </div>
  </form>
</body>

</html>