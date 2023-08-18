<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "hdms";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if ($conn) {
  echo "success";
} else {
  die("Error" . mysqli_connect_error());
}
