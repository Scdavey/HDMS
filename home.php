<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="home.css" />
  <title>Home</title>
</head>

<body>
  <h1>Home</h1>

  <nav class="nav-container">
    <div class="column">
      <a href="patients.php"><button>Patients</button></a>
      <a href="staff.php"> <button>Staff</button></a>
      <button>Appointments</button>
    </div>
    <div class="column">
      <button>Rooms</button>
      <button>Availability</button>
      <button>Emergencies</button>
    </div>
  </nav>

  <?php if (isset($_SESSION["userid"])) : ?>
    <a class="logout" href="logout.php">Logout</a>
  <?php endif ?>
</body>

</html>