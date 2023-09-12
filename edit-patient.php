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
    Header("Location: patients.php?edit-patient-msg=permission");
    exit();
  }

  if ($_POST["Patients"] == null) {
    echo "No patient selected";
  } else {
    $fullname = $_POST["Patients"];
    $names = explode(" ", $fullname);
    $fname = $names[0];
    $lname = $names[1];

    if (isset($_POST["discharge-button"])) {
      $sql = "DELETE FROM patients WHERE Firstname = '$fname' && Lastname = '$lname';";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      Header("Location: patients.php?edit-patient-msg=success");

      $conn = null;
      $stmt = null;
      exit();
    } else {
      $selection = $_POST["selected-attribute"];
      $value = $_POST["new-value"];

      if ($selection == ("Firstname")) {
        if (!ctype_alpha($value)) {
          Header("Location: patients.php?edit-patient-msg=name");
          exit();
        }
      } else if ($selection == ("Lastname")) {
        if (!ctype_alpha($value)) {
          Header("Location: patients.php?edit-patient-msg=name");
          exit();
        }
      } else if ($selection == ("Email")) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
          Header("Location: patients.php?edit-patient-msg=email");
          exit();
        }
      } else if ($selection == ("Phonenumber")) {
        if (!ctype_alnum($value)) {
          Header("Location: patients.php?edit-patient-msg=phone");
          exit();
        } else if (strlen($value) != 10) {
          Header("Location: patients.php?edit-patient-msg=phone");
          exit();
        } else {
          $value =
            substr($value, -10, -7) . "-" .
            substr($value, -7, -4) . "-" .
            substr($value, -4);
        }
      }
      $sql = "UPDATE patients SET $selection = '$value' WHERE Firstname = '$fname' && Lastname = '$lname';";

      $stmt = $conn->prepare($sql);
      $stmt->execute();

      Header("Location: patients.php?edit-patient-msg=success");

      $conn = null;
      $stmt = null;
      exit();
    }
  }
}
