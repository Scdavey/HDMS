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
  <script defer src="modals.js"></script>
  <title>Patients</title>
</head>

<body>

  <nav>
    <button data-modal-target='#modal'>Add Patient</button>
    <h1>Patients</h1>
    <button>Dischage Patient</button>
  </nav>

  <div class="modal" id="modal">
    <h2>Add Patient</h2>
    <h3>Enter Patient Information</h3>
    <form action="process-patient.php" method="post">
      <p>First Name</p>
      <input name="Firstname" type="text" placeholder="Enter first name here">
      <p>Last Name</p>
      <input name="Lastname" type="text" placeholder="Enter last name here">
      <p>Email Address</p>
      <input name="Email" type="text" placeholder="Enter email here">
      <p>Phone Number</p>
      <input name="Phonenumber" type="text" placeholder="Enter phone number here">
      <p>Reason for Admition</p>
      <input name="Reason" type="text" placeholder="Enter reason for admition">
      <div class="button-container">
        <button data-close-button class="close-button">Close</button>
        <button type="submit">Submit</button>
      </div>
    </form>
  </div>

  <div id="overlay"></div>

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