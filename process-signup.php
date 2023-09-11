<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $email = $_POST["email"];
  $phonenumber = $_POST["phonenumber"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $rptpassword = $_POST["rptpassword"];

  if (
    empty($fname) ||
    empty($lname) ||
    empty($email) ||
    empty($phonenumber) ||
    empty($username) ||
    empty($password) ||
    empty($rptpassword)
  ) {
    header("Location: signup.php?signup=empty");
    exit();
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: signup.php?signup=email");
    exit();
  } else if (strlen($password) < 8) {
    header("Location: signup.php?signup=passShort");
    exit();
  } else if (!preg_match("/[a-z]/i", $password)) {
    header("Location: signup.php?signup=passLetter");
    exit();
  } else if (!preg_match("/[0-9]/", $password)) {
    header("Location: signup.php?signup=passNumber");
    exit();
  } else if ($password !== $rptpassword) {
    header("Location: signup.php?signup=passMatch");
    exit();
  } else if (!ctype_alnum($phonenumber)) {
    Header("Location: signup.php?signup=phone");
    exit();
  } else if (strlen($phonenumber) != 10) {
    Header("Location: signup.php?signup=phone");
    exit();
  } else {
    $phonenumber =
      substr($phonenumber, -10, -7) . "-" .
      substr($phonenumber, -7, -4) . "-" .
      substr($phonenumber, -4);
  }

  $password_hash = password_hash($password, PASSWORD_DEFAULT);
  require_once "connection.php";
  $query = "INSERT INTO users (Lastname, Firstname, Email, Phonenumber, Username, Password)
              VALUES (?, ?, ?, ?, ?, ?);";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("ssssss", $lname, $fname, $email, $phonenumber, $username, $password_hash);
  try {
    $stmt->execute();
    header("Location: signup.php?signup=success");
    exit();
  } catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
      header("Location: signup.php?signup=unique");
      exit();
    } else {
      throw $e;
    }
  }
}
