<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once "connection.php";

  $userID = $_SESSION["userid"];
  $sql = "SELECT COUNT(*) AS total FROM users WHERE UserID = '$userID' AND Role = 'Administrator';";
  $result = $conn->query($sql);
  $hasMatch = $result->fetch_assoc()['total'];
  if ($hasMatch == 0) {
    Header("Location: staff.php?edit-staff-msg=permission");
    exit();
  }

  if ($_POST["Staff"] == null) {
    echo "No staff selected";
  } else {
    $fullname = $_POST["Staff"];
    $names = explode(" ", $fullname);
    $fname = $names[0];
    $lname = $names[1];

    if (isset($_POST["discharge-button"])) {
      $sql = "DELETE FROM users WHERE Firstname = '$fname' && Lastname = '$lname';";
      $stmt = $conn->prepare($sql);
      $stmt->execute();

      Header("Location: staff.php?edit-staff-msg=success");

      $conn = null;
      $stmt = null;
      exit();
    } else {
      $selection = $_POST["selected-attribute"];
      $value = $_POST["new-value"];

      if ($selection == ("Firstname")) {
        if (!ctype_alpha($value)) {
          Header("Location: staff.php?edit-staff-msg=name");
          exit();
        }
      } else if ($selection == "Lastname") {
        if (!ctype_alpha($value)) {
          Header("Location: staff.php?edit-staff-msg=name");
          exit();
        }
      } else if ($selection == ("Email")) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
          Header("Location: staff.php?edit-staff-msg=email");
          exit();
        }
      } else if ($selection == ("Phonenumber")) {
        if (!is_numeric($value)) {
          Header("Location: staff.php?edit-staff-msg=phone");
          exit();
        } else if (strlen($value) != 10) {
          Header("Location: staff.php?edit-staff-msg=phone");
          exit();
        } else {
          $value =
            substr($value, -10, -7) . "-" .
            substr($value, -7, -4) . "-" .
            substr($value, -4);
        }
      }
      $sql = "UPDATE users SET $selection = '$value' WHERE Firstname = '$fname' && Lastname = '$lname';";

      $stmt = $conn->prepare($sql);

      try {
        $stmt->execute();
      } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
          Header("Location: staff.php?edit-staff-msg=used");
          exit();
        } else {
          throw $e;
        }
      }

      Header("Location: staff.php?edit-staff-msg=success");

      $conn = null;
      $stmt = null;
      exit();
    }
  }
}
