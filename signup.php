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