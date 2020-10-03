<?php

// $linksearch = filter_var($_GET["link"],FILTER_SANITIZE_STRING);
// $titlesearch = filter_var($_GET["title"],FILTER_SANITIZE_STRING);
// $classidsearch = filter_var($_GET["cids"],FILTER_SANITIZE_STRING);
$query = filter_var($_GET["query"],FILTER_SANITIZE_STRING);

include "../assets/db_config.php";

function getStringBetween($str,$from,$to) {
  $sub = substr($str, strpos($str,$from)+strlen($from),strlen($str));
  return substr($sub,0,strpos($sub,$to));
}

if (strpos($query, '{') !== false) {
  $teacher = getStringBetween($query,"{","}");
  // echo $teacher;
  @$query = str_replace("{".$teacher."}","",$query);
  // echo $query;

  $sql;
  $teachersql = "SELECT * FROM teachers WHERE name LIKE '%".$teacher."%'";
  $teacherresult = $conn->query($teachersql);
  if($teacherresult->num_rows > 0) {
    while($row = $teacherresult->fetch_assoc()) {
      // echo $row["id"];
      $sql = "SELECT * FROM studysets WHERE ((link LIKE '%".$query."%' OR title LIKE '%".$query."%' OR classId LIKE '%".$query."%') AND teacherId = ".$row['id'].") ORDER by id LIMIT 100";
      // echo $sql;
    }
  } else {
    $sql = "SELECT * FROM studysets WHERE (link LIKE '%".$query."%' OR title LIKE '%".$query."%' OR classId LIKE '%".$query."%') ORDER by id LIMIT 100";
  }
} else if(strpos($query, '[') !== false) {
  $school = getStringBetween($query,"[","]");
  // echo $teacher;
  @$query = str_replace("[".$school."]","",$query);
  // echo $query;

  $sql;
  $schoolsql = "SELECT * FROM schools WHERE name LIKE '%".$school."%'";
  $schoolresult = $conn->query($schoolsql);
  if($schoolresult->num_rows > 0) {
    while($row = $schoolresult->fetch_assoc()) {
      // echo $row["id"];
      $sql = "SELECT * FROM studysets WHERE ((link LIKE '%".$query."%' OR title LIKE '%".$query."%' OR classId LIKE '%".$query."%') AND schoolId = ".$row['id'].") ORDER by id LIMIT 100";
      // echo $sql;
    }
  } else {
    $sql = "SELECT * FROM studysets WHERE (link LIKE '%".$query."%' OR title LIKE '%".$query."%' OR classId LIKE '%".$query."%') ORDER by id LIMIT 100";
  }
} else {
  $sql = "SELECT * FROM studysets WHERE (link LIKE '%".$query."%' OR title LIKE '%".$query."%' OR classId LIKE '%".$query."%') ORDER by id LIMIT 100";
}
$searchResult = "";
// echo "db included";
if($err == "") {
  //All mysql-related code goes in here.
  // $sql = "SELECT * FROM studysets WHERE (link LIKE '%".$query."%' OR title LIKE '%".$query."%' OR classId LIKE '%".$query."%') ORDER by id LIMIT 100";
  // echo $sql;
  $result = $conn->query($sql);
  // var_dump($result);
  if ($result->num_rows > 0) {
    // output data of each row

    $searchResult .= '{"results":{';
    while($row = $result->fetch_assoc()) {
      $searchResult .= '"r' . $row["id"] . '":{';
      $searchResult .= '"id":"' . $row["id"] . '",';
      $searchResult .= '"link":"' . $row["link"] . '",';
      $searchResult .= '"title":"' . $row["title"] . '",';
      $searchResult .= '"subject":"' . $row["classId"] . '",';
      $db = $row["timestamp"];
      $timestamp = strtotime($db);
      $searchResult .= '"timestamp":"' . date("m/d/Y", $timestamp) . '"';
      $searchResult .= "},";
    }
    $searchResult = substr($searchResult,0,-1);
    $searchResult .= "}}";
  } else {
    echo 'No results';
  }
  $conn->close();

} else {
  echo $err;
}
echo $searchResult;
// echo $sql;

?>
