<?php
$is_invalid = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once "connection.php";
  $username = $_POST["username"];
  $password = $_POST["password"];
  $sql = sprintf(
    "SELECT * FROM users
    WHERE Username = '%s'",
    $conn->real_escape_string($username)
  );
  $result = $conn->query($sql);
  $user = $result->fetch_assoc();

  if ($user) {
    if (password_verify($password, $user["Password"])) {
      session_start();
      session_regenerate_id();
      $_SESSION["userid"] = $user["UserID"];
      header("Location: patients.php");
      exit;
    }
  }

  $is_invalid = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="login-signup.css" />
  <title>Login</title>
</head>

<body>
  <div class="login-box">
    <h1>General Hospital</h1>
    <h2>Sign in</h2>

    <?php if ($is_invalid) : ?>
      <p class="error">Invalid Login</p>
    <?php endif; ?>
    <form method="post">
      <p>Username</p>
      <input type="text" name="username" placeholder="Enter username here" value="<?= htmlspecialchars($_POST["username"] ?? "") ?>">
      <p>Password</p>
      <input type="text" name="password" placeholder="Enter password here" />
      <div class="login-container">
        <a href="signup.php">Create account</a>
        <button type="submit">Login</button>
      </div>
    </form>
  </div>
</body>

</html>