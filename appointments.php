<?php
session_start();
include_once "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="appointments.css" />
  <script defer src="modals.js"></script>
  <script defer src="nav.js"></script>
  <title>Appointments</title>
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

  <nav>
    <button data-modal-target='#modal1'>Add Appointment</button>
    <h1>Appointments</h1>
    <button data-modal-target='#modal2'>Delete Appointment</button>
  </nav>

  <div class="modal" id="modal1">
    <h2>Add Appointment</h2>
    <h3>Enter Appointment Information</h3>
    <?php

    if (isset($_GET['process-appointment-msg'])) {
      $msg = $_GET['process-appointment-msg'];

      if ($msg == "missing") {
        echo "<p class='error'> Missing information </P>";
      } else if ($msg == "date") {
        echo "<p class='error'> Date invalid </P>";
      } else if ($msg == "appointment") {
        echo "<p class='error'> Appointment conflict </p>";
      } else if ($msg == "permission") {
        echo "<p class='error'> Invalid permissions </p>";
      }
    }
    ?>
    <form action="process-appointment.php" method="post">
      <p>Select Patient</p>
      <select name="Pname">
        <?php
        $sql = "SELECT concat(Firstname , ' ' ,Lastname) AS Name FROM patients;";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
          echo '<option   value="' . $row['Name'] . '">' . $row['Name'] . '</option>';
        }

        echo "</select>";
        ?>
        <p>Select Doctor</p>
        <select name="Dname">
          <?php
          $sql = "SELECT concat(Firstname , ' ' ,Lastname) AS Name FROM users WHERE Role = 'Doctor';";
          $result = $conn->query($sql);

          while ($row = $result->fetch_assoc()) {
            echo '<option   value="' . $row['Name'] . '">' . $row['Name'] . '</option>';
          }

          echo "</select>";
          ?>
          <p>Appointment Date</p>
          <input name="Date" type="datetime-local">
          <p>Room Number</p>
          <select name="Room">
            <?php
            $sql = "SELECT Roomnumber FROM rooms;";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
              echo '<option   value="' . $row['Roomnumber'] . '">' . $row['Roomnumber'] . '</option>';
            }

            echo "</select>";
            ?>
            <p>Reason</p>
            <input name="Reason" type="text" placeholder="Enter reason for appointment here">
            <footer class="button-container">
              <button data-close-button class="close-button" type="button">Close</button>
              <button type="submit">Submit</button>
            </footer>
    </form>
  </div>

  <div class="modal" id="modal2">
    <h2>Cancel Appointment</h2>
    <h3>Cancel Selected Appointment</h3>
    <?php

    if (isset($_GET['delete-appointment-msg'])) {
      $msg = $_GET['delete-appointment-msg'];

      if ($msg == "none") {
        echo "<p class='error'> No appointment </P>";
      } else if ($msg == "permission") {
        echo "<p class='error'> Invalid permissions </p>";
      }
    }
    ?>
    <form action="delete-appointment.php" method="post">
      <p>Select Patient</p>
      <select name="Pname">
        <?php
        $sql = "SELECT Pname AS Name FROM appointments;";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
          echo '<option   value="' . $row['Name'] . '">' . $row['Name'] . '</option>';
        }

        echo "</select>";
        ?>
        <p>Select Date</p>
        <select name="Date">
          <?php
          $sql = "SELECT Date AS Date FROM appointments;";
          $result = $conn->query($sql);

          while ($row = $result->fetch_assoc()) {
            echo '<option   value="' . $row['Date'] . '">' . $row['Date'] . '</option>';
          }

          echo "</select>";
          ?>
          <footer class="button-container">
            <button data-close-button class="close-button" type="button">Close</button>
            <button type="submit" name="submit-button">Submit</button>
          </footer>
    </form>
  </div>

  <div id="overlay"></div>

  <div class="table-wrapper">
    <table>
      <thead>
        <tr>
          <th>Patient Name</th>
          <th>Doctor Name</th>
          <th>Date</th>
          <th>Room</th>
          <th>Reason</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM appointments";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
          echo "<tr>
        <td>" . $row["Pname"] . "</td>
        <td>" . $row["Dname"] . "</td>
        <td>" . $row["Date"] . "</td>
        <td>" . $row["Room"] . "</td>
        <td>" . $row["Reason"] . "</td>
      </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>