<?php

include("../../assets/db_config.php");

// api/schools/add?loc=cincinnati, ohio, united states&name=cincinnati country day school

$teacherId = "'" . str_replace(",",",",filter_var($_GET["tid"],FILTER_SANITIZE_STRING)) . "'";
$courseNameWout = str_replace(",",",",filter_var($_GET["cnm"],FILTER_SANITIZE_STRING));
// $courseName = "'" . str_replace(",",",",filter_var($_GET["cnm"],FILTER_SANITIZE_STRING)) . "'";
// echo $link;
// echo $teacherId;
$courseName;

$verifysql = "SELECT * FROM `teachers` WHERE id = ".$teacherId;
// echo $verifysql;

$result = $conn->query($verifysql);
if($result->num_rows > 0) {while($row = $result->fetch_assoc()){
  // echo $row["id"];
  // var_dump($row);
  // echo $courseNameWout;
  if (strpos(strtolower($row["subjects"]), $courseNameWout) == false) {
    //Not present, continue
    if($row["subjects"]==null) {
      // echo "Will NOT append []";
      $courseName = $courseNameWout;
    } else {
      // echo "WILL append []";
      $courseName = "[]" . $courseNameWout;
    }
    // echo $courseName;

    $sql = "UPDATE `teachers` SET `subjects` = '". $row["subjects"].$courseName ."' WHERE `teachers`.`id` = ".$teacherId.";";
    // echo $sql;
    // echo $sql;

    if ($conn->query($sql) === TRUE) {
      echo "100,";
      // echo mysqli_insert_id($conn);
    } else {
      echo "104";
      // echo "Error: " . $sql . "<br>" . $conn->error;
    }


  } else {
    //Already present, throw error
    echo "102";
  }
}} else {



}

// echo file_get_contents("../studysets/test.txt");

?>
