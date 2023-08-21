<?php
session_start();
include_once "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="patients.css" />
  <title>Patients</title>
</head>

<body>

  <nav>
    <button>Add Patient</button>
    <h1>Patients</h1>
    <button>Dischage Patient</button>
  </nav>

  <div class="table-wrapper">
    <table>
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>PhoneNumber</th>
          <th>Admitted</th>
          <th>Reason</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM patients";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        while ($row = $result->fetch_assoc()) {
          echo "<tr>
        <td>" . $row["Firstname"] . "</td>
        <td>" . $row["Lastname"] . "</td>
        <td>" . $row["Email"] . "</td>
        <td>" . $row["Phonenumber"] . "</td>
        <td>" . $row["Admitted"] . "</td>
        <td>" . $row["Reason"] . "</td>
      </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <a class="home" href="home.php">Home</a>
  <?php if (isset($_SESSION["userid"])) : ?>
    <a class="logout" href="logout.php">Logout</a>
  <?php endif ?>
</body>

</html>