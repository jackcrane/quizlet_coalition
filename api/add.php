<?php

include("../assets/db_config.php");

// api/add?link=https://quization-flash-cards/?schoolId=1?teacherId20?classIdAP Computer Science Principles

$ip = "'".$_SERVER["REMOTE_ADDR"]."'";
$link = "'".filter_var($_GET["link"], FILTER_SANITIZE_STRING)."'";
$schoolId = "'".filter_var($_GET["schoolId"], FILTER_SANITIZE_STRING)."'";
$teacherId = "'".filter_var($_GET["teacherId"], FILTER_SANITIZE_STRING)."'";
$classId = "'".filter_var($_GET["classId"], FILTER_SANITIZE_STRING)."'";
$title = "'".filter_var($_GET["title"], FILTER_SANITIZE_STRING)."'";
// echo $link;
// echo $teacherId;

$verifysql = "SELECT * FROM `studysets` WHERE link = ".$link."AND teacherId = ".$teacherId;
// echo $verifysql;

$result = $conn->query($verifysql);
if($result->num_rows > 0) {
  while($row = $result->fetch_assoc()){
    echo "102,".$row["id"];
  }
} else {

  $sql = "INSERT INTO `studysets`(`link`, `title`, `schoolId`, `teacherId`, `classId`,`submitterIp`) VALUES ($link,$title,$schoolId,$teacherId,$classId,$ip)";
  // echo $sql;

  if ($conn->query($sql) === TRUE) {
    echo "100,".mysqli_insert_id($conn);
    mkdir("../studysets/".mysqli_insert_id($conn));
    $finalfile = fopen("../studysets/".mysqli_insert_id($conn)."/index.php","w");
    fwrite($finalfile,"<?php \$thispage=".mysqli_insert_id($conn).";include('../template.php'); ?>");
  } else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    echo "104";
  }



}

// echo file_get_contents("../studysets/test.txt");

?>
