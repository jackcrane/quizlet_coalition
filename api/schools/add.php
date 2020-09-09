<?php

include("../../assets/db_config.php");

// api/schools/add?loc=cincinnati, ohio, united states&name=cincinnati country day school

$schoolLocation = "'" . str_replace(",",",",filter_var($_GET["loc"],FILTER_SANITIZE_STRING)) . "'";
$schoolName = "'" . str_replace(",",",",filter_var($_GET["name"],FILTER_SANITIZE_STRING)) . "'";
// echo $link;
// echo $teacherId;

$verifysql = "SELECT * FROM `schools` WHERE name = ".$schoolName;
// echo $verifysql;

$result = $conn->query($verifysql);
if($result->num_rows > 0) {echo "102,";while($row = $result->fetch_assoc()){echo $row["id"];}} else {

  $sql = "INSERT INTO `schools`(`name`, `location`) VALUES ($schoolName,$schoolLocation)";
  // echo $sql;

  if ($conn->query($sql) === TRUE) {
    echo "100,";
    echo mysqli_insert_id($conn);
  } else {
    echo "104";
    // echo "Error: " . $sql . "<br>" . $conn->error;
  }

}

// echo file_get_contents("../studysets/test.txt");

?>
