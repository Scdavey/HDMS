<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = $_POST["Firstname"];
  $lname = $_POST["Lastname"];
  $email = $_POST["Email"];
  $phonenumber = $_POST["Phonenumber"];
  $reason = $_POST["Reason"];
  $admitted = date("Y-m-d");

  if (
    empty($fname) ||
    empty($lname) ||
    empty($email) ||
    empty($phonenumber) ||
    empty($reason)
  ) {
    die("Missing valid information");
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Enter valid email");
  }

  require_once "connection.php";
  $query = "INSERT INTO patients (Lastname, Firstname, Email, Phonenumber, Admitted, Reason)
            VALUES (?, ?, ?, ?, ?, ?);";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("ssssss", $lname, $fname, $email, $phonenumber, $admitted, $reason);

  try {
    $stmt->execute();
    echo "Patient added successfully";
  } catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
      die("Email already in use");
    } else {
      throw $e;
    }
  }
  $conn = null;
  $stmt = null;
  exit();
}
