<?php

$servername = "localhost";
$username = "{USERNAME GOES HERE}";
$password = "{PASS GOES HERE}";
$db_name = "quizlet_coalition";
$err = "";

$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
  // die("Connection failed: " . $conn->connect_error);
  $err = $conn->connect_error;
}
// echo "Connected successfully";

?>
