<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles.css" />
  <title>Home</title>
</head>

<body>

  <h1>Home</h1>

  <?php if (isset($_SESSION["userid"])) : ?>
    <p>You are loggin in</p>

  <?php else : ?>
    <a href="index.php"> Log in </a>
    <a href="signup.php">Sign up</a>

  <?php endif ?>
</body>

</html>