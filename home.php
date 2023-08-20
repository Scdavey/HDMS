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
  <nav>
    <a href="patients.php"><button>Patients</button></a>
    <button>Staff</button>
    <button>Appointments</button>
    <button>Rooms</button>
    <button>Availability</button>
    <button>Emergencies</button>
  </nav>

  <h1>Home</h1>

  <?php if (isset($_SESSION["userid"])) : ?>
    <a class="logout" href="logout.php">Logout</a>
  <?php endif ?>
</body>

</html>