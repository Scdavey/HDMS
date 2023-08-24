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
    <button data-modal-target='#modal1'>Add Patient</button>
    <h1>Patients</h1>
    <button data-modal-target='#modal2'>Edit Patient</button>
  </nav>

  <div class="modal" id="modal1">
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
        <button data-close-button class="close-button" type="button">Close</button>
        <button type="submit">Submit</button>
      </div>
    </form>
  </div>

  <div class="modal" id="modal2">
    <h2>Edit Patient</h2>
    <h3>Modify Patient Information</h3>
    <form action="edit-patient.php" method="post">
      <p>Select Patient</p>
      <select name="Patients">
        <?php
        $sql = "SELECT concat(Firstname , ' ' ,Lastname) AS Name FROM patients;";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
          echo '<option   value="' . $row['Name'] . '">' . $row['Name'] . '</option>';
        }

        echo "</select>";
        ?>
        <p>Select Attribute</p>
        <select name="selected-attribute">
          <option value="Firstname">Firstname</option>
          <option value="Lastname">Lastname</option>
          <option value="Email">Email Address</option>
          <option value="Phonenumber">Phone Number</option>
          <option value="Admitted">Admition Date</option>
          <option value="Reason">Admition Reason</option>
        </select>
        <p>Enter New Value</p>
        <input name="new-value" type="text" placeholder="Enter new value here">
        <div class="button-container">
          <button data-close-button class="close-button" type="button">Close</button>
          <button type="submit" name="discharge-button">Discharge</button>
          <button type="submit" name="submit-button">Submit</button>
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