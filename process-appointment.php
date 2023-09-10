<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once "connection.php";
  $pname = $_POST["Pname"];
  $dname = $_POST["Dname"];
  $date = $_POST["Date"];
  $room = $_POST["Room"];
  $reason = $_POST["Reason"];

  $date = new DateTime($date);
  $date = $date->format('Y-m-d H:i:s');
  $currentDate = new DateTime();
  $currentDate = $currentDate->format('Y-m-d H:i:s');

  if (
    empty($pname) ||
    empty($dname) ||
    empty($date) ||
    empty($room) ||
    empty($reason)
  ) {
    Header("Location: appointments.php?process-appointment-msg=missing");
    exit();
  }

  if ($date < $currentDate) {
    Header("Location: appointments.php?process-appointment-msg=date");
    exit();
  }

  $sql = "SELECT COUNT(*) AS total FROM appointments WHERE Date = '$date' AND Room = '$room';";
  $result = $conn->query($sql);
  $hasMatch = $result->fetch_assoc()['total'];
  if ($hasMatch != 0) {
    Header("Location: appointments.php?process-appointment-msg=appointment");
    exit();
  }

  $query = "INSERT INTO appointments (Pname, Dname, Date, Room, Reason)
            VALUES (?, ?, ?, ?,?);";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("sssss", $pname, $dname, $date, $room, $reason);
  $stmt->execute();

  Header("Location: appointments.php?process-appointment-msg=success");

  $conn = null;
  $stmt = null;
  exit();
}
