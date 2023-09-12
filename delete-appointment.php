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
    Header("Location: appointments.php?delete-appointment-msg=permission");
    exit();
  }

  $name = $_POST['Pname'];
  $date = $_POST['Date'];
  $sql = "DELETE FROM appointments WHERE Pname = '$name' && Date = '$date';";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->affected_rows == 0) {
    Header("Location: appointments.php?delete-appointment-msg=none");
    exit();
  }

  Header("Location: appointments.php?delete-appointment-msg=success");

  $conn = null;
  $stmt = null;
  exit();
}
