<?php
session_start();
include_once "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="staff.css" />
  <script defer src="modals.js"></script>
  <script defer src="nav.js"></script>
  <title>Staff</title>
</head>

<body>
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a class="nav" href="patients.php">Patients</a>
    <a class="nav" href="appointments.php">Appointments</a>
    <a class="nav" href="staff.php">Staff</a>
    <?php if (isset($_SESSION["userid"])) : ?>
      <a class="nav" href="logout.php">Logout</a>
    <?php endif ?>
  </div>

  <div class="hamburger" onclick="openNav()">
    <span class="bar"></span>
    <span class="bar"></span>
    <span class="bar"></span>
  </div>

  <div>
    <h1>Staff Members</h1>
  </div>

  <div class="modal" id="modal">
    <h2>Edit Staff</h2>
    <h3>Modify Staff Information</h3>
    <?php

    if (isset($_GET['edit-staff-msg'])) {
      $msg = $_GET['edit-staff-msg'];

      if ($msg == "name") {
        echo "<p class='error'> New name invalid </P>";
      } else if ($msg == "email") {
        echo "<p class='error'> New email invalid </P>";
      } else if ($msg == "phone") {
        echo "<p class='error'> New phone number invalid </P>";
      }
    }
    ?>
    <form action="edit-staff.php" method="post">
      <p>Select Staff</p>
      <select name="Staff">
        <?php
        $sql = "SELECT concat(Firstname , ' ' ,Lastname) AS Name FROM users;";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
          echo '<option   value="' . $row['Name'] . '">' . $row['Name'] . '</option>';
        }

        echo "</select>";
        ?>
        <p>Select Attribute</p>
        <select name="selected-attribute">
          <option value="Firstname">First Name</option>
          <option value="Lastname">Last Name</option>
          <option value="Email">Email Address</option>
          <option value="Phonenumber">Phone Number</option>
          <option value="Role">Role</option>
        </select>
        <p>Enter New Value</p>
        <input name="new-value" type="text" placeholder="Enter new value here">
        <footer class="button-container">
          <button data-close-button class="close-button" type="button">Close</button>
          <button type="submit" name="discharge-button">Discharge</button>
          <button type="submit" name="submit-button">Submit</button>
        </footer>
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
          <th>Phone Number</th>
          <th>Role</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
          echo "<tr>
        <td>" . $row["Firstname"] . "</td>
        <td>" . $row["Lastname"] . "</td>
        <td>" . $row["Email"] . "</td>
        <td>" . $row["Phonenumber"] . "</td>
        <td>" . $row["Role"] . "</td>
      </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <div class="button-container">
    <button class="edit-button" data-modal-target='#modal'>Edit Staff</button>
  </div>
</body>

</html>