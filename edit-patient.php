<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once "connection.php";

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
      echo "Patient discharged successfully";

      $conn = null;
      $stmt = null;
      exit();
    } else {
      $selection = $_POST["selected-attribute"];
      $value = $_POST["new-value"];

      $sql = "UPDATE patients SET $selection = '$value' WHERE Firstname = '$fname' && Lastname = '$lname';";

      $stmt = $conn->prepare($sql);
      $stmt->execute();

      echo "Patient updated successfully";

      $conn = null;
      $stmt = null;
      exit();
    }
  }
}
