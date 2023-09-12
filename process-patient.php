<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once "connection.php";

  $userID = $_SESSION["userid"];
  $sql = "SELECT Role AS role FROM users WHERE UserID = '$userID';";
  $result = $conn->query($sql);
  $userRole = $result->fetch_assoc()['role'];
  $roles = array("Administrator", "Doctor", "Nurse");
  if (!in_array($userRole, $roles)) {
    Header("Location: patients.php?process-patient-msg=permission");
    exit();
  }

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
    Header("Location: patients.php?process-patient-msg=missing");
    exit();
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    Header("Location: patients.php?process-patient-msg=invalid");
    exit();
  }

  if (!ctype_alnum($phonenumber)) {
    Header("Location: patients.php?process-patient-msg=phone");
    exit();
  } else if (strlen($phonenumber) != 10) {
    Header("Location: patients.php?process-patient-msg=phone");
    exit();
  } else {
    $phonenumber =
      substr($phonenumber, -10, -7) . "-" .
      substr($phonenumber, -7, -4) . "-" .
      substr($phonenumber, -4);
  }

  $query = "INSERT INTO patients (Lastname, Firstname, Email, Phonenumber, Admitted, Reason)
            VALUES (?, ?, ?, ?, ?, ?);";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("ssssss", $lname, $fname, $email, $phonenumber, $admitted, $reason);

  try {
    $stmt->execute();
  } catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
      Header("Location: patients.php?process-patient-msg=used");
      exit();
    } else {
      throw $e;
    }
  }

  Header("Location: patients.php?process-patient-msg=success");

  $conn = null;
  $stmt = null;
  exit();
}
