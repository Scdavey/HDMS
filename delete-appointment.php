<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once "connection.php";
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
