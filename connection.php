<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "hdms";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_errno) {
  echo "Failed to connect to MySQL: " . $conn->connect_error;
  die();
}
