<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error); // chiedere anche questoo
}
echo "Connected successfully";
?>